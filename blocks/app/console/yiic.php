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

$config = dirname(__FILE__).'/../config/console.php';

defined('BLOCKS_BASE_PATH')         || define('BLOCKS_BASE_PATH', str_replace('\\', '/', realpath(dirname(__FILE__).'/../../')).'/');
defined('BLOCKS_APP_PATH')          || define('BLOCKS_APP_PATH',          BLOCKS_BASE_PATH.'app/');
defined('BLOCKS_CONFIG_PATH')       || define('BLOCKS_CONFIG_PATH',       BLOCKS_BASE_PATH.'config/');
defined('BLOCKS_PLUGINS_PATH')      || define('BLOCKS_PLUGINS_PATH',      BLOCKS_BASE_PATH.'plugins/');
defined('BLOCKS_STORAGE_PATH')      || define('BLOCKS_STORAGE_PATH',      BLOCKS_BASE_PATH.'storage/');
defined('BLOCKS_TEMPLATES_PATH')    || define('BLOCKS_TEMPLATES_PATH',    BLOCKS_BASE_PATH.'templates/');
defined('BLOCKS_TRANSLATIONS_PATH') || define('BLOCKS_TRANSLATIONS_PATH', BLOCKS_BASE_PATH.'translations/');

/**
 * Yii command line script file configured for Blocks.
 */

// fix for fcgi
defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

require_once(dirname(__FILE__).'/../framework/yii.php');
require_once(BLOCKS_APP_PATH.'Blocks.php');
require_once BLOCKS_APP_PATH.'Info.php';

require_once(dirname(__FILE__).'/ConsoleApplication.php');

$app = Yii::createApplication('Blocks\ConsoleApplication', $config);
$app->commandRunner->addCommands(Blocks\Blocks::getPathOfAlias('application.console.commands.*'));

$app->run();
