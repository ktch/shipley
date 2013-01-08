<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Users
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 * User group model class
 *
 * Used for transporting user group data throughout the system.
 */
class UserGroupModel extends BaseModel
{
	/**
	 * Use the translated group name as the string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return Blocks::t($this->name);
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		$attributes['id'] = AttributeType::Number;
		$attributes['name'] = AttributeType::String;
		$attributes['handle'] = AttributeType::String;

		return $attributes;
	}

	/**
	 * Returns whether the group has permission to perform a given action.
	 *
	 * @param string $permission
	 * @return bool
	 */
	public function can($permission)
	{
		if ($this->id)
		{
			return blx()->userPermissions->doesGroupHavePermission($this->id, $permission);
		}
		else
		{
			return false;
		}
	}
}
