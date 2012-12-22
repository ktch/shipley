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

$common = require_once(BLOCKS_APP_PATH.'config/common.php');

Yii::setPathOfAlias('app', BLOCKS_APP_PATH);
Yii::setPathOfAlias('plugins', BLOCKS_PLUGINS_PATH);

return CMap::mergeArray(
	$common,

	array(
		'basePath'    => BLOCKS_APP_PATH,
		'runtimePath' => BLOCKS_STORAGE_PATH.'runtime/',
		'name'        => 'Blocks',

		// autoloading model and component classes
		'import' => array(
			'application.lib.*',
			'application.lib.PhpMailer.*',
			'application.lib.Requests.*',
			'application.lib.Requests.Auth.*',
			'application.lib.Requests.Response.*',
			'application.lib.Requests.Transport.*',
			'application.lib.qqFileUploader.*',
		),

		'params' => array(
			'blocksConfig'         => $blocksConfig,
			'requiredPhpVersion'   => '5.3.0',
			'requiredMysqlVersion' => '5.1.0'
		),
	)
);
