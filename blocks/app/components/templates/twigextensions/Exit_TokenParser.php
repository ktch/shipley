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
class Exit_TokenParser extends \Twig_TokenParser
{
	/**
	 * Parses {% exit %} tags.
	 *
	 * @param \Twig_Token $token
	 * @return Exit_Node
	 */
	public function parse(\Twig_Token $token)
	{
		$lineno = $token->getLine();
		$stream = $this->parser->getStream();

		if ($stream->test(\Twig_Token::NUMBER_TYPE))
		{
			$status = $this->parser->getExpressionParser()->parseExpression();
		}
		else
		{
			$status = null;
		}

		$stream->expect(\Twig_Token::BLOCK_END_TYPE);

		return new Exit_Node(array('status' => $status), array(), $lineno, $this->getTag());
	}

	/**
	 * Defines the tag name.
	 *
	 * @return string
	 */
	public function getTag()
	{
		return 'exit';
	}
}
