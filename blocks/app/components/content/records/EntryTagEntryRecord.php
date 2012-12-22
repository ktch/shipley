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
class EntryTagEntryRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'entrytags_entries';
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'tag' => array(static::BELONGS_TO, 'EntryTagRecord', 'required' => true, 'onDelete' => static::CASCADE),
			'entry' => array(static::BELONGS_TO, 'EntryRecord', 'required' => true, 'onDelete' => static::CASCADE),
		);
	}
}
