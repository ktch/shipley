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
 * Asset source base class
 */
abstract class BaseAssetSourceType extends BaseComponent
{
	/**
	 * The type of component this is.
	 *
	 * @access protected
	 * @var string
	 */
	protected $componentType = 'AssetSourceType';

	/**
	 * Starts an indexing session
	 * @param $sessionId
	 * @return array
	 */
	abstract public function startIndex($sessionId);

	/**
	 * Process an indexing session
	 * @param $sessionId
	 * @param $offset
	 * @return mixed
	 */
	abstract public function processIndex($sessionId, $offset);

	/**
	 * Get the image source path with the optional handle name.
	 *
	 * @param AssetFileModel $fileModel
	 * @return mixed
	 */
	public abstract function getImageSourcePath(AssetFileModel $fileModel);

	/**
	 * Get the timestamp of when a file size was last modified.
	 *
	 * @param AssetFileModel $fileModel
	 * @param string $sizeHandle
	 * @return mixed
	 */
	public abstract function getTimeSizeModified(AssetFileModel $fileModel, $sizeHandle);

	/**
	 * Insert a file from path in folder.
	 *
	 * @param AssetFolderModel $folder
	 * @param $filePath
	 * @param $fileName
	 * @return AssetFileModel
	 * @throws Exception
	 */
	abstract protected function _insertFileInFolder(AssetFolderModel $folder, $filePath, $fileName);

	/**
	 * Get a name replacement for a filename already taken in a folder.
	 *
	 * @param AssetFolderModel $folder
	 * @param $fileName
	 * @return mixed
	 */
	abstract protected function _getNameReplacement(AssetFolderModel $folder, $fileName);

	/**
	 * Put an image size for the File and handle using the provided path to the source image.
	 *
	 * @param AssetFileModel $fileModel
	 * @param $handle
	 * @param $sourceImage
	 * @return mixed
	 */
	abstract public function putImageSize(AssetFileModel $fileModel, $handle, $sourceImage);

	/**
	 * Return a result object for prompting the user about filename conflicts.
	 *
	 * @param string $fileName the cause of all trouble
	 * @return object
	 */
	protected function _getUserPromptOptions($fileName)
	{
		return (object) array(
			'message' => Blocks::t('File "{file}" already exists at target location', $fileName),
			'choices' => array(
				array('value' => AssetsHelper::ActionKeepBoth, 'title' => Blocks::t('Rename the new file and keep both')),
				array('value' => AssetsHelper::ActionReplace, 'title' => Blocks::t('Replace the existing file')),
				array('value' => AssetsHelper::ActionCancel, 'title' => Blocks::t('Keep the original file'))
			)
		);
	}

	/**
	 * Upload a file.
	 *
	 * @param AssetFolderModel $folder
	 * @return object
	 * @throws Exception
	 */
	public function uploadFile($folder)
	{
		// Upload the file and drop it in the temporary folder
		$uploader = new \qqFileUploader();

		// Make sure a file was uploaded
		if (! $uploader->file)
		{
			throw new Exception(Blocks::t('No file was uploaded'));
		}

		$size = $uploader->file->getSize();

		// Make sure the file isn't empty
		if (! $size)
		{
			throw new Exception(Blocks::t('Uploaded file was empty'));
		}

		// Save the file to a temp location and pass this on to the source type implementation
		$filePath = AssetsHelper::getTempFilePath();
		$uploader->file->save($filePath);

		if ($filename = $this->_insertFileInFolder($folder, $filePath, $uploader->file->getName())) {

		//}

		/*
		// naming conflict. create a new file and ask the user what to do with it
		if ($response->getStatus() == AssetOperationResponseModel::StatusConflict)
		{
			$newFileName = $this->_getNameReplacement($folder, $uploader->file->getName());
			$conflictResponse = $response;
			$response = $this->_insertFileInFolder($folder, $filePath, $newFileName);
		}

		if ($response->getStatus() == AssetOperationResponseModel::StatusSuccess)
		{*/
			//$filename = pathinfo($response->getResponseData()->fileName, PATHINFO_BASENAME);

			$fileModel = new AssetFileModel();
			$fileModel->sourceId = $this->model->id;
			$fileModel->folderId = $folder->id;
			$fileModel->filename = pathinfo($filename, PATHINFO_BASENAME);
			$fileModel->kind = IOHelper::getFileKind(pathinfo($filename, PATHINFO_EXTENSION));
			$fileModel->size = filesize($filePath);
			$fileModel->dateModified = IOHelper::getLastTimeModified($filePath);

			if ($fileModel->kind == 'image')
			{
				list ($width, $height) = getimagesize($filePath);
				$fileModel->width = $width;
				$fileModel->height = $height;
			}

			$fileModel->id = blx()->assets->storeFile($fileModel);

			if ($this->model->type != 'Local')
			{
				IOHelper::copyFile($filePath, blx()->path->getAssetsImageSourcePath().$fileModel->id.'.'.pathinfo($fileModel, PATHINFO_EXTENSION));
			}

			blx()->assetSizes->updateSizes($fileModel, array_keys(blx()->assetSizes->getAssetSizes()));
			// Now that we have stored all this information, we have to send back the original conflict response
			/*if (isset($conflictResponse))
			{
				$response = $conflictResponse;
			}

			$response->setResponseDataItem('file_id', $fileModel->id);
		}
		else
		{*/
			IOHelper::deleteFile($filePath);
			return true;
		}
		return false;//$response;
	}

