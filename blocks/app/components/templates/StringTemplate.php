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
class StringTemplate
{
	public $cacheKey;
	public $template;

	/**
	 * Constructor
	 *
	 * @param string $cacheKey
	 * @param string $template
	 */
	function __construct($cacheKey = null, $template = null)
	{
		$this->cacheKey = $cacheKey;
		$this->template = $template;
	}

	/**
	 * Use the cache key as the string representation.
	 *
	 * @return string
	 */
	function __toString()
	{
		return $this->cacheKey;
	}
}
