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
class RequirePermission_Node extends \Twig_Node
{
	/**
	 * Compiles a RequirePermission_Node into PHP.
	 */
	public function compile(\Twig_Compiler $compiler)
	{
		$compiler
		    ->addDebugInfo($this)
		    ->write('\Blocks\blx()->userSession->requirePermission(')
		    ->subcompile($this->getNode('permissionName'))
		    ->raw(");\n");
	}
}
