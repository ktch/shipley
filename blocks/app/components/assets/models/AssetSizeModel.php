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
class AssetSizeModel extends BaseModel
{
	/**
	 * Use the folder name as the string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return $this->name;
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'id'                  => AttributeType::Number,
			'name'                => AttributeType::String,
			'handle'              => AttributeType::Handle,
			'width'               => AttributeType::Number,
			'height'              => AttributeType::Number,
			'dimensionChangeTime' => AttributeType::DateTime
		);
	}
}
