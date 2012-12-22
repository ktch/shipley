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
class WidgetRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'widgets';
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'type'      => array(AttributeType::ClassName, 'required' => true),
			'sortOrder' => AttributeType::SortOrder,
			'settings'  => AttributeType::Mixed,
		);
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'user' => array(static::BELONGS_TO, 'UserRecord', 'userId', 'required' => true, 'onDelete' => static::CASCADE),
		);
	}
}
