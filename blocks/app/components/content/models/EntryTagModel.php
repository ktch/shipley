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
 * EntryTag model class
 *
 * Used for transporting entry tag data throughout the system.
 */
class EntryTagModel extends BaseModel
{
	/**
	 * Use the entry tag name as its string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return $this->name;
	}

	public function defineAttributes()
	{
		$attributes['name'] = AttributeType::String;
		return $attributes;
	}
}
