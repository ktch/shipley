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
 * Folders parameters
 */
class FolderCriteria extends BaseCriteria
{
	public $id;
	public $parentId = false;
	public $sourceId;
	public $name;
	public $fullPath;
	public $order = 'name asc';
	public $offset;
	public $limit;

	/**
	 * Returns all entries that match the criteria.
	 *
	 * @access protected
	 * @return array
	 */
	protected function findEntities()
	{
		return blx()->assets->findFolders($this);
	}

	/**
	 * Returns the first entry that matches the criteria.
	 *
	 * @access protected
	 * @return EntryModel|null
	 */
	protected function findFirstEntity()
	{
		return blx()->assets->findFolder($this);
	}

	/**
	 * Returns the total entries that match the criteria.
	 *
	 * @access protected
	 * @return int
	 */
	protected function getTotalEntities()
	{
		return blx()->assets->getTotalFolders($this);
	}
}
