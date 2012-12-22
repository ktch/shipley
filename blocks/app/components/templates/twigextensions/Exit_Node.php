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
class Exit_Node extends \Twig_Node
{
	/**
	 * Compiles a Exit_Node into PHP.
	 */
	public function compile(\Twig_Compiler $compiler)
	{
		$compiler->addDebugInfo($this);

		if ($status = $this->getNode('status'))
		{
			$compiler
				->write('throw new \Blocks\HttpException(')
				->subcompile($status)
				->raw(");\n");
		}
		else
		{
			$compiler->write("\Blocks\blx()->end();\n");
		}
	}
}
