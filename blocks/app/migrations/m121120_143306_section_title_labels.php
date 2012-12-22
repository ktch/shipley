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
 * The class name is the UTC timestamp in the format of mYYMMDD_HHMMSS_migrationName
 */
class m121120_143306_section_title_labels extends \CDbMigration
{
	/**
	 * Any migration code in here is wrapped inside of a transaction.
	 *
	 * @return bool
	 */
	public function safeUp()
	{
		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			// Add the titleLabel column to blx_sections
			$config = array('column' => ColumnType::Varchar, 'null' => false, 'default' => 'Title');
			blx()->db->createCommand()->addColumnAfter('sections', 'titleLabel', $config, 'handle');
		}

		return true;
	}
}
