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
 * Entry block model class.
 */
class EntryBlockModel extends BaseBlockModel
{
	/**
	 * @return mixed
	 */
	public function defineAttributes()
	{
		$attributes = parent::defineAttributes();

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			$attributes['sectionId'] = AttributeType::Number;
		}

		return $attributes;
	}
}
