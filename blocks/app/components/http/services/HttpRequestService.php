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
class HttpRequestService extends \CHttpRequest
{
	private $_path;
	private $_segments;
	private $_pageNum = 1;

	private $_isCpRequest = false;
	private $_isResourceRequest = false;
	private $_isActionRequest = false;
	private $_isTemplateRequest = false;

	private $_actionSegments;
	private $_isMobileBrowser;
	private $_mimeType;
	private $_browserLanguages;

	/**
	 * Init
	 */
	public function init()
	{
		parent::init();

		// Get the path
		if (blx()->config->usePathInfo())
		{
			$pathInfo = $this->getPathInfo();
			$path = $pathInfo ? $pathInfo : $this->_getQueryStringPath();
		}
		else
		{
			$queryString = $this->_getQueryStringPath();
			$path = $queryString ? $queryString : $this->getPathInfo();
		}

		// Get the path segments
		$this->_segments = array_filter(explode('/', $path));

		// Is this a CP request?
		$this->_isCpRequest = ($this->getSegment(1) == blx()->config->get('cpTrigger'));

		if ($this->_isCpRequest)
		{
			// Chop the CP trigger segment off of the path & segments array
			array_shift($this->_segments);
		}

		// Is this a paginated request?
		if ($this->_segments)
		{
			// Match against the entire path string as opposed to just the last segment
			// so that we can support "/page/2"-style pagination URLs
			$path = implode('/', $this->_segments);
			$pageTrigger = str_replace('/', '\/', blx()->config->get('pageTrigger'));

			if (preg_match("/(.*)\b{$pageTrigger}(\d+)$/", $path, $match))
			{
				// Capture the page num
				$this->_pageNum = $match[2];

				// Reset the segments without the pagination stuff
				$this->_segments = array_filter(explode('/', $match[1]));
			}
		}

		// Now that we've chopped off the admin/page segments, set the path
		$this->_path = implode('/', $this->_segments);

		$this->_checkRequestType();
	}

	/**
	 * Returns the request's path, without the CP trigger segment if there is one.
	 *
	 * @return string
	 */
	public function getPath()
	{
		return $this->_path;
	}

	/**
	 * Returns an array of the path segments, without the CP trigger segment if there is one.
	 *
	 * @return array
	 */
	public function getSegments()
	{
		return $this->_segments;
	}

	/**
	 * Returns a specific URI segment, or null if the segment doesn't exist.
	 *
	 * @param int $num
	 * @return string|null
	 */
	public function getSegment($num)
	{
		if ($num > 0 && isset($this->_segments[$num-1]))
		{
			return $this->_segments[$num-1];
		}
	}

	/**
	 * Returns the page number if this is a paginated request.
	 *
	 * @return int
	 */
	public function getPageNum()
	{
		return $this->_pageNum;
	}

	/**
	 * Returns whether this is a CP request.
	 *
	 * @return bool
	 */
	public function isCpRequest()
	{
		return $this->_isCpRequest;
	}

	/**
	 * Returns whether this is a site request.
	 *
	 * @return bool
	 */
	public function isSiteRequest()
	{
		return !$this->_isCpRequest;
	}

	/**
	 * Returns whether this is a resource request.
	 *
	 * @return bool
	 */
	public function isResourceRequest()
	{
		return $this->_isResourceRequest;
	}

	/**
	 * Returns whether this is an action request.
	 *
	 * @return bool
	 */
	public function isActionRequest()
	{
		return $this->_isActionRequest;
	}

	/**
	 * Returns whether this is a template request.
	 *
	 * @return bool
	 */
	public function isTemplateRequest()
	{
		return $this->_isTemplateRequest;
	}

	/**
	 * Returns an array of the action path segments for action requests.
	 *
	 * @return array|null
	 */
	public function getActionSegments()
	{
		return $this->_actionSegments;
	}

	/**
	 * @return mixed
	 */
	public function getMimeType()
	{
		if (!$this->_mimeType)
		{
			$extension = IOHelper::getExtension($this->getPath(), 'html');
			$this->_mimeType = IOHelper::getMimeTypeByExtension('.'.$extension);
		}

		return $this->_mimeType;
	}

