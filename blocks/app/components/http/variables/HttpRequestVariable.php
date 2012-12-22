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
 * Request functions
 */
class HttpRequestVariable
{
	/**
	 * Returns whether this is a secure connection.
	 *
	 * @return bool
	 */
	public function isSecure()
	{
		return blx()->request->isSecureConnection();
	}

	/**
	 * Returns the request's URI.
	 *
	 * @return mixed
	 */
	public function getPath()
	{
		return blx()->request->getPath();
	}

	/**
	 * Returns the request's full URL.
	 *
	 * @return mixed
	 */
	public function getUrl()
	{
		$uri = blx()->request->getPath();
		return UrlHelper::getUrl($uri);
	}

	/**
	 * Returns all URI segments.
	 *
	 * @return array
	 */
	public function getSegments()
	{
		return blx()->request->getSegments();
	}

	/**
	 * Returns a specific URI segment, or null if the segment doesn't exist.
	 *
	 * @param int $num
	 * @return string|null
	 */
	public function getSegment($num)
	{
		return blx()->request->getSegment($num);
	}

	/**
	 * Returns the first URI segment.
	 *
	 * @return string
	 */
	public function getFirstSegment()
	{
		return blx()->request->getSegment(1);
	}

	/**
	 * Returns the last URL segment.
	 *
	 * @return string
	 */
	public function getLastSegment()
	{
		$segments = blx()->request->getSegments();

		if ($segments)
		{
			return $segments[count($segments)-1];
		}
	}

	/**
	 * Returns a variable from either the query string or the post data.
	 *
	 * @param string $name
	 * @param string $default
	 * @return mixed
	 */
	public function getParam($name, $default = null)
	{
		return blx()->request->getParam($name, $default);
	}

	/**
	 * Returns a variable from the query string.
	 *
	 * @param string $name
	 * @param string $default
	 * @return mixed
	 */
	public function getQuery($name, $default = null)
	{
		return blx()->request->getQuery($name, $default);
	}

	/**
	 * Returns a value from post data.
	 *
	 * @param string $name
	 * @param string $default
	 * @return mixed
	 */
	public function getPost($name, $default = null)
	{
		return blx()->request->getPost($name, $default);
	}

	/**
	 * Returns the server name.
	 *
	 * @return string
	 */
	public function getServerName()
	{
		return blx()->request->getServerName();
	}

	/**
	 * Returns which URL format we're using (PATH_INFO or the query string)
	 *
	 * @return string
	 */
	public function getUrlFormat()
	{
		if (blx()->config->usePathInfo())
		{
			return 'pathinfo';
		}
		else
		{
			return 'querystring';
		}
	}
}
