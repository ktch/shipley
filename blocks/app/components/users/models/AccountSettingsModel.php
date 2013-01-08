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
 * Validates the required User attributes for the installer.
 */
class AccountSettingsModel extends BaseModel
{
	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'username' => array(AttributeType::String, 'maxLength' => 100, 'required' => true),
			'email'    => array(AttributeType::Email, 'required' => true),
			'password' => array(AttributeType::String, 'minLength' => 6, 'required' => true)
		);
	}
}
