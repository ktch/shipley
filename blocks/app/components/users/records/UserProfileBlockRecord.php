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
 *
 */
class UserProfileBlockRecord extends BaseBlockRecord
{
	protected $reservedHandleWords = array('id', 'username', 'photo', 'firstName', 'lastName', 'email', 'password', 'encType', 'language', 'emailFormat', 'admin', 'status', 'lastLoginDate', 'invalidLoginCount', 'lastInvalidLoginDate', 'lockoutDate', 'passwordResetRequired', 'lastPasswordChangeDate', 'dateCreated', 'verificationRequired', 'newPassword', 'groups', 'fullName', 'friendlyName', 'isCurrent', 'cooldownEndTime', 'remainingCooldownTime', 'photoUrl');

	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'userprofileblocks';
	}
}
