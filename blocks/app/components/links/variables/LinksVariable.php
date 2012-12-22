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
 * Link type functions
 */
class LinksVariable
{
	/**
	 * Returns all installed block types.
	 *
	 * @return array
	 */
	public function getAllLinkTypes()
	{
		$linkTypes = blx()->links->getAllLinkTypes();
		return LinkTypeVariable::populateVariables($linkTypes);
	}

	/**
	 * Gets a block type.
	 *
	 * @param string $class
	 * @return LinkTypeVariable|null
	 */
	public function getLinkType($class)
	{
		$linkType = blx()->links->getLinkType($class);

		if ($linkType)
		{
			return new LinkTypeVariable($linkType);
		}
	}
}
