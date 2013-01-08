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
 * User group functions
 */
class UserGroupsVariable
{
	/**
	 * Returns all user groups.
	 *
	 * @param stirng|null $indexBy
	 * @return array
	 */
	public function getAllGroups($indexBy = null)
	{
		return blx()->userGroups->getAllGroups($indexBy);
	}

	/**
	 * Gets a user group by its ID.
	 *
	 * @param int $groupId
	 * @return UserGroupModel|null
	 */
	public function getGroupById($groupId)
	{
		return blx()->userGroups->getGroupById($groupId);
	}

	/**
	 * Gets a user group by its handle.
	 *
	 * @param string $groupHandle
	 * @return UserGroupModel|null
	 */
	public function getGroupByHandle($groupHandle)
	{
		return blx()->userGroups->getGroupByHandle($groupHandle);
	}
}
