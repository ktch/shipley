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
class PageBlockRecord extends BaseBlockRecord
{
	protected $reservedHandleWords = array('title', 'uri', 'template', 'url');

	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'pageblocks';
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'page' => array(static::BELONGS_TO, 'PageRecord', 'required' => true, 'onDelete' => static::CASCADE),
		);
	}

	/**
	 * @return array
	 */
	public function defineIndexes()
	{
		return array(
			array('columns' => array('handle', 'pageId'), 'unique' => true),
		);
	}
}
