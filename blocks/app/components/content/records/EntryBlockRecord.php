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
 *
 */
class EntryBlockRecord extends BaseBlockRecord
{
	protected $reservedHandleWords = array('authorId', 'sectionId', 'language', 'title', 'slug', 'uri', 'postDate', 'expiryDate', 'enabled', 'status', 'author', 'url', 'cpEditUrl', 'tags');

	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'entryblocks';
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		$relations = array();

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			$relations['section'] = array(static::BELONGS_TO, 'SectionRecord', 'required' => true, 'onDelete' => static::CASCADE);
		}

		return $relations;
	}

	/**
	 * @return array
	 */
	public function defineIndexes()
	{
		$indexes = array();

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			$indexes[] = array('columns' => array('handle', 'sectionId'), 'unique' => true);
		}

		return $indexes;
	}
}
