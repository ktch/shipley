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
class AssetFolderModel extends BaseModel
{

	/**
	 * Breadcrumbs for this folder (array of id => folder name ordered by depth)
	 * @var array
	 */
	private $_breadCrumbs = null;

	/**
	 * Use the folder name as the string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return $this->name;
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'id'       => AttributeType::Number,
			'parentId' => AttributeType::Number,
			'sourceId' => AttributeType::Number,
			'name'     => AttributeType::String,
			'fullPath' => AttributeType::String,
		);
	}

	/**
	 * @return AssetSourceModel|null
	 */
	public function getSource()
	{
		return blx()->assetSources->getSourceById($this->sourceId);
	}

	/**
	 * Return this folder's breadcrumbs
	 * @return array
	 */
	public function getBreadCrumbs()
	{
		return array();
	}
}
