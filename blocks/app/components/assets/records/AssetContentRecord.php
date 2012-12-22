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
class AssetContentRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'assetcontent';
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'file' => array(static::BELONGS_TO, 'AssetFileRecord', 'unique' => true, 'required' => true, 'onDelete' => static::CASCADE),
		);
	}
}
