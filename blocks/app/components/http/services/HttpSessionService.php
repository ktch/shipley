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
 * Extends CHttpSession to add support for setting the session folder and creating it if it doesn't exist.
 */
class HttpSessionService extends \CHttpSession
{
	/**
	 *
	 */
	public function init()
	{
		$this->setSavePath(blx()->path->getSessionPath());
		parent::init();
	}

	// For consistency!
	/**
	 * @return bool
	 */
	public function isStarted()
	{
		return $this->getIsStarted();
	}
}
