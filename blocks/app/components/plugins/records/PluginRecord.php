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
class PluginRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'plugins';
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'class'    => array(AttributeType::ClassName, 'required' => true),
			'version'  => array(AttributeType::Version, 'required' => true),
			'enabled'  => AttributeType::Bool,
			'settings' => AttributeType::Mixed,
		);
	}
}
