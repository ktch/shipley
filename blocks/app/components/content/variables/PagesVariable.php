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
 * Page functions
 */
class PagesVariable
{
	// -------------------------------------------
	//  Page Blocks
	// -------------------------------------------

	/**
	 * Returns all page blocks.
	 *
	 * @return array
	 */
	public function getAllBlocks()
	{
		return blx()->pages->getAllBlocks();
	}

	/**
	 * Returns all page blocks by a given page ID.
	 *
	 * @param int $pageId
	 * @return array
	 */
	public function getBlocksByPageId($pageId)
	{
		return blx()->pages->getBlocksByPageId($pageId);
	}

	/**
	 * Returns the total number of page blocks by a given page ID.
	 *
	 * @param int $pageId
	 * @return int
	 */
	public function getTotalBlocksByPageId($pageId)
	{
		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			return blx()->pages->getTotalBlocksByPageId($pageId);
		}
	}

	/**
	 * Gets an page block by its ID.
	 *
	 * @param int $id
	 * @return PageBlockModel|null
	 */
	public function getBlockById($id)
	{
		return blx()->pages->getBlockById($id);
	}

	// -------------------------------------------
	//  Pages
	// -------------------------------------------

	/**
	 * Gets all pages.
	 *
	 * @param string|null $indexBy
	 * @return array
	 */
	public function getAllPages($indexBy = null)
	{
		return blx()->pages->getAllPages($indexBy);
	}

	/**
	 * Gets all pages that are editable by the current user.
	 *
	 * @param string|null $indexBy
	 * @return array
	 */
	public function getEditablePages($indexBy = null)
	{
		return blx()->pages->getEditablePages($indexBy);
	}

	/**
	 * Gets the total number of pages.
	 *
	 * @return int
	 */
	public function getTotalPages()
	{
		return blx()->pages->getTotalPages();
	}

	/**
	 * Gets a page by its ID.
	 *
	 * @param int $id
	 * @return PageModel|null
	 */
	public function getPageById($id)
	{
		return blx()->pages->getPageById($id);
	}

	/**
	 * Gets a page by its URI.
	 *
	 * @param string $uri
	 * @return PageModel|null
	 */
	public function getPageByUri($uri)
	{
		return blx()->pages->getPageByUri($uri);
	}
}
