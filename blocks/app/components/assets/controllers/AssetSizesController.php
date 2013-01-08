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
 * Handles asset size tasks
 */
class AssetSizesController extends BaseController
{
	/**
	 * Saves an asset source.
	 */
	public function actionSaveSize()
	{
		$this->requirePostRequest();

		$size = new AssetSizeModel();
		$size->id = blx()->request->getPost('sizeId');
		$size->name = blx()->request->getPost('name');
		$size->handle = blx()->request->getPost('handle');
		$size->width = blx()->request->getPost('width');
		$size->height = blx()->request->getPost('height');

		// Did it save?
		if (blx()->assetSizes->saveSize($size))
		{
			blx()->userSession->setNotice(Blocks::t('Size saved.'));
			$this->redirectToPostedUrl(array('handle' => $size->handle));
		}
		else
		{
			blx()->userSession->setError(Blocks::t('Couldn’t save source.'));
		}

		// Reload the original template
		$this->renderRequestedTemplate(array(
			'size' => $size
		));
	}

	/**
	 * Deletes an asset size.
	 */
	public function actionDeleteSize()
	{
		$this->requirePostRequest();
		$this->requireAjaxRequest();

		$sizeHandle = blx()->request->getRequiredPost('handle');

		blx()->assetSizes->deleteSizeByHandle($sizeHandle);

		$this->returnJson(array('success' => true));
	}
}
