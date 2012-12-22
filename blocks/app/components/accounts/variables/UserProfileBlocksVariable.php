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
 * User management functions
 */
class UserProfileBlocksVariable
{
	/**
	 * Returns all user blocks.
	 *
	 * @return array
	 */
	public function getAllBlocks()
	{
		return blx()->users->getAllBlocks();
	}

	/**
	 * Gets a user profile block by its ID.
	 *
	 * @param int $id
	 * @return UserProfileBlockModel
	 */
	public function getBlockById($id)
	{
		return blx()->users->getBlockById($id);
	}
}
