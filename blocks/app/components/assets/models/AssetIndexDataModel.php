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
 * Asset source model class
 *
 * Used for transporting asset source data throughout the system.
 */
class AssetIndexDataModel extends BaseComponentModel
{
	/**
	 * Use the translated source name as the string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return $this->uri;
	}

	/**
	 * @return mixed
	 */
	public function defineAttributes()
	{
		return array(
			'id'		=> AttributeType::Number,
			'sourceId'	=> AttributeType::Number,
			'sessionId' => AttributeType::String,
			'offset'	=> AttributeType::Number,
			'uri'     	=> AttributeType::String,
			'size' 		=> AttributeType::Number,
			'recordId'	=> AttributeType::Number
		);
	}
}