	/**
	 * Ensure a folder entry exists in the DB for the full path and return it's id.
	 *
	 * @param $fullPath
	 * @return int
	 */
	protected function _ensureFolderByFulPath($fullPath)
	{
		$parameters = new FolderCriteria(
			array(
				'fullPath' => $fullPath,
				'sourceId' => $this->model->id
			)
		);

		$folderModel = blx()->assets->getFolder($parameters);

		// If we don't have a folder matching these, create a new one
		if (is_null($folderModel))
		{
			$parts = explode('/', rtrim($fullPath, '/'));
			$folderName = array_pop($parts);

			if (empty($parts))
			{
				$parameters->fullPath = "";
			}
			else
			{
				$parameters->fullPath = join('/', $parts) . '/';
			}

			// Look up the parent folder
			$parentFolder = blx()->assets->getFolder($parameters);
			if (is_null($parentFolder))
			{
				$parentId = null;
			}
			else
			{
				$parentId = $parentFolder->id;
			}

			$folderModel = new AssetFolderModel();
			$folderModel->sourceId = $this->model->id;
			$folderModel->parentId = $parentId;
			$folderModel->name = $folderName;
			$folderModel->fullPath = $fullPath;

			return blx()->assets->storeFolder($folderModel);
		}
		else
		{
			return $folderModel->id;
		}
	}

	/**
	 * Return a list of missing folders, when comparing the full folder list for this source against the provided list.
	 *
	 * @param array $folderList
	 * @return array
	 */
	protected function _getMissingFolders(array $folderList)
	{
		// Figure out the obsolete records for folders
		$missingFolders = array();
		$parameters = new FolderCriteria(array(
			'sourceId' => $this->model->id
		));

		$allFolders = blx()->assets->getFolders($parameters);

		foreach ($allFolders as $folderModel)
		{
			if (!isset($folderList[$folderModel->id]))
			{
				$missingFolders[$folderModel->id] = $this->model->name . '/' . $folderModel->fullPath;
			}
		}

		return $missingFolders;
	}

	/**
	 * @param $uriPath
	 * @return AssetFileModel|bool|null
	 */
	protected function _indexFile($uriPath)
	{
		$fileIndexed = false;
		$extension = IOHelper::getExtension($uriPath);

		if (IOHelper::isExtensionAllowed($extension))
		{
			$parts = explode('/', $uriPath);
			$fileName = array_pop($parts);

			$searchFullPath = join('/', $parts) . (empty($parts) ? '' : '/');

			if (empty($searchFullPath))
			{
				$parentId = null;
			}
			else
			{
				$parentId = false;
			}
			$folderParameters = new FolderCriteria(
				array(
					'sourceId' => $this->model->id,
					'fullPath' => $searchFullPath,
					'parentId' => $parentId
				)
			);

			$parentFolder = blx()->assets->getFolder($folderParameters);

			if (empty($parentFolder))
			{
				return false;
			}

			$folderId = $parentFolder->id;

			$fileParameters = new FileCriteria(
				array(
					'folderId' => $folderId,
					'filename' => $fileName
				)
			);

			$fileModel = blx()->assets->getFile($fileParameters);

			if (is_null($fileModel))
			{
				$fileModel = new AssetFileModel();
				$fileModel->sourceId = $this->model->id;
				$fileModel->folderId = $folderId;
				$fileModel->filename = $fileName;
				$fileModel->kind = IOHelper::getFileKind($extension);
				$fileId = blx()->assets->storeFile($fileModel);
				$fileModel->id = $fileId;
			}

			return $fileModel;
		}

		return false;
	}
}