	/**
	 * Returns the named GET or POST parameter value, or throws an exception if it's not set
	 *
	 * @param $name
	 * @throws Exception
	 * @return mixed
	 */
	public function getRequiredParam($name)
	{
		$value = $this->getParam($name);

		if ($value !== null)
		{
			return $value;
		}
		else
		{
			throw new Exception(Blocks::t('Param “{name}” doesn’t exist.', array('name' => $name)));
		}
	}

	/**
	 * Returns the named GET parameter value, or throws an exception if it's not set
	 *
	 * @param $name
	 * @throws Exception
	 * @return mixed
	 */
	public function getRequiredQuery($name)
	{
		$value = $this->getQuery($name);

		if ($value !== null)
		{
			return $value;
		}
		else
		{
			throw new Exception(Blocks::t('GET param “{name}” doesn’t exist.', array('name' => $name)));
		}
	}

	/**
	 * Returns the named GET or POST parameter value, or throws an exception if it's not set
	 *
	 * @param $name
	 * @throws Exception
	 * @return mixed
	 */
	public function getRequiredPost($name)
	{
		$value = $this->getPost($name);

		if ($value !== null)
		{
			return $value;
		}
		else
		{
			throw new Exception(Blocks::t('POST param “{name}” doesn’t exist.', array('name' => $name)));
		}
	}

	/**
	 * Returns whether the request is coming from a mobile browser
	 * Detection script courtesy of http://detectmobilebrowsers.com
	 *
	 * @return bool Whether the request is coming from a mobile browser
	 */
	public function isMobileBrowser()
	{
		if (!isset($this->_isMobileBrowser))
		{
			$useragent = $_SERVER['HTTP_USER_AGENT'];

			if (preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
			{
				$this->_isMobileBrowser = true;
			}
			else
			{
				$this->_isMobileBrowser = false;
			}
		}

		return $this->_isMobileBrowser;
	}

	/**
	 * Returns the user preferred languages sorted by preference.
	 * The returned language IDs will be canonicalized using {@link Locale::getCanonicalID}.
	 * This method returns false if the user does not have language preferences.
	 *
	 * @return array the user preferred languages.
	 */
	public function getBrowserLanguages()
	{
		if ($this->_browserLanguages === null)
		{
			if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && ($n = preg_match_all('/([\w\-_]+)\s*(;\s*q\s*=\s*(\d*\.\d*))?/', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $matches)) > 0)
			{
				$languages = array();

				for ($i = 0; $i < $n; ++$i)
				{
					$languages[$matches[1][$i]] = empty($matches[3][$i]) ? 1.0 : floatval($matches[3][$i]);
				}

				// Sort by it's weight.
				arsort($languages);

				foreach ($languages as $language => $pref)
				{
					$this->_browserLanguages[] = Locale::getCanonicalID($language);
				}
			}

			if ($this->_browserLanguages === null)
			{
				return false;
			}
		}

		return $this->_browserLanguages;
	}


	/**
	 * Sends a file to the user.
	 *
	 * We're overriding this from \CHttpRequest so we can have more control over the headers.
	 *
	 * @param string $path
	 * @param string $content
	 * @param array|null $options
	 * @param bool|null $terminate
	 */
	public function sendFile($path, $content, $options = array(), $terminate = true)
	{
		$fileName = IOHelper::getFileName($path, true);

		// Clear the output buffer to prevent corrupt downloads.
		// Need to check the OB status first, or else some PHP versions will throw an E_NOTICE since we have a custom error handler
		// (http://pear.php.net/bugs/bug.php?id=9670)
		if (ob_get_length() !== false)
		{
			ob_clean();
		}

		// Default to disposition to 'download'
		if (!isset($options['forceDownload']) || $options['forceDownload'])
		{
			header('Content-Disposition: attachment; filename="'.$fileName.'"');
		}

		if (empty($options['mimeType']))
		{
			if (($options['mimeType'] = \CFileHelper::getMimeTypeByExtension($fileName)) === null)
			{
				$options['mimeType'] = 'text/plain';
			}
		}

		header('Content-type: '.$options['mimeType']);

		if (!empty($options['cache']))
		{
			$cacheTime = 31536000; // 1 year
			header('Expires: '.gmdate('D, d M Y H:i:s', time() + $cacheTime).' GMT');
			header('Pragma: cache');
			header('Cache-Control: max-age='.$cacheTime);
			$modifiedTime = IOHelper::getLastTimeModified($path);
			header('Last-Modified: '.gmdate('D, d M Y H:i:s', $modifiedTime->getTimestamp().' GMT'));
		}
		else
		{
			header('Pragma: public');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		}

		if (!ob_get_length())
		{
			header('Content-Length: '.(function_exists('mb_strlen') ? mb_strlen($content, '8bit') : strlen($content)));
		}

		if ($options['mimeType'] == 'application/x-javascript' || $options['mimeType'] == 'text/css')
		{
			header('Vary: Accept-Encoding');
		}

		if($terminate)
		{
			// clean up the application first because the file downloading could take long time
			// which may cause timeout of some resources (such as DB connection)
			Blocks::app()->end(0, false);
			echo $content;
			exit(0);
		}
		else
		{
			echo $content;
		}
	}

