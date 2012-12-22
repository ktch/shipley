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
class PathService extends BaseApplicationComponent
{
	private $_templatesPath;

	/**
	 * @return string
	 */
	public function getAppPath()
	{
		return BLOCKS_APP_PATH;
	}

	/**
	 * @return string
	 */
	public function getConfigPath()
	{
		return BLOCKS_CONFIG_PATH;
	}

	/**
	 * @return string
	 */
	public function getPluginsPath()
	{
		return BLOCKS_PLUGINS_PATH;
	}

	/**
	 * @return string
	 */
	public function getStoragePath()
	{
		return BLOCKS_STORAGE_PATH;
	}

	/**
	 * @return string
	 */
	public function getRuntimePath()
	{
		$path = $this->getStoragePath().'runtime/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getDbBackupPath()
	{
		$path = $this->getStoragePath().'backups/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getTempPath()
	{
		$path = $this->getRuntimePath().'temp/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getTempUploadsPath()
	{
		$path = $this->getTempPath().'uploads/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getUserPhotosPath()
	{
		$path = $this->getStoragePath().'userphotos/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getAssetsPath()
	{
		$path = $this->getStoragePath().'assets/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getAssetsImageSourcePath()
	{
		$path = $this->getAssetsPath() . 'sources/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getAssetsThumbSizesPath()
	{
		$path = $this->getAssetsPath() . 'thumbsizes/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getLogPath()
	{
		$path = $this->getStoragePath().'logs/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getStatePath()
	{
		$path = $this->getRuntimePath().'state/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getComponentsPath()
	{
		return $this->getAppPath().'components/';
	}

	/**
	 * @return string
	 */
	public function getLibPath()
	{
		return $this->getAppPath().'lib/';
	}

	/**
	 * @return string
	 */
	public function getResourcesPath()
	{
		return $this->getAppPath().'resources/';
	}

	/**
	 * @return mixed
	 */
	public function getFrameworkPath()
	{
		return $this->getAppPath().'framework/';
	}

	/**
	 * @return string
	 */
	public function getMigrationsPath()
	{
		return $this->getAppPath().'migrations/';
	}

	/**
	 * @return string
	 */
	public function getCpTranslationsPath()
	{
		return $this->getAppPath().'translations/';
	}

	/**
	 * @return string
	 */
	public function getSiteTranslationsPath()
	{
		return BLOCKS_TRANSLATIONS_PATH;
	}

	/**
	 * @return string
	 */
	public function getConsolePath()
	{
		return $this->getAppPath().'console/';
	}

	/**
	 * @return string
	 */
	public function getCommandsPath()
	{
		return $this->getConsolePath().'commands/';
	}

	/**
	 * Returns the current templates path, taking into account whether this is a CP or Site request.
	 *
	 * @return string
	 */
	public function getTemplatesPath()
	{
		if (!isset($this->_templatesPath))
		{
			if (blx()->request->isCpRequest())
			{
				$this->_templatesPath = $this->getCpTemplatesPath();
			}
			else
			{
				$this->_templatesPath = $this->getSiteTemplatesPath();
			}
		}

		return $this->_templatesPath;
	}

	/**
	 * Sets the current templates path.
	 *
	 * @param string $path
	 */
	public function setTemplatesPath($path)
	{
		$this->_templatesPath = $path;
	}

	/**
	 * Returns the Blocks CP templates path.
	 *
	 * @return string
	 */
	public function getCpTemplatesPath()
	{
		return $this->getAppPath().'templates/';
	}

	/**
	 * Returns the site templates path.
	 *
	 * @return string
	 */
	public function getSiteTemplatesPath()
	{
		return BLOCKS_TEMPLATES_PATH;
	}

	/**
	 * Returns the path to the offline template by first checking to see if they have set a custom path in config.
	 * If that is not set, it will fall back on the default CP offline template.
	 *
	 * @return mixed
	 */
	public function getOfflineTemplatePath()
	{
		// If the user has set offlinePath config item, let's use it.
		if (($path = blx()->config->get('offlinePath')) !== null)
		{
			return substr($path, 0, strlen($path) - strlen(IOHelper::getFileName($path)));
		}

		return $this->getCpTemplatesPath();
	}

	/**
	 * Returns the current parsed templates path, taking into account whether this is a CP or Site request.
	 *
	 * @return mixed
	 */
	public function getCompiledTemplatesPath()
	{
		$path = $this->getRuntimePath().'compiled_templates/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getSessionPath()
	{
		$path = $this->getRuntimePath().'sessions/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}

	/**
	 * @return string
	 */
	public function getCachePath()
	{
		$path = $this->getRuntimePath().'cache/';
		IOHelper::ensureFolderExists($path);
		return $path;
	}
}
