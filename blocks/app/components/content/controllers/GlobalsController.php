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
 * Globals controller class
 */
class GlobalsController extends BaseEntityController
{
	/**
	 * Returns the block service instance.
	 *
	 * @return GlobalBlocksService
	 */
	protected function getService()
	{
		return blx()->globals;
	}

	/**
	 * Saves the global blocks.
	 */
	public function actionSaveContent()
	{
		$this->requirePostRequest();

		$content = new GlobalContentModel();
		$content->setContent(blx()->request->getPost('blocks'));

		if (Blocks::hasPackage(BlocksPackage::Language))
		{
			$content->language = blx()->request->getPost('language');
		}
		else
		{
			$content->language = Blocks::getLanguage();
		}

		if (blx()->globals->saveGlobalContent($content))
		{
			blx()->userSession->setNotice(Blocks::t('Global blocks saved.'));
			$this->redirectToPostedUrl();
		}
		else
		{
			blx()->userSession->setError(Blocks::t('Couldn’t save global blocks.'));
			$this->renderRequestedTemplate(array(
				'globals' => $content,
			));
		}
	}
}
