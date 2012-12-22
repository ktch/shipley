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
 * Global content model class
 *
 * Used for transporting entry data throughout the system.
 */
class GlobalContentModel extends BaseEntityModel
{
	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'id'       => AttributeType::Number,
			'language' => AttributeType::Language,
		);
	}

	/**
	 * Gets the blocks.
	 *
	 * @access protected
	 * @return array
	 */
	protected function getBlocks()
	{
		return blx()->globals->getAllBlocks();
	}

	/**
	 * Gets the content.
	 *
	 * @access protected
	 * @return array|\CModel
	 */
	protected function getContent()
	{
		return blx()->globals->getGlobalContentRecord($this);
	}
}
