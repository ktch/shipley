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
class DbLogRoute extends \CDbLogRoute
{
	/**
	 *
	 */
	public function init()
	{
		// Purposefully not calling parent::init() here because it's stupid.
		$this->levels = 'activity';
		$this->connectionID = 'db';
		$this->logTableName = 'activity';

		if (blx()->isInstalled())
		{
			$activityTable = $this->getDbConnection()->getSchema()->getTable('{{activity}}');

			if (!$activityTable)
			{
				$this->createLogTable($this->getDbConnection(), $this->logTableName);
			}
		}
	}

	/**
	 * Creates the DB table for storing log messages.
	 *
	 * @param \CDbConnection $db the database connection
	 * @param string $tableName the name of the table to be created
	 */
	protected function createLogTable($db, $tableName)
	{
		$db = $this->getDbConnection();
		$db->createCommand()->createTable($tableName, array(
			'userId'   => array('column' => ColumnType::Int),
			'category' => array('column' => ColumnType::Varchar, 'maxLength' => 200, 'required' => true),
			'key'      => array('column' => ColumnType::Varchar, 'maxLength' => 400, 'required' => true),
			'data'     => ColumnType::Text,
			'logtime'  => array('column' => ColumnType::DateTime, 'required' => true)
		));

		$db->createCommand()->createIndex('category_idx', $tableName, 'category', false);
		$db->createCommand()->createIndex('logtime_idx', $tableName, 'logtime', false);
		$db->createCommand()->addForeignKey('activity_users_fk', $tableName, 'userId', 'users', 'id');
	}

	/**
	 * Stores log messages into database.
	 *
	 * @param array $logs list of log messages
	 */
	protected function processLogs($logs)
	{
		if (blx()->isInstalled() && ($activityTable = $this->getDbConnection()->getSchema()->getTable('{{activity}}')))
		{
			$sql="
				INSERT INTO blx_{$this->logTableName}
				(userId, category, key, data, logtime) VALUES
				(:userId, :category, :activityKey, :activityData, :logtime)
			";

			$command = $this->getDbConnection()->createCommand($sql);

			foreach($logs as $log)
			{
				$messageParts = explode('///', $log[0]);
				$command->bindValue(':userId', (int)$messageParts[0]);
				$command->bindValue(':category', $log[2]);
				$command->bindValue(':activityKey', $messageParts[1]);
				$command->bindValue(':activityData', $messageParts[2]);
				$command->bindValue(':logtime', (int)$log[3]);
				$command->execute();
			}
		}
	}
}
