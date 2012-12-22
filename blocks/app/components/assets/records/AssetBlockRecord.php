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
class AssetBlockRecord extends BaseBlockRecord
{
	protected $reservedHandleWords = array('filename', 'kind', 'width', 'height', 'size', 'dateModified');

	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'assetblocks';
	}
}
