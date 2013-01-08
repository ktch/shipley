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
 * Handles entry tasks
 */
class EntriesController extends BaseEntityController
{
	/**
	 * Returns the block service instance.
	 *
	 * @return EntriesService
	 */
	protected function getService()
	{
		return blx()->entries;
	}

	/**
	 * Saves an entry.
	 */
	public function actionSaveEntry()
	{
		$this->requirePostRequest();

		$entry = new EntryModel();

		$entry->id = blx()->request->getPost('entryId');
		$entry->authorId = blx()->request->getPost('author', blx()->userSession->getUser()->id);
		$entry->title = blx()->request->getPost('title');
		$entry->slug = blx()->request->getPost('slug');
		$entry->postDate = $this->getDateFromPost('postDate');
		$entry->expiryDate = $this->getDateFromPost('expiryDate');
		$entry->enabled = blx()->request->getPost('enabled');
		$entry->tags = blx()->request->getPost('tags');

		$entry->setContent(blx()->request->getPost('blocks'));

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			$entry->sectionId = blx()->request->getRequiredPost('sectionId');
		}

		if (Blocks::hasPackage(BlocksPackage::Language))
		{
			$entry->language = blx()->request->getPost('language');
		}
		else
		{
			$entry->language = Blocks::getLanguage();
		}

		if (blx()->entries->saveEntry($entry))
		{
			if (blx()->request->isAjaxRequest())
			{
				$return['success']   = true;
				$return['entry']     = $entry->getAttributes();
				$return['cpEditUrl'] = $entry->getCpEditUrl();
				$return['author']    = $entry->getAuthor()->getAttributes();

				$this->returnJson($return);
			}
			else
			{
				blx()->userSession->setNotice(Blocks::t('Entry saved.'));

				$this->redirectToPostedUrl(array(
					'entryId' => $entry->id
				));
			}
		}
		else
		{
			if (blx()->request->isAjaxRequest())
			{
				$this->returnJson(array(
					'errors' => $entry->getErrors(),
				));
			}
			else
			{
				blx()->userSession->setError(Blocks::t('Couldn’t save entry.'));

				$this->renderRequestedTemplate(array(
					'entry' => $entry
				));
			}
		}
	}

	/**
	 * Deletes an entry.
	 */
	public function actionDeleteEntry()
	{
		$this->requirePostRequest();
		$this->requireAjaxRequest();

		$entryId = blx()->request->getRequiredPost('id');

		blx()->entries->deleteEntryById($entryId);
		$this->returnJson(array('success' => true));
	}
}
