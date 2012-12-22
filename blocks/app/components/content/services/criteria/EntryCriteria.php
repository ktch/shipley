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
 * Entry criteria class
 */
class EntryCriteria extends BaseCriteria
{
	public $id;
	public $slug;
	public $uri;
	public $sectionId;
	public $section;
	public $language;
	public $authorId;
	public $authorGroupId;
	public $authorGroup;
	public $after;
	public $before;
	public $status = 'live';
	public $archived = false;
	public $editable = false;
	public $order = 'postDate desc';
	public $indexBy;

	/**
	 * Returns all entries that match the criteria.
	 *
	 * @access protected
	 * @return array
	 */
	protected function findEntities()
	{
		return blx()->entries->findEntries($this);
	}

	/**
	 * Returns the first entry that matches the criteria.
	 *
	 * @access protected
	 * @return EntryModel|null
	 */
	protected function findFirstEntity()
	{
		return blx()->entries->findEntry($this);
	}

	/**
	 * Returns the total entries that match the criteria.
	 *
	 * @access protected
	 * @return int
	 */
	protected function getTotalEntities()
	{
		return blx()->entries->getTotalEntries($this);
	}
}
