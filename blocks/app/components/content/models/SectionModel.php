<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   PublishPro
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 * Section model class
 *
 * Used for transporting section data throughout the system.
 */
class SectionModel extends BaseModel
{
	/**
	 * Use the translated section name as the string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return Blocks::t($this->name);
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'id'         => AttributeType::Number,
			'name'       => AttributeType::String,
			'handle'     => AttributeType::String,
			'titleLabel' => AttributeType::String,
			'hasUrls'    => AttributeType::Bool,
			'urlFormat'  => AttributeType::String,
			'template'   => AttributeType::String,
		);
	}
}
