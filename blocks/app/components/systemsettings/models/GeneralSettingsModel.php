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
class GeneralSettingsModel extends BaseModel
{
	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'isSystemOn' => AttributeType::Bool,
			'siteName'   => array(AttributeType::Name, 'required' => true),
			'siteUrl'    => array(AttributeType::Url, 'required' => true),
			'licenseKey' => array(AttributeType::LicenseKey, 'required' => true),
		);
	}
}
