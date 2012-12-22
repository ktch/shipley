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
class RequirePermission_TokenParser extends \Twig_TokenParser
{
	/**
	 * Parses {% requirePermission %} tags.
	 *
	 * @param \Twig_Token $token
	 * @return RequirePermission_Node
	 */
	public function parse(\Twig_Token $token)
	{
		$lineno = $token->getLine();
		$permissionName = $this->parser->getExpressionParser()->parseExpression();
		$this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

		return new RequirePermission_Node(array('permissionName' => $permissionName), array(), $lineno, $this->getTag());
	}

	/**
	 * Defines the tag name.
	 *
	 * @return string
	 */
	public function getTag()
	{
		return 'requirePermission';
	}
}
