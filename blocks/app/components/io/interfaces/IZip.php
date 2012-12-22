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
interface IZip
{
	/**
	 * @param $sourceFolder
	 * @param $destZip
	 * @return mixed
	 */
	function zip($sourceFolder, $destZip);

	/**
	 * @param $sourceZip
	 * @param $destFolder
	 * @return mixed
	 */
	function unzip($sourceZip, $destFolder);

	/**
	 * @param      $sourceZip
	 * @param      $filePath
	 * @param      $basePath
	 * @param null $pathPrefix
	 * @return mixed
	 */
	function add($sourceZip, $filePath, $basePath, $pathPrefix = null);
}
