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
 * Page model class
 *
 * Used for transporting page data throughout the system.
 */
class PageModel extends BaseEntityModel
{
	/**
	 * Use the translated page title as the string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return Blocks::t($this->title);
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		$attributes['id'] = AttributeType::Number;
		$attributes['title'] = AttributeType::String;
		$attributes['uri'] = AttributeType::String;
		$attributes['template'] = AttributeType::String;

		return $attributes;
	}

	/**
	 * Gets the blocks.
	 *
	 * @access protected
	 * @return array
	 */
	protected function getBlocks()
	{
		return blx()->pages->getBlocksByPageId($this->getAttribute('id'));
	}

	/**
	 * Gets the content.
	 *
	 * @access protected
	 * @return array|\CModel
	 */
	protected function getContent()
	{
		$content = array();

		$blocksById = array();
		foreach ($this->_getBlocks() as $block)
		{
			$blocksById[$block->id] = $block;
		}

		$contentRecord = blx()->pages->getPageContentRecordByPageId($this->getAttribute('id'));
		if ($contentRecord->content)
		{
			foreach ($contentRecord->content as $blockId => $value)
			{
				if (isset($blocksById[$blockId]))
				{
					$block = $blocksById[$blockId];
					$content[$block->handle] = $value;
				}
			}
		}

		return $content;
	}

	/**
	 * Returns the page's URL.
	 *
	 * @return string
	 */
	public function getUrl()
	{
		return Blocks::getSiteUrl().'/'.$this->uri;
	}
}
