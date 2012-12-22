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
class EntryTagRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'entrytags';
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'name'   => array(AttributeType::Name, 'required' => true),
			'count'  => array(AttributeType::Number, 'unsigned' => true, 'required' => true),
		);
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'entryTagEntries' => array(static::HAS_MANY, 'EntryTagEntryRecord', 'entryTagId'),
		);
	}

	/**
	 * @return array
	 */
	public function defineIndexes()
	{
		return array(
			array('columns' => array('name'), 'unique' => true)
		);
	}
}
