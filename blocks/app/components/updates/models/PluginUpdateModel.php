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
 * Stores the available plugin update info.
 */
class PluginUpdateModel extends BaseModel
{
	/**
	 * @return mixed
	 */
	public function defineAttributes()
	{
		$attributes['class']                   = AttributeType::String;
		$attributes['localVersion']            = AttributeType::String;
		$attributes['latestVersion']           = AttributeType::String;
		$attributes['latestDate']              = AttributeType::DateTime;
		$attributes['status']                  = AttributeType::Bool;
		$attributes['displayName']             = AttributeType::String;
		$attributes['criticalUpdateAvailable'] = AttributeType::Bool;
		$attributes['releases']                = AttributeType::Mixed;

		return $attributes;
	}
}
