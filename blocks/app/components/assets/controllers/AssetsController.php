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
 * Handles asset tasks
 * TODO: Permissions?
 */
class AssetsController extends BaseEntityController
{
	/**
	 * Returns the block service instance.
	 *
	 * @return AssetsService
	 */
	protected function getService()
	{
		return blx()->assets;
	}


	/**
	 * Upload a file
	 */
	public function actionUploadFile()
	{
		$this->requireAjaxRequest();
		$folderId = blx()->request->getRequiredQuery('folderId');
		$userResponse = blx()->request->getPost('userResponse');

		$output = blx()->assets->uploadFile($folderId, $userResponse);

		$this->returnJson(array('success' => true));
	}

	/**
	 * View a folder
	 */
	public function actionViewFolder()
	{
		$this->requireAjaxRequest();
		$folderId = blx()->request->getRequiredPost('folderId');
		$requestId = blx()->request->getPost('requestId', 0);
		$viewType = blx()->request->getPost('viewType', 'thumbs');

		$folder = blx()->assets->getFolderById($folderId);
		$files = blx()->assets->getFilesByFolderId($folderId);


		$subfolders = blx()->assets->findFolders(
			new FolderCriteria(
				array(
					'parentId' => $folderId
				)
			)
		);

		$html = blx()->templates->render('assets/_views/folder_contents',
			array(
				'folder' => $folder,
				'subfolders' => $subfolders,
				'view' => $viewType,
				'files' => $files
			)
		);

		$this->returnJson(array(
			'requestId' => $requestId,
			'html' => $html
		));
	}

	/**
	 * View a file's block content.
	 */
	public function actionViewFile()
	{
		$requestId = blx()->request->getPost('requestId', 0);
		$fileId = blx()->request->getRequiredPost('fileId');
		$html = blx()->templates->render('assets/_views/file',
			array(
				'file' => blx()->assets->getFileById($fileId)
			)
		);
		$this->returnJson(array(
			'requestId' => $requestId,
			'headHtml' => blx()->templates->getHeadNodes(),
			'bodyHtml' => $html,
			'footHtml' => blx()->templates->getFootNodes(),
		));
	}

	/**
	 * Save a file's block content
	 */
	public function actionSaveFile()
	{
		$this->requireLogin();
		$this->requireAjaxRequest();
		$file = blx()->assets->getFileById(blx()->request->getRequiredPost('fileId'));

		if ($file) {
			$file->setContent(blx()->request->getPost('blocks'));
			blx()->assets->storeFileBlocks($file);
			$this->returnJson(array('success' => true));
		}
	}
}
