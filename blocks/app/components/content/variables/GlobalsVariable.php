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
 * Globals functions
 */
class GlobalsVariable
{
	/**
	 * Returns all global blocks.
	 *
	 * @return array
	 */
	public function getAllBlocks()
	{
		return blx()->globals->getAllBlocks();
	}

	/**
	 * Returns the total number of global blocks.
	 *
	 * @return int
	 */
	public function getTotalBlocks()
	{
		return blx()->globals->getTotalBlocks();
	}

	/**
	 * Gets a block by its ID.
	 *
	 * @param int $id
	 * @return GlobalBlockModel|null
	 */
	public function getBlockById($id)
	{
		return blx()->globals->getBlockById($id);
	}
}
