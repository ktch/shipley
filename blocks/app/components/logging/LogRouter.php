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
class LogRouter extends \CLogRouter
{
	/**
	 * @param $route
	 */
	public function addRoute($route)
	{
		$counter = count($this->_routes);
		$route = Blocks::createComponent($route);
		$route->init();
		$this->_routes[$counter] = $route;
	}

	/**
	 * Removes a route from the LogRouter by class name.
	 *
	 * @param $class
	 */
	public function removeRoute($class)
	{
		$match = false;

		for ($counter = 0; $counter < sizeof($this->_routes); $counter++)
		{
			if (strtolower(get_class($this->_routes[$counter])) == strtolower(__NAMESPACE__.'\\'.$class))
			{
				$match = $counter;
				break;
			}
		}

		if ($match)
			array_splice($this->_routes, $match, 1);
	}
}
