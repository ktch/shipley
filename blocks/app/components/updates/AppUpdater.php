<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 *
 */
class AppUpdater implements IUpdater
{
	private $_buildsToUpdate;
	private $_updateModel;
	private $_downloadFilePath;
	private $_unzipFolder;
	private $_manifestData;
	private $_writableErrors = null;
	private $_dbBackupPath;
	private $_backupDb;

	/**
	 *
	 */
	function __construct($forceCheck = true, $backupDb = true)
	{
		if ($forceCheck)
		{
			$this->_updateModel = blx()->updates->getUpdates(true);

			if (!empty($this->_updateModel->errors))
			{
				throw new Exception(implode(',', $this->_updateModel->errors));
			}

			$this->_buildsToUpdate = $this->_updateModel->blocks->releases;
		}

		$this->_backupDb = $backupDb;
	}

	/**
	 * Performs environmental requirement checks before running an update.
	 *
	 * @throws Exception
	 */
	public function checkRequirements()
	{
		$installedMySqlVersion = blx()->db->serverVersion;
		$requiredMySqlVersion = blx()->params['requiredMysqlVersion'];
		$requiredPhpVersion = blx()->params['requiredPhpVersion'];

		$phpCompat = version_compare(PHP_VERSION, $requiredPhpVersion, '>=');
		$databaseCompat = version_compare($installedMySqlVersion, $requiredMySqlVersion, '>=');

		if (!$phpCompat && !$databaseCompat)
		{
			throw new Exception(Blocks::t('The update can’t be installed because Blocks requires PHP version "{requiredPhpVersion}" or higher and MySQL version "{requiredMySqlVersion}" or higher.  You have PHP version "{installedPhpVersion}" and MySQL version "{installedMySqlVersion}" installed.',
				array('requiredPhpVersion' => $requiredMySqlVersion,
				      'installedPhpVersion' => PHP_VERSION,
				      'requiredMySqlVersion' => $requiredMySqlVersion,
				      'installedMySqlVersion' => $installedMySqlVersion
				)));
		}
		else if (!$phpCompat)
		{
			throw new Exception(Blocks::t('The update can’t be installed because Blocks requires PHP version "{requiredPhpVersion}" or higher and you have PHP version "{installedPhpVersion}" installed.',
				array('requiredPhpVersion' => $requiredMySqlVersion,
				      'installedPhpVersion' => PHP_VERSION
			)));
		}
		else if (!$databaseCompat)
		{
			throw new Exception(Blocks::t('The update can’t be installed because Blocks requires MySQL version "{requiredMySqlVersion}" or higher and you have MySQL version "{installedMySqlVersion}" installed.',
				array('requiredMySqlVersion' => $requiredMySqlVersion,
				      'installedMySqlVersion' => $installedMySqlVersion
				)));
		}
	}

