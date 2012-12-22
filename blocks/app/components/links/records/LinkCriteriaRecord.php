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
class LinkCriteriaRecord extends BaseRecord
{
	/**
	 * @return array
	 */
	public function getTableName()
	{
		return 'linkcriteria';
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'ltrHandle'       => AttributeType::String,
			'rtlHandle'       => AttributeType::String,
			'leftEntityType'  => array(AttributeType::ClassName, 'required' => true),
			'rightEntityType' => array(AttributeType::ClassName, 'required' => true),
			'leftSettings'    => AttributeType::Mixed,
			'rightSettings'   => AttributeType::Mixed,
		);
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'links' => array(static::HAS_MANY, 'LinkRecord', 'criteriaId'),
		);
	}

	/**
	 * @return array
	 */
	public function defineIndexes()
	{
		return array(
			array('columns' => array('ltrHandle')),
			array('columns' => array('rtlHandle')),
		);
	}
}
