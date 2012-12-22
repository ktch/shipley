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
class IncludeResource_TokenParser extends \Twig_TokenParser
{
	private $_tag;

	/**
	 * Constructor
	 *
	 * @param string $tag
	 */
	function __construct($tag)
	{
		$this->_tag = $tag;
	}

	/**
	 * Parses resource include tags.
	 *
	 * @param \Twig_Token $token
	 * @return IncludeResource_Node
	 */
	public function parse(\Twig_Token $token)
	{
		$lineno = $token->getLine();
		$stream = $this->parser->getStream();
		$nodes['path'] = $this->parser->getExpressionParser()->parseExpression();

		$first = $stream->test(\Twig_Token::NAME_TYPE, 'first');

		if ($first)
		{
			$stream->next();
		}

		$stream->expect(\Twig_Token::BLOCK_END_TYPE);

		$attributes = array(
			'function' => $this->_tag,
			'first'    => $first,
		);

		return new IncludeResource_Node($nodes, $attributes, $lineno, $this->getTag());
	}

	/**
	 * Defines the tag name.
	 *
	 * @return string
	 */
	public function getTag()
	{
		return $this->_tag;
	}
}
