<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Rebrand
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 * Email message model class
 */
class EmailMessageModel extends BaseModel
{
	public function defineAttributes()
	{
		return array(
			'key'      => AttributeType::String,
			'language' => AttributeType::Language,
			'subject'  => AttributeType::String,
			'body'     => AttributeType::String,
			'htmlBody' => AttributeType::String,
		);
	}
}
