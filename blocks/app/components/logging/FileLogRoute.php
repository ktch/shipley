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
class FileLogRoute extends \CFileLogRoute
{
	/**
	 *
	 */
	public function init()
	{
		$this->setLogPath(blx()->path->getLogPath());
		$this->setLogFile('blocks.log');

		$this->levels = blx()->config->get('devMode') ? '' : 'error, warning';
		$this->filter = blx()->config->get('devMode') ? 'CLogFilter' : null;

		parent::init();
	}

	/**
	 * Saves log messages in files.
	 *
	 * @param array $logs list of log messages
	 */
	protected function processLogs($logs)
	{
		$logFile = IOHelper::normalizePathSeparators($this->getLogPath().'/'.$this->getLogFile());

		if (IOHelper::getFileSize($logFile) > $this->getMaxFileSize() * 1024)
		{
			$this->rotateFiles();
		}

		$fp = @fopen($logFile, 'a');
		@flock($fp, LOCK_EX);

		foreach ($logs as $log)
		{
			@fwrite($fp, $this->formatLogMessage($log[0], $log[1], $log[2], $log[3]));
		}

		@fwrite($fp, PHP_EOL.'******************************************************************************************************'.PHP_EOL);

		@flock($fp, LOCK_UN);
		@fclose($fp);
	}
}
