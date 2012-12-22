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
class IncludeTranslations_Node extends \Twig_Node
{
	/**
	 * Compiles an IncludeTranslations_Node into PHP.
	 */
	public function compile(\Twig_Compiler $compiler)
	{
		$compiler
			->addDebugInfo($this)
			->write("\Blocks\blx()->templates->includeTranslations(\n");

		foreach ($this->nodes as $index => $node)
		{
			if ($index > 0)
			{
				$compiler->raw(",\n");
			}

			$compiler->write("\t")->subcompile($node);
		}

		$compiler->raw("\n")->write(");\n");
	}
}
