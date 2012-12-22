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
 * Settings functions
 */
class SystemSettingsVariable
{
	/**
	 * Returns whether a setting category exists.
	 *
	 * @param string $category
	 * @return bool
	 */
	public function __isset($category)
	{
		return true;
	}

	/**
	 * Returns the system settings for a category.
	 *
	 * @param string $category
	 * @return array
	 */
	public function __get($category)
	{
		return blx()->systemSettings->getSettings($category);
	}
}
