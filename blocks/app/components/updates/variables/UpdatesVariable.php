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
 * Update functions
 */
class UpdatesVariable
{
	/**
	 * Returns whether the update info is cached.
	 *
	 * @return bool
	 */
	public function isUpdateInfoCached()
	{
		return blx()->updates->isUpdateInfoCached();
	}

	/**
	 * Returns whether a critical update is available.
	 *
	 * @return bool
	 */
	public function isCriticalUpdateAvailable()
	{
		return blx()->updates->isCriticalUpdateAvailable();
	}

	/**
	 * Returns the folders that need to be set to writable.
	 *
	 * @return array
	 */
	public function getUnwritableFolders()
	{
		return blx()->updates->getUnwritableFolders();
	}

	/**
	 * @param bool $forceRefresh
	 * @return mixed
	 */
	public function getUpdates($forceRefresh = false)
	{
		return blx()->updates->getUpdates($forceRefresh);
	}
}
