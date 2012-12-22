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
class Model extends BaseModel
{
	private $_attributeDefs;

	/**
	 * Constructor
	 *
	 * @param array $attributeDefs
	 */
	function __construct($attributeDefs)
	{
		$this->_attributeDefs = $attributeDefs;
		parent::__construct();
	}

	/**
	 * Defines this model's attributeDefs.
	 *
	 * @return array
	 */
	public function defineAttributes()
	{
		return $this->_attributeDefs;
	}
}
