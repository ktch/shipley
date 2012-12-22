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
 * Stores all of the available update info.
 */
class UpdateModel extends BaseModel
{
	/**
	 * @return array|void
	 */
	public function defineAttributes()
	{
		$attributes['blocks']   = AttributeType::Mixed;
		$attributes['plugins']  = AttributeType::Mixed;
		$attributes['packages'] = AttributeType::Mixed;
		$attributes['errors']   = AttributeType::Mixed;

		return $attributes;
	}
}
