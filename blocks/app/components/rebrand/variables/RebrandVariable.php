<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Rebrand
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */


/**
 * Rebranding functions
 */
class RebrandVariable
{
	private $_logoPath;
	private $_logoVariable;

	/**
	 * Returns whether a custom logo has been uploaded.
	 *
	 * @return bool
	 */
	public function isLogoUploaded()
	{
		return ($this->_getLogoPath() !== false);
	}

	/**
	 * Returns the logo variable, or false if a logo hasn't been uploaded.
	 *
	 * @return LogoVariable|false
	 */
	public function getLogo()
	{
		if (!isset($this->_logoVariable))
		{
			$logoPath = $this->_getLogoPath();

			if ($logoPath !== false)
			{
				$this->_logoVariable = new LogoVariable($logoPath);
			}
			else
			{
				$this->_logoVariable = false;
			}
		}

		return $this->_logoVariable;
	}

	/**
	 * Returns the path to the logo, or false if a logo hasn't been uploaded.
	 *
	 * @access private
	 * @return string|false
	 */
	private function _getLogoPath()
	{
		if (!isset($this->_logoPath))
		{
			$files = IOHelper::getFolderContents(blx()->path->getStoragePath().'logo/', false);
			if (!empty($files))
			{
				$this->_logoPath = $files[0];
			}
			else
			{
				$this->_logoPath = false;
			}
		}

		return $this->_logoPath;
	}
}