	/**
	 * Starts the process of running a Blocks app update.
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function start()
	{
		$this->checkRequirements();

		if ($this->_buildsToUpdate == null)
		{
			throw new Exception(Blocks::t('Blocks is already up to date.'));
		}

		Blocks::log('Starting the AppUpdater.', \CLogger::LEVEL_INFO);

		// Get the most up-to-date build.
		$latestBuild = $this->_buildsToUpdate[0];
		$tempPath = blx()->path->getTempPath();

		// Download the package from ET.
		Blocks::log('Downloading patch file to '.$tempPath, \CLogger::LEVEL_INFO);
		if (($fileName = blx()->et->downloadUpdate($tempPath)) !== false)
		{
			$this->_downloadFilePath = $tempPath.$fileName;
		}
		else
		{
			throw new Exception(Blocks::t('There was a problem downloading the package.'));
		}

		// Validate the downloaded update against ET.
		Blocks::log('Validating downloaded update.', \CLogger::LEVEL_INFO);
		if (!$this->validateUpdate())
		{
			throw new Exception(Blocks::t('There was a problem validating the downloaded package.'));
		}

		// Unpack the downloaded package.
		Blocks::log('Unpacking the downloaded package.', \CLogger::LEVEL_INFO);
		if (!$this->unpackPackage())
		{
			throw new Exception(Blocks::t('There was a problem unpacking the downloaded package.'));
		}

		// Validate that the paths in the update manifest file are all writable by Blocks
		Blocks::log('Validating update manifest file paths are writable.', \CLogger::LEVEL_INFO);
		if (!$this->validateManifestPathsWritable())
		{
			throw new Exception(Blocks::t('Blocks needs to be able to write to the follow files, but can’t: {files}', array('files' => implode('<br />', $this->_writableErrors))));
		}

		// Take the site offline.
		Blocks::log('Taking the site offline for update.', \CLogger::LEVEL_INFO);
		blx()->updates->turnSystemOffBeforeUpdate();

		// Backup any files about to be updated.
		Blocks::log('Backing up files that are about to be updated.', \CLogger::LEVEL_INFO);
		if (!$this->backupFiles())
		{
			throw new Exception(Blocks::t('There was a problem backing up your files for the update.'));
		}

		// Update the files.
		Blocks::log('Performing file update.', \CLogger::LEVEL_INFO);
		if (!UpdateHelper::doFileUpdate($this->_getManifestData(), $this->_unzipFolder))
		{
			throw new Exception(Blocks::t('There was a problem updating your files.'));
		}

		// Check to see if there any migrations to run.
		Blocks::log('Checking to see if there are any migrations to run in the update.', \CLogger::LEVEL_INFO);

				// If there are migrations to run, run them.
		if ($this->migrationsToRun())
		{
			try
			{
				Blocks::log('Starting to run update migrations.', \CLogger::LEVEL_INFO);
				if (!$this->doDatabaseUpdate())
				{
					UpdateHelper::rollBackFileChanges($this->_getManifestData());
					throw new Exception(Blocks::t('There was a problem updating your database.'));
				}
			}
			catch (\Exception $e)
			{
				UpdateHelper::rollBackFileChanges($this->_getManifestData());
				throw new Exception(Blocks::t('There was a problem updating your database.'));
			}
		}

		// Bring the system back online.
		Blocks::log('Turning system back on after update.', \CLogger::LEVEL_INFO);
		blx()->updates->turnSystemOnAfterUpdate();

		// Clean-up any leftover files.
		Blocks::log('Cleaning up temp files after update.', \CLogger::LEVEL_INFO);
		$this->cleanTempFiles();

		// Clear the updates cache.
		Blocks::log('Clearing the update cache.', \CLogger::LEVEL_INFO);
		if (!blx()->updates->flushUpdateInfoFromCache())
		{
			throw new Exception(Blocks::t('The update was performed successfully, but there was a problem invalidating the update cache.'));
		}

		// Update the db with the new Blocks info.
		Blocks::log('Setting new Blocks info in the database after update.', \CLogger::LEVEL_INFO);
		if (!blx()->updates->setNewBlocksInfo($latestBuild->version, $latestBuild->build, $latestBuild->date))
		{
			throw new Exception(Blocks::t('The update was performed successfully, but there was a problem setting the new version and build number in the database.'));
		}

		Blocks::log('Finished AppUpdater.', \CLogger::LEVEL_INFO);
		return true;
	}

	/**
	 * Returns the relevant lines from the update manifest file starting with the current local version/build.
	 *
	 * @return array
	 */
	private function _getManifestData()
	{
		if ($this->_manifestData == null)
		{
			$manifestData = UpdateHelper::getManifestData($this->_unzipFolder);

			// Only use the manifest data starting from the local version
			for ($counter = 0; $counter < count($manifestData); $counter++)
			{
				if (strpos($manifestData[$counter], '##'.$this->_updateModel->blocks->localVersion.'.'.$this->_updateModel->blocks->localBuild) !== false)
				{
					break;
				}
			}

			$manifestData = array_slice($manifestData, $counter);
			$this->_manifestData = $manifestData;
		}

		return $this->_manifestData;
	}

	/**
	 * Scans through the update manifest file for any migrations.  If it finds one, copies it to the app's migrations
	 * folder so they can be ran before any file updates occur.
	 *
	 * @return mixed
	 */
	public function migrationsToRun()
	{
		$manifestData = $this->_getManifestData();

		for ($i = 0; $i < count($manifestData); $i++)
		{
			$row = explode(';', $manifestData[$i]);

			// We found a migration
			if (UpdateHelper::isManifestMigrationLine($row[0]) && $row[1] == PatchManifestFileAction::Add)
			{
				Blocks::log('Found migration file: '.$row[0], \CLogger::LEVEL_INFO);
				return true;
			}
		}

		return false;
	}

	/**
	 * Run the database migrations to top.  Will optionally backup the database before running migrations.
	 *
	 * @throws \Exception
	 * @return bool
	 */
	public function doDatabaseUpdate()
	{
		try
		{
			if ($this->_backupDb)
			{
				$dbBackup = new DbBackup();
				$this->_dbBackupPath = $dbBackup->run();
			}

			if (blx()->migrations->runToTop())
			{
				return true;
			}
		}
		catch(\Exception $e)
		{
			// We had migrations to run and something went wrong. Let's try to restore the backup database.
			if ($this->_backupDb)
			{
				UpdateHelper::rollBackDatabaseChanges($this->_dbBackupPath);
			}

			throw $e;
		}

		// We had migrations to run and something went wrong. Let's try to restore the backup database.
		if ($this->_backupDb)
		{
			UpdateHelper::rollBackDatabaseChanges($this->_dbBackupPath);
		}

		return false;
	}

