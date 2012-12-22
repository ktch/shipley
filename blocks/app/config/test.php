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

$main = require_once(BLOCKS_APP_PATH.'config/main.php');

$dbConfig['database'] = $dbConfig['database'].'_test';

return CMap::mergeArray(
	$main,

	array(
		'components' => array(
			'fixture' => array(
				'class' => 'system.test.CDbFixtureManager',
			),
			'request'
		),
	)
);
