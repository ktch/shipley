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
 * Plugin functions
 */
class PluginsVariable
{
	/**
	 * Returns a plugin.
	 *
	 * @param string $class
	 * @param bool   $enabledOnly
	 * @return PluginRecord
	 */
	public function getPlugin($class, $enabledOnly = true)
	{
		$plugin = blx()->plugins->getPlugin($class, $enabledOnly);

		if ($plugin)
		{
			return new PluginVariable($plugin);
		}
	}

	/**
	 * Returns all plugins.
	 *
	 * @return array
	 */
	public function getPlugins($enabledOnly = true)
	{
		$plugins = blx()->plugins->getPlugins($enabledOnly);
		return PluginVariable::populateVariables($plugins);
	}
}
