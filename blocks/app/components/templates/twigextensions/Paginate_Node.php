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
 * Represents a paginate node.
 */
class Paginate_Node extends \Twig_Node
{
    /**
     * Compiles the node to PHP.
     *
     * @param \Twig_Compiler
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            // the (array) cast bypasses a PHP 5.2.6 bug
            //->write("\$context['_parent'] = (array) \$context;\n")
            ->write("list(\$context['paginate'], ")
            ->subcompile($this->getNode('entitiesTarget'))
            ->raw(') = \Blocks\TemplateHelper::paginateCriteria(')
            ->subcompile($this->getNode('criteria'))
            ->raw(");\n")
            ->subcompile($this->getNode('body'))
            ->write('unset($context[\'paginate\'], ')
            ->subcompile($this->getNode('entitiesTarget'))
            ->raw(");\n");
    }
}
