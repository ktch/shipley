<?php

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

// Path to your blocks/ folder
$blocksPath = './blocks';

// Do not edit below this line
$path = dirname(__FILE__).'/'.rtrim($blocksPath, '/').'/app/index.php';

if (!is_file($path))
{
	exit('Could not find your blocks/ folder. Please ensure that <strong><code>$blocksPath</code></strong> is set correctly in '.__FILE__);
}

require_once $path;
