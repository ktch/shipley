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
class TemplateLoaderException extends Exception
{
	public $template;

	/**
	 * @param string $template
	 */
	function __construct($template)
	{
		$this->template = $template;
		$message = Blocks::t('Unable to find the template “{template}”.', array('template' => $this->template));
		Blocks::log($message, \CLogger::LEVEL_ERROR);
		parent::__construct($message, null, null);
	}
}
