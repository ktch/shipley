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
class InstallService extends BaseApplicationComponent
{
	/**
	 * Installs Blocks!
	 *
	 * @param array $inputs
	 * @throws Exception
	 * @throws \Exception
	 * @return void
	 */
	public function run($inputs)
	{
		if (blx()->isInstalled())
		{
			throw new Exception(Blocks::t('Blocks is already installed.'));
		}

		$records = $this->findInstallableRecords();

		// Start the transaction
		$transaction = blx()->db->beginTransaction();
		try
		{
			Blocks::log('Installing Blocks.', \CLogger::LEVEL_INFO);

			// Create the tables
			$this->_createTablesFromRecords($records);
			$this->_createForeignKeysFromRecords($records);

			Blocks::log('Committing the transaction.', \CLogger::LEVEL_INFO);
			$transaction->commit();
		}
		catch (\Exception $e)
		{
			$transaction->rollBack();
			throw $e;
		}

		// Blocks, you are installed now.
		blx()->setInstalledStatus(true);

		// Fill 'er up
		$this->_populateInfoTable($inputs);
		$this->_addUser($inputs);
		$this->_logUserIn($inputs);
		$this->_saveDefaultMailSettings($inputs['email'], $inputs['siteName']);
		$this->_createDefaultContent();
		blx()->dashboard->addDefaultUserWidgets();

		Blocks::log('Finished installing Blocks.', \CLogger::LEVEL_INFO);
	}

	/**
	 * Finds installable records from the models folder.
	 *
	 * @return array
	 */
	public function findInstallableRecords()
	{
		$records = array();
		$componentsDir = IOHelper::getFolder(blx()->path->getComponentsPath());
		$recordFiles = $componentsDir->getContents(true, "\/records\/.*Record\.php");

		foreach ($recordFiles as $file)
		{
			if (IOHelper::fileExists($file))
			{
				$fileName = IOHelper::getFileName($file, false);

				if (Blocks::hasPackage(BlocksPackage::PublishPro))
				{
					// Skip EntryContentRecord and SectionContentRecord
					if ($fileName == 'EntryContentRecord' || $fileName == 'SectionContentRecord')
					{
						continue;
					}
				}

				$class = __NAMESPACE__.'\\'.$fileName;

				// Ignore abstract classes and interfaces
				$ref = new \ReflectionClass($class);
				if ($ref->isAbstract() || $ref->isInterface())
				{
					continue;
				}

				$obj = new $class('install');

				if (method_exists($obj, 'createTable'))
				{
					$records[] = $obj;
				}
			}
		}

		return $records;
	}

	/**
	 * Creates the tables as defined in the records.
	 *
	 * @access private
	 * @param $records
	 */
	private function _createTablesFromRecords($records)
	{
		foreach ($records as $record)
		{
			Blocks::log('Creating table for record:'. get_class($record), \CLogger::LEVEL_INFO);
			$record->createTable();
		}
	}

	/**
	 * Creates the foreign keys as defined in the records.
	 *
	 * @access private
	 * @param $records
	 */
	private function _createForeignKeysFromRecords($records)
	{
		foreach ($records as $record)
		{
			Blocks::log('Adding foreign keys for record:'. get_class($record), \CLogger::LEVEL_INFO);
			$record->addForeignKeys();
		}
	}

	/**
	 * Populates the info table with install and environment information.
	 *
	 * @access private
	 * @param $inputs
	 * @throws Exception
	 */
	private function _populateInfoTable($inputs)
	{
		Blocks::log('Populating the info table.', \CLogger::LEVEL_INFO);

		$info = new InfoRecord();

		$info->version = Blocks::getVersion();
		$info->build = Blocks::getBuild();
		$info->releaseDate = Blocks::getReleaseDate();
		$info->siteName = $inputs['siteName'];
		$info->siteUrl = $inputs['siteUrl'];
		$info->language = $inputs['language'];
		$info->licenseKey = $inputs['licenseKey'];
		$info->on = true;

		if ($info->save())
		{
			Blocks::log('Info table populated successfully.', \CLogger::LEVEL_INFO);
		}
		else
		{
			Blocks::log('Could not populate the info table.', \CLogger::LEVEL_ERROR);
			throw new Exception(Blocks::t('There was a problem saving to the info table:').$this->_getFlattenedErrors($info->getErrors()));
		}
	}

