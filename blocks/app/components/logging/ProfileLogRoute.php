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
class ProfileLogRoute extends \CProfileLogRoute
{
	/**
	 * @access protected
	 * @param $view
	 * @param $data
	 * @return mixed
	 */
	protected function render($view, $data)
	{
		$isAjax = blx()->request->isAjaxRequest();
		$mimeType = blx()->request->getMimeType();

		if (blx()->config->get('devMode') && !blx()->request->isResourceRequest())
		{
			if ($this->showInFireBug)
			{
				if ($isAjax && $this->ignoreAjaxInFireBug)
				{
					return;
				}

				$view .= '-firebug';
			}
			else if(!(blx() instanceof \CWebApplication) || $isAjax)
			{
				return;
			}

			if ($mimeType !== 'text/html')
			{
				return;
			}

			$viewFile = blx()->path->getCpTemplatesPath().'logging/'.$view.'.php';
			include(blx()->findLocalizedFile($viewFile, 'en'));
		}
	}
}
