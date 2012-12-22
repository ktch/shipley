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
 * Block type template variable
 */
class BlockTypeVariable extends BaseComponentVariable
{
	/**
	 * Returns the block's input HTML.
	 *
	 * @param string $handle
	 * @param mixed $value
	 * @return string
	 */
	public function getInputHtml($handle, $value)
	{
		return $this->component->getInputHtml($handle, $value);
	}
}