	/**
	 * Adds the initial user to the database.
	 *
	 * @access private
	 * @param $inputs
	 * @return UserModel
	 * @throws Exception
	 */
	private function _addUser($inputs)
	{
		Blocks::log('Creating user.', \CLogger::LEVEL_INFO);

		$user = new UserModel();

		$user->username = $inputs['username'];
		$user->newPassword = $inputs['password'];
		$user->email = $inputs['email'];
		$user->language = blx()->language;
		$user->admin = true;

		if (blx()->accounts->saveUser($user))
		{
			Blocks::log('User created successfully.', \CLogger::LEVEL_INFO);
		}
		else
		{
			Blocks::log('Could not create the user.', \CLogger::LEVEL_ERROR);
			throw new Exception(Blocks::t('There was a problem creating the user:').$this->_getFlattenedErrors($user->getErrors()));
		}
	}

	/**
	 * Attempts to log in the given user.
	 *
	 * @access private
	 * @param array $inputs
	 */
	private function _logUserIn($inputs)
	{
		Blocks::log('Logging in user.', \CLogger::LEVEL_INFO);

		if (blx()->user->login($inputs['username'], $inputs['password']))
		{
			Blocks::log('User logged in successfully.', \CLogger::LEVEL_INFO);
		}
		else
		{
			Blocks::log('Could not log the user in.', \CLogger::LEVEL_WARNING);
		}
	}

	/**
	 * Saves some default mail settings for the site.
	 *
	 * @access private
	 * @param $email
	 * @param $siteName
	 */
	private function _saveDefaultMailSettings($email, $siteName)
	{
		Blocks::log('Saving default mail settings.', \CLogger::LEVEL_INFO);

		$settings = array(
			'protocol'     => EmailerType::Php,
			'emailAddress' => $email,
			'senderName'   => $siteName
		);

		if (blx()->systemSettings->saveSettings('email', $settings))
		{
			Blocks::log('Default mail settings saved successfully.', \CLogger::LEVEL_INFO);
		}
		else
		{
			Blocks::log('Could not save default email settings.', \CLogger::LEVEL_WARNING);
		}
	}

	/**
	 * Creates initial database content for the install.
	 *
	 * @access private
	 * @return null
	 */
	private function _createDefaultContent()
	{
		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			Blocks::log('Creating the Blog section.', \CLogger::LEVEL_INFO);

			$section = new SectionModel();

			$section->name = Blocks::t('Blog');
			$section->handle = 'blog';
			$section->hasUrls = true;
			$section->urlFormat = 'blog/{slug}';
			$section->template = 'blog/_entry';
			$section->titleLabel = 'Title';

			if (blx()->sections->saveSection($section))
			{
				Blocks::log('Blog section created successfuly."', \CLogger::LEVEL_INFO);
			}
			else
			{
				Blocks::log('Could not save the Blog section.', \CLogger::LEVEL_WARNING);
			}
		}

		Blocks::log('Creating the Body entry block.', \CLogger::LEVEL_INFO);

		$block = new EntryBlockModel();

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			$block->sectionId = $section->id;
			$service = blx()->sections;
		}
		else
		{
			$service = blx()->entries;
		}

		$block->name = Blocks::t('Body');
		$block->handle = 'body';
		$block->required = true;
		$block->type = 'RichText';
		$block->translatable = true;

		if ($service->saveBlock($block))
		{
			Blocks::log('Body entry block created successfuly."', \CLogger::LEVEL_INFO);
		}
		else
		{
			Blocks::log('Could not create the Body entry block.', \CLogger::LEVEL_WARNING);
		}
	}

	/**
	 * Get a flattened list of model errors
	 *
	 * @access private
	 * @param array $errors
	 * @return string
	 */
	private function _getFlattenedErrors($errors)
	{
		$return = '';

		foreach ($errors as $attribute => $attributeErrors)
		{
			$return .= "\n - ".implode("\n - ", $attributeErrors);
		}

		return $return;
	}
}
