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
 * Block record base class
 *
 * @abstract
 */
abstract class BaseBlockRecord extends BaseRecord
{
	public $oldHandle;
	protected $reservedHandleWords = array();

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'name'         => array(AttributeType::Name, 'required' => true),
			'handle'       => array(AttributeType::Handle, 'maxLength' => 64, 'required' => true, 'reservedWords' => $this->reservedHandleWords),
			'instructions' => array(AttributeType::String, 'column' => ColumnType::Text),
			'required'     => AttributeType::Bool,
			'translatable' => AttributeType::Bool,
			'type'         => array(AttributeType::ClassName, 'required' => true),
			'settings'     => AttributeType::Mixed,
			'sortOrder'    => AttributeType::SortOrder,
		);
	}

	/**
	 * @return array
	 */
	public function defineIndexes()
	{
		return array(
			array('columns' => 'handle', 'unique' => true)
		);
	}
}