	/**
	 * Returns a cookie, if it's set.
	 *
	 * @param string $name
	 * @return \CHttpCookie|null
	 */
	public function getCookie($name)
	{
		if (isset($this->cookies[$name]))
		{
			return $this->cookies[$name];
		}
	}

	// Rename getIsX() => isX() functions for consistency
	//  - We realize that these methods could be called as if they're properties (using CComponent's magic getter)
	//    but we're trying to resist the temptation of magic methods for the sake of code obviousness.

	/**
	 * @return bool
	 */
	public function isSecureConnection()
	{
		return $this->getIsSecureConnection();
	}

	/**
	 * @return bool
	 */
	public function isPostRequest()
	{
		return $this->getIsPostRequest();
	}

	/**
	 * @return bool
	 */
	public function isDeleteRequest()
	{
		return $this->getIsDeleteRequest();
	}

	/**
	 * @return bool
	 */
	public function isDeleteViaPostRequest()
	{
		return $this->getIsDeleteViaPostRequest();
	}

	/**
	 * @return bool
	 */
	public function isPutRequest()
	{
		return $this->getIsPutRequest();
	}

	/**
	 * @return bool
	 */
	public function isPutViaPostRequest()
	{
		return $this->getIsPutViaPostRequest();
	}

	/**
	 * @return bool
	 */
	public function isAjaxRequest()
	{
		return $this->getIsAjaxRequest();
	}

	/**
	 * @return bool
	 */
	public function isFlashRequest()
	{
		return $this->getIsFlashRequest();
	}

	/**
	 * Returns the query string path.
	 *
	 * @access private
	 * @return string
	 */
	private function _getQueryStringPath()
	{
		$pathParam = blx()->urlManager->pathParam;
		return trim($this->getQuery($pathParam, ''), '/');
	}

	/**
	 * Checks to see if this is an action or resource request.
	 *
	 * @access private
	 */
	private function _checkRequestType()
	{
		$resourceTrigger = blx()->config->get('resourceTrigger');
		$actionTrigger = blx()->config->get('actionTrigger');
		$loginPath = trim(blx()->config->get('loginPath'), '/');
		$resetPasswordPath = trim(blx()->config->get('resetPasswordPath'), '/');
		$logoutPath = trim(blx()->config->get('logoutPath'), '/');
		$firstSegment = $this->getSegment(1);

		// If the first path segment is the resource trigger word, it's a resource request.
		if ($firstSegment === $resourceTrigger)
		{
			$this->_isResourceRequest = true;
			return;
		}

		// If the first path segment is the action trigger word, or the logout trigger word (special case), it's an action request
		if ($firstSegment === $actionTrigger || in_array($this->_path, array($loginPath, $resetPasswordPath, $logoutPath)))
		{
			$this->_isActionRequest = true;

			if ($this->_path == $loginPath)
			{
				$this->_actionSegments = array('users', 'login');
			}
			else if ($this->_path == $resetPasswordPath)
			{
				$this->_actionSegments = array('users', 'resetPassword');
			}
			else if ($this->_path == $logoutPath)
			{
				$this->_actionSegments = array('users', 'logout');
			}
			else
			{
				$this->_actionSegments = array_slice($this->_segments, 1);
			}

			return;
		}

		// If there's a non-empty 'action' param (either in the query string or post data), it's an action request
		if (($action = $this->getParam('action')) !== null)
		{
			$this->_isActionRequest = true;
			$this->_actionSegments = array_filter(explode('/', $action));
			return;
		}

		$this->_isTemplateRequest = true;
	}
}

