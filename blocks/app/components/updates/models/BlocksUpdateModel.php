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
 * Stores the available Blocks update info.
 */
class BlocksUpdateModel extends BaseModel
{
	/**
	 * @return array|void
	 */
	public function defineAttributes()
	{
		$attributes['localBuild']              = AttributeType::String;
		$attributes['localVersion']            = AttributeType::String;
		$attributes['latestVersion']           = AttributeType::String;
		$attributes['latestBuild']             = AttributeType::String;
		$attributes['latestDate']              = AttributeType::DateTime;
		$attributes['criticalUpdateAvailable'] = AttributeType::Bool;
		$attributes['manualUpdateRequired']    = AttributeType::Bool;
		$attributes['versionUpdateStatus']     = AttributeType::String;
		$attributes['releases']                = AttributeType::Mixed;

		return $attributes;
	}
}
