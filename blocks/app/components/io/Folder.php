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
class Folder extends BaseIO
{
	private $_size;
	private $_isEmpty;

	/**
	 * @param $path
	 */
	public function __construct($path)
	{
		clearstatcache();
		$this->path = $path;
	}

	/**
	 * @return mixed
	 */
	public function getSize()
	{
		if (!$this->_size)
		{
			$this->_size = IOHelper::getFolderSize($this->getRealPath());
		}

		return $this->_size;
	}

	/**
	 * @return mixed
	 */
	public function isEmpty()
	{
		if (!$this->_isEmpty)
		{
			$this->_isEmpty = IOHelper::isFolderEmpty($this->getRealPath());
		}

		return $this->_isEmpty;
	}

	/**
	 * @param $recursive
	 * @param $filter
	 * @return mixed
	 */
	public function getContents($recursive, $filter)
	{
		return IOHelper::getFolderContents($this->getRealPath(), $recursive, $filter);
	}

	/**
	 * @param $destination
	 * @return bool
	 */
	public function copy($destination)
	{
		if (!IOHelper::copyFolder($this->getRealPath(), $destination))
		{
			return false;
		}

		return true;
	}

	/**
	 * @return bool
	 */
	public function clear()
	{
		if (!IOHelper::clearFolder($this->getRealPath()))
		{
			return false;
		}

		return true;
	}

	/**
	 * @return bool
	 */
	public function delete()
	{
		if (!IOHelper::deleteFolder($this->getRealPath()))
		{
			return false;
		}

		return true;
	}
}
