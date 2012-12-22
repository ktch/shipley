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
class MigrationsService extends BaseApplicationComponent
{
	private $_db;

	const BASE_MIGRATION = 'm000000_000000_base';

	/**
	 * @var string the folder that stores the migrations. This must be specified
	 * in terms of a path alias, and the corresponding directory must exist.
	 * Defaults to 'application.migrations' (meaning 'protected/migrations').
	 */
	public $migrationPath = 'application.migrations';

	/**
	 * @var string the name of the table for keeping applied migration information.
	 * This table will be automatically created if not exists. Defaults to 'tbl_migration'.
	 * The table structure is: (version varchar(255) primary key, integer)
	 */
	public $migrationTable = 'migrations';

	/**
	 * @var string the application component ID that specifies the database connection for
	 * storing migration information. Defaults to 'db'.
	 */
	public $connectionID = 'db';

	/**
	 * @var string the default command action. It defaults to 'up'.
	 */
	public $defaultAction = 'up';

	/**
	 * @throws Exception
	 * @return bool|void
	 */
	public function init()
	{
		$path = Blocks::getPathOfAlias($this->migrationPath);

		if ($path === false || !IOHelper::folderExists($path))
		{
			throw new Exception(Blocks::t('Error: The migration folder “{folder}” doesn’t exist.', array('folder' => $this->migrationPath)));
		}

		$this->migrationPath = $path;
	}

	/**
	 * @return mixed
	 */
	public function runToTop()
	{
		if (($migrations = $this->getNewMigrations()) === array())
		{
			Blocks::log('No new migration(s) found. Your system is up-to-date.', \CLogger::LEVEL_INFO);
			return true;
		}

		$total = count($migrations);

		Blocks::log("Total $total new ".($total === 1 ? 'migration':'migrations')." to be applied:".PHP_EOL, \CLogger::LEVEL_INFO);

		foreach ($migrations as $migration)
		{
			Blocks::log($migration.PHP_EOL, \CLogger::LEVEL_INFO);
		}

		foreach ($migrations as $migration)
		{
			if ($this->migrateUp($migration) === false)
			{
				Blocks::log('Migration failed. All later migrations are canceled.', \CLogger::LEVEL_ERROR);
				return false;
			}
		}

		Blocks::log('Migrated up successfully.', \CLogger::LEVEL_INFO);
		return true;
	}

	/**
	 * @return mixed|null
	 */
	public function getHistory()
	{
		$migrations = $this->getMigrationHistory();

		if ($migrations === array())
		{
			Blocks::log('No migrations have been performed before.', \CLogger::LEVEL_INFO);
			return null;
		}

		return $migrations;
	}

	/**
	 * @return array|null
	 */
	public function getNew()
	{
		$migrations = $this->getNewMigrations();

		if ($migrations === array())
		{
			Blocks::log('No new migrations found. Your system is up-to-date.', \CLogger::LEVEL_INFO);
			return null;
		}

		return $migrations;
	}

	/**
	 * @param $migrationName
	 * @return bool
	 */
	public function create($migrationName)
	{
		if (!preg_match('/^\w+$/', $migrationName))
		{
			Blocks::log('The name of the migration must contain letters, digits and/or underscore characters only.', \CLogger::LEVEL_ERROR);
			return false;
		}

		$name = 'm'.gmdate('ymd_His').'_'.$migrationName;
		$content = strtr($this->getTemplate(), array('{ClassName}' => $name));
		$file = IOHelper::normalizePathSeparators($this->migrationPath.'/'.$name.'.php');

		file_put_contents($file, $content);
		Blocks::log("New migration created successfully: ".$file, \CLogger::LEVEL_INFO);
		return true;
	}

	/**
	 * @param $class
	 * @return bool|null
	 */
	protected function migrateUp($class)
	{
		if($class === static::BASE_MIGRATION)
			return null;

		Blocks::log('Applying migration: '.$class, \CLogger::LEVEL_INFO);
		$start = microtime(true);
		$migration = $this->instantiateMigration($class);

		if ($migration->up() !== false)
		{
			// We do this to because of migrating from int timestamps to native db date/time datatypes.
			$table = blx()->db->schema->getTable("{{{$this->migrationTable}}}", true);
			$column = $table->getColumn('apply_time');
			$time = $column->dbType == ColumnType::DateTime ? DateTimeHelper::currentTimeForDb() : DateTimeHelper::currentTimeStamp();

			$this->getDbConnection()->createCommand()->insert($this->migrationTable, array(
				'version' => $class,
				'apply_time' => $time,
			));

			$time = microtime(true) - $start;
			Blocks::log('Applied migration: '.$class.' (time: '.sprintf("%.3f", $time).'s)', \CLogger::LEVEL_INFO);
			return true;
		}
		else
		{
			$time = microtime(true) - $start;
			Blocks::log('Failed to apply migration: '.$class.' (time: '.sprintf("%.3f", $time).'s)', \CLogger::LEVEL_ERROR);
			return false;
		}
	}

