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
class LinkRecord extends BaseRecord
{
	/**
	 * @return array
	 */
	public function getTableName()
	{
		return 'links';
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'leftEntityId' => array(AttributeType::Number, 'unsigned' => true),
			'rightEntityId' => array(AttributeType::Number, 'required' => true, 'unsigned' => true),
			'leftSortOrder' => AttributeType::SortOrder,
			'rightSortOrder' => AttributeType::SortOrder,
		);
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'criteria' => array(static::BELONGS_TO, 'LinkCriteriaRecord', 'onDelete' => static::CASCADE),
		);
	}

	/**
	 * @return array
	 */
	public function defineIndexes()
	{
		return array(
			array('columns' => array('criteriaId', 'leftEntityId', 'rightEntityId'), 'unique' => true),
		);
	}
}
