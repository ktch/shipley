<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   PublishPro
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 *
 */
class EntryVersionModel extends EntryModel
{
	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		$attributes = parent::defineAttributes();

		$attributes['versionId'] = AttributeType::Number;
		$attributes['creatorId'] = AttributeType::Number;
		$attributes['notes'] = AttributeType::String;
		$attributes['dateCreated'] = AttributeType::DateTime;

		return $attributes;
	}

	/**
	 * Populates a new model instance with a given set of attributes.
	 *
	 * @static
	 * @param mixed $attributes
	 * @return EntryVersionModel
	 */
	public static function populateModel($attributes)
	{
		if ($attributes instanceof \CModel)
		{
			$attributes = $attributes->getAttributes();
		}

		// Merge the version and entry data
		$entryData = $attributes['data'];
		$blockContent = $entryData['blocks'];
		$attributes['versionId'] = $attributes['id'];
		$attributes['id'] = $attributes['entryId'];
		unset($attributes['data'], $entryData['blocks'], $attributes['entryId']);

		$attributes = array_merge($attributes, $entryData);

		// Initialize the version
		$version = parent::populateModel($attributes);
		$version->setContentIndexedByBlockId($blockContent);

		return $version;
	}

	/**
	 * Returns the version's creator.
	 *
	 * @return UserModel|null
	 */
	public function getCreator()
	{
		return blx()->accounts->getUserById($this->creatorId);
	}
}
