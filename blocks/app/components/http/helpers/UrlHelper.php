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
class UrlHelper
{
	/**
	 * Returns either a CP or a site URL, depending on the request type.
	 *
	 * @static
	 * @param string            $path
	 * @param array|string|null $params
	 * @param string|null       $protocol
	 * @param bool              $mustShowScriptName
	 * @return string
	 */
	public static function getUrl($path = '', $params = null, $protocol = '', $mustShowScriptName = false)
	{
		// Return $path if it appears to be an absolute URL.
		if (strpos($path, '://') !== false)
		{
			return $path;
		}

		$path = trim($path, '/');

		if (blx()->request->isCpRequest())
		{
			$path = blx()->config->get('cpTrigger').($path ? '/'.$path : '');
			$dynamicBaseUrl = true;
		}
		else
		{
			$dynamicBaseUrl = false;
		}

		return static::_getUrl($path, $params, $protocol, $dynamicBaseUrl, $mustShowScriptName);
	}

	/**
	 * Returns a CP URL.
	 *
	 * @static
	 * @param string $path
	 * @param array|string|null $params
	 * @param string|null $protocol
	 * @return string
	 */
	public static function getCpUrl($path = '', $params = null, $protocol = '')
	{
		$path = trim($path, '/');
		$path = blx()->config->get('cpTrigger').'/'.$path;
		return static::_getUrl($path, $params, $protocol, true, false);
	}

	/**
	 * Returns a site URL.
	 *
	 * @static
	 * @param string $path
	 * @param array|string|null $params
	 * @param string|null $protocol
	 * @return string
	 */
	public static function getSiteUrl($path = '', $params = null, $protocol = '')
	{
		$path = trim($path, '/');
		return static::_getUrl($path, $params, $protocol, false, false);
	}

	/**
	 * Returns a resource URL.
	 *
	 * @static
	 * @param string $path
	 * @param array|string|null $params
	 * @param string|null $protocol protocol to use (e.g. http, https). If empty, the protocol used for the current request will be used.
	 * @return string
	 */
	public static function getResourceUrl($path = '', $params = null, $protocol = '')
	{
		$path = $origPath = trim($path, '/');
		$path = blx()->config->get('resourceTrigger').'/'.$path;

		// Add timestamp to the resource URL for caching, if Blocks is not operating in dev mode
		if ($origPath && !blx()->config->get('devMode'))
		{
			$realPath = blx()->resources->getResourcePath($origPath);

			if ($realPath)
			{
				if (!is_array($params))
				{
					$params = array($params);
				}

				$dateParam = blx()->resources->dateParam;
				$timeModified = IOHelper::getLastTimeModified($realPath);
				$params[$dateParam] = $timeModified->getTimestamp();
			}
		}

		return static::getUrl($path, $params, $protocol);
	}

	/**
	 * @static
	 * @param string $path
	 * @param null   $params
	 * @param string $protocol protocol to use (e.g. http, https). If empty, the protocol used for the current request will be used.
	 * @return array|string
	 */
	public static function getActionUrl($path = '', $params = null, $protocol = '')
	{
		$path = blx()->config->get('actionTrigger').'/'.trim($path, '/');
		return static::getUrl($path, $params, $protocol, true);
	}

	/**
	 * Returns a URL.
	 *
	 * @static
	 * @access private
	 * @param string $path
	 * @param array|string $params
	 * @param string protocol
	 */
	private function _getUrl($path, $params, $protocol, $dynamicBaseUrl, $mustShowScriptName)
	{
		$anchor = '';

		// Normalize the params
		if (is_array($params))
		{
			foreach ($params as $name => $value)
			{
				if (!is_numeric($name))
				{
					if ($name == '#')
					{
						$anchor = '#'.$value;
					}
					else if ($value !== null && $value !== '')
					{
						$params[] = $name.'='.$value;
					}

					unset($params[$name]);
				}
			}

			$params = implode('&', array_filter($params));
		}
		else
		{
			$params = ltrim($params, '&?');
		}

		if ($dynamicBaseUrl)
		{
			$baseUrl = blx()->request->getHostInfo($protocol).blx()->urlManager->getBaseUrl();

			if (!$mustShowScriptName && blx()->config->omitScriptNameInUrls())
			{
				$baseUrl = substr($baseUrl, 0, strrpos($baseUrl, '/'));
			}
		}
		else
		{
			$baseUrl = Blocks::getSiteUrl();

			if ($mustShowScriptName || !blx()->config->omitScriptNameInUrls())
			{
				$baseUrl .= strrchr(blx()->urlManager->getBaseUrl(), '/');
			}
		}

		// Put it all together
		if (blx()->config->usePathInfo())
		{
			return $baseUrl.($path ? '/'.$path : '').($params ? '?'.$params : '').$anchor;
		}
		else
		{
			$pathParam = blx()->urlManager->pathParam;
			return $baseUrl.($path || $params ? '?'.($path ? $pathParam.'='.$path : '').($path && $params ? '&' : '').$params : '').$anchor;
		}
	}
}
