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
 * CP functions
 */
class CpVariable
{
	/**
	 * Get the sections of the CP.
	 *
	 * @return array
	 */
	public function nav()
	{
		$nav['dashboard'] = array('name' => Blocks::t('Dashboard'));
		$nav['content'] = array('name' => Blocks::t('Content'));
		$nav['assets'] = array('name' => Blocks::t('Assets'));

		if (Blocks::hasPackage(BlocksPackage::Users) && blx()->user->can('editUsers'))
		{
			$nav['users'] = array('name' => Blocks::t('Users'));
		}

		// Add any Plugin nav items
		$plugins = blx()->plugins->getPlugins();

		foreach ($plugins as $plugin)
		{
			if ($plugin->hasCpSection())
			{
				$lcHandle = strtolower($plugin->getClassHandle());
				$nav[$lcHandle] = array('name' => $plugin->getName());

				// Does the plugin have an icon?
				$resourcesPath = blx()->path->getPluginsPath().$lcHandle.'/resources/';

				if (IOHelper::fileExists($resourcesPath.'icon-16x16.png'))
				{
					$nav[$lcHandle]['hasIcon'] = true;

					$url = UrlHelper::getResourceUrl($lcHandle.'/icon-16x16.png');
					blx()->templates->includeCss("#sidebar #nav-{$lcHandle} { background-image: url('{$url}'); }");

					// Does it even have a hi-res version?
					if (IOHelper::fileExists($resourcesPath.'icon-32x32.png'))
					{
						$url = UrlHelper::getResourceUrl($lcHandle.'/icon-32x32.png');
						blx()->templates->includeHiResCss("#sidebar #nav-{$lcHandle} { background-image: url('{$url}'); }");
					}
				}
			}
		}

		if (blx()->user->can('autoUpdateBlocks'))
		{
			$numberOfUpdates = blx()->updates->getTotalNumberOfAvailableUpdates();

			if ($numberOfUpdates > 0)
			{
				$nav['updates'] = array('name' => Blocks::t('Updates'), 'badge' => $numberOfUpdates);
			}
			else
			{
				$nav['updates'] = array('name' => Blocks::t('Updates'));
			}
		}

		if (blx()->user->isAdmin())
		{
			$nav['settings'] = array('name' => Blocks::t('Settings'));
		}

		return $nav;
	}
}
