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
 * Stores the info for a plugin release.
 */
class PluginNewReleaseModel extends BaseModel
{
	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		$attributes['version']  = AttributeType::String;
		$attributes['date']     = AttributeType::DateTime;
		$attributes['notes']    = AttributeType::String;
		$attributes['critical'] = AttributeType::Bool;

		return $attributes;
	}
}
