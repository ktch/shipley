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
 * Content functions
 */
class EntryBlocksVariable
{
	/**
	 * Returns all entry blocks.
	 *
	 * @return array
	 */
	public function getAllBlocks()
	{
		return blx()->entries->getAllBlocks();
	}

	/**
	 * Returns all entry blocks by a given section ID.
	 *
	 * @param int $sectionId
	 * @return array
	 */
	public function getBlocksBySectionId($sectionId)
	{
		return blx()->sections->getBlocksBySectionId($sectionId);
	}

	/**
	 * Returns the total number of entry blocks by a given section ID.
	 *
	 * @param int $sectionId
	 * @return int
	 */
	public function getTotalBlocksBySectionId($sectionId)
	{
		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			return blx()->sections->getTotalBlocksBySectionId($sectionId);
		}
	}

	/**
	 * Gets an entry block by its ID.
	 *
	 * @param int $id
	 * @return EntryBlockModel|null
	 */
	public function getBlockById($id)
	{
		return blx()->entries->getBlockById($id);
	}
}
