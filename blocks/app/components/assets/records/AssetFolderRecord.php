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
class AssetFolderRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'assetfolders';
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'name'     => array(AttributeType::String, 'required' => true),
			'fullPath' => array(AttributeType::String),
		);
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'parent' => array(static::BELONGS_TO, 'AssetFolderRecord', 'onDelete' => static::CASCADE),
			'source' => array(static::BELONGS_TO, 'AssetSourceRecord', 'required' => true, 'onDelete' => static::CASCADE),
		);
	}

	/**
	 * @return array
	 */
	public function defineIndexes()
	{
		return array(
			array('columns' => array('name', 'parentId', 'sourceId'), 'unique' => true),
		);
	}
}
