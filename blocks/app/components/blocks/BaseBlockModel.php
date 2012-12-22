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
 * Base block model class
 *
 * Used for transporting block data throughout the system.
 *
 * @abstract
 */
abstract class BaseBlockModel extends BaseComponentModel
{
	protected $classSuffix = 'BlockModel';

	/**
	 * Use the translated block name as the string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return Blocks::t($this->name);
	}

	/**
	 * @return mixed
	 */
	public function defineAttributes()
	{
		$attributes = parent::defineAttributes();

		$attributes['name'] = AttributeType::String;
		$attributes['handle'] = AttributeType::String;
		$attributes['instructions'] = AttributeType::String;
		$attributes['required'] = AttributeType::Bool;
		$attributes['translatable'] = AttributeType::Bool;

		return $attributes;
	}
}