	/**
	 * Remove any temp files and/or folders that might have been created.
	 */
	public function cleanTempFiles()
	{
		$manifestData = $this->_getManifestData();

		foreach ($manifestData as $row)
		{
			if (UpdateHelper::isManifestVersionInfoLine($row))
			{
				continue;
			}

			$rowData = explode(';', $row);

			// Delete any files we backed up.
			$backupFilePath = IOHelper::normalizePathSeparators(blx()->path->getAppPath().$rowData[0].'.bak');

			if (($file = IOHelper::getFile($backupFilePath)) !== false)
			{
				Blocks::log('Deleting backup file: '.$file->getRealPath(), \CLogger::LEVEL_INFO);
				$file->delete();
			}
		}

		// Delete the temp patch folder
		IOHelper::deleteFolder($this->_unzipFolder);

		// Delete the downloaded patch file.
		IOHelper::deleteFile($this->_downloadFilePath);
	}

	/**
	 * Validates that the downloaded file MD5 matches the name of the file (which is the MD5 from the server)
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function validateUpdate()
	{
		Blocks::log('Validating MD5 for '.$this->_downloadFilePath, \CLogger::LEVEL_INFO);
		$sourceMD5 = IOHelper::getFileName($this->_downloadFilePath, false);

		$localMD5 = IOHelper::getFileMD5($this->_downloadFilePath);

		if ($localMD5 === $sourceMD5)
		{
			return true;
		}

		return false;
	}

	/**
	 * Unzip the downloaded update file into the temp package folder.
	 *
	 * @return bool
	 */
	public function unpackPackage()
	{
		$this->_unzipFolder = blx()->path->getTempPath().IOHelper::getFileName($this->_downloadFilePath, false);

		Blocks::log('Unzipping package to '.$this->_unzipFolder, \CLogger::LEVEL_INFO);
		if (Zip::unzip($this->_downloadFilePath, $this->_unzipFolder))
		{
			return true;
		}

		return false;
	}

	/**
	 * Checks to see if the files that we are about to update are writable by Blocks.
	 *
	 * @return bool
	 */
	public function validateManifestPathsWritable()
	{
		$manifestData = $this->_getManifestData();

		foreach ($manifestData as $row)
		{
			if (UpdateHelper::isManifestVersionInfoLine($row))
			{
				continue;
			}

			$rowData = explode(';', $row);
			$filePath = IOHelper::normalizePathSeparators(blx()->path->getAppPath().$rowData[0]);

			// Check to see if the file we need to update is writable.
			if (IOHelper::fileExists($filePath))
			{
				if (!IOHelper::isWritable($filePath))
				{
					$this->_writableErrors[] = $filePath;
				}
			}
			// In this case, it's an 'added' update file.
			else if (($folderPath = IOHelper::folderExists(IOHelper::getFolderName($filePath))) == true)
			{
				if (!IOHelper::isWritable($folderPath))
				{
					$this->_writableErrors[] = $filePath;
				}

			}
		}

		return $this->_writableErrors === null;
	}

	/**
	 * Attempt to backup each of the update manifest files by copying them to a file with the same name with a .bak extension.
	 * If there is an exception thrown, we attempt to roll back all of the changes.
	 *
	 * @return bool
	 */
	public function backupFiles()
	{
		$manifestData = $this->_getManifestData();

		try
		{
			foreach ($manifestData as $row)
			{
				if (UpdateHelper::isManifestVersionInfoLine($row))
				{
					continue;
				}

				// No need to back up migration files.
				if (UpdateHelper::isManifestMigrationLine($row))
				{
					continue;
				}

				$rowData = explode(';', $row);
				$filePath = IOHelper::normalizePathSeparators(blx()->path->getAppPath().$rowData[0]);

				// If the file doesn't exist, it's a new file.
				if (IOHelper::fileExists($filePath))
				{
					Blocks::log('Backing up file '.$filePath, \CLogger::LEVEL_INFO);
					IOHelper::copyFile($filePath, $filePath.'.bak');
				}
			}
		}
		catch (\Exception $e)
		{
			Blocks::log('Error updating files: '.$e->getMessage(), \CLogger::LEVEL_ERROR);
			UpdateHelper::rollBackFileChanges($manifestData);
			return false;
		}

		return true;
	}
}