	/**
	 * @param $class
	 * @return mixed
	 */
	protected function instantiateMigration($class)
	{
		$file = IOHelper::normalizePathSeparators($this->migrationPath.'/'.$class.'.php');

		require_once($file);

		$class = __NAMESPACE__.'\\'.$class;
		$migration = new $class;
		$migration->setDbConnection($this->getDbConnection());

		return $migration;
	}

	/**
	 * @throws Exception
	 * @return mixed
	 */
	protected function getDbConnection()
	{
		if ($this->_db !== null)
		{
			return $this->_db;
		}
		else if (($this->_db = Blocks::app()->getComponent($this->connectionID)) instanceof \CDbConnection)
		{
			return $this->_db;
		}
		else
		{
			throw new Exception(Blocks::t('MigrationCommand connectionId “{connectionId}” is invalid. Please make sure it refers to the ID of a DbConnection application component.', array('connectionId' => $this->connectionID)));
		}
	}

	/**
	 * @return mixed
	 */
	protected function getMigrationHistory()
	{
		$db = $this->getDbConnection();
		$historyArr = array();

		if ($db->schema->getTable(blx()->config->getDbItem('tablePrefix').'_'.$this->migrationTable) === null)
		{
			$this->createMigrationHistoryTable();
		}

		$migrationHistory = $db->createCommand()
					->select('version, apply_time')
					->from($this->migrationTable)
					->order('version DESC')
					->queryAll();

		foreach ($migrationHistory as $migration)
		{
			$historyArr[$migration['version']] = $migration['apply_time'];
		}

		return $historyArr;
	}

	/**
	 *
	 */
	protected function createMigrationHistoryTable()
	{
		$db = $this->getDbConnection();
		Blocks::log('Creating migration history table "'.$this->migrationTable.'"', \CLogger::LEVEL_INFO);

		$db->createCommand()->createTable($this->migrationTable, array(
			'version'    => array(AttributeType::String, 'column' => ColumnType::Varchar, 'maxLength' => 200, 'required' => true),
			'apply_time' => array(AttributeType::DateTime, 'required' => true),
		));

		$db->createCommand()->createIndex("migration_version_unique_idx", $this->migrationTable, "version", true);

		$db->createCommand()->insert($this->migrationTable, array(
			'version' => static::BASE_MIGRATION,
			'apply_time' => DateTimeHelper::currentTimeForDb(),
		));

		Blocks::log('Created migration history table "'.$this->migrationTable.'"', \CLogger::LEVEL_INFO);
	}

	/**
	 * Gets migrations that have no been applied yet AND have a later timestamp than the current Blocks release.
	 *
	 * @return array
	 */
	protected function getNewMigrations()
	{
		$applied = array();

		foreach ($this->getMigrationHistory() as $version => $time)
		{
			$applied[substr($version, 1, 13)] = true;
		}

		$migrations = array();
		$handle = opendir($this->migrationPath);

		while (($file = readdir($handle)) !== false)
		{
			if ($file === '.' || $file === '..')
			{
				continue;
			}

			$path = IOHelper::normalizePathSeparators($this->migrationPath.'/'.$file);

			if (preg_match('/^(m(\d{6}_\d{6})_.*?)\.php$/', $file, $matches) && IOHelper::fileExists($path) && !isset($applied[$matches[2]]))
			{
				$time = strtotime('20'.substr($matches[2], 0, 2).'-'.substr($matches[2], 2, 2).'-'.substr($matches[2], 4, 2).' '.substr($matches[2], 7, 2).':'.substr($matches[2], 9, 2).':'.substr($matches[2], 11, 2));

				// Check the migration timestamp against the Blocks release date
				$storedReleaseDate = Blocks::getStoredReleaseDate()->getTimestamp();

				if ($time > $storedReleaseDate)
				{
					$migrations[] = $matches[1];
				}
			}
		}

		closedir($handle);
		sort($migrations);
		return $migrations;
	}

	/**
	 * @return string
	 */
	protected function getTemplate()
	{
			return <<<EOD
<?php
namespace Blocks;

/**
 * The class name is the UTC timestamp in the format of mYYMMDD_HHMMSS_migrationName
 */
class {ClassName} extends \CDbMigration
{
	/**
	 * Any migration code in here is wrapped inside of a transaction.
	 *
	 * @return bool
	 */
	public function safeUp()
	{
		return true;
	}
}
EOD;
	}
}
