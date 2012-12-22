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
class InfoRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'info';
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'version'     => array(AttributeType::Version, 'required' => true),
			'build'       => array(AttributeType::Build, 'required' => true),
			'releaseDate' => array(AttributeType::DateTime, 'required' => true),
			'siteName'    => array(AttributeType::Name, 'required' => true),
			'siteUrl'     => array(AttributeType::Url, 'required' => true),
			'language'    => array(AttributeType::Language, 'required' => true),
			'licenseKey'  => array(AttributeType::LicenseKey, 'required' => true),
			'on'          => AttributeType::Bool,
		);
	}
}
