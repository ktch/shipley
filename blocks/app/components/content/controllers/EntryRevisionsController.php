<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   PublishPro
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 *
 */
class EntryRevisionsController extends BaseController
{
	/**
	 * Saves a draft, or creates a new one.
	 */
	public function actionSaveDraft()
	{
		$this->requirePostRequest();

		$draftId = blx()->request->getPost('draftId');

		if ($draftId)
		{
			$draft = blx()->entryRevisions->getDraftById($draftId);

			if (!$draft)
			{
				throw new Exception(Blocks::t('No draft exists with the ID “{id}”', array('id' => $draftId)));
			}
		}
		else
		{
			$draft = new EntryDraftModel();
			$draft->id = blx()->request->getRequiredPost('entryId');
			$draft->sectionId = blx()->request->getRequiredPost('sectionId');
			$draft->creatorId = blx()->user->getUser()->id;

			$draft->language = blx()->language;
		}

		$this->_setDraftValuesFromPost($draft);

		if (blx()->entryRevisions->saveDraft($draft))
		{
			blx()->user->setNotice(Blocks::t('Draft saved.'));

			$this->redirectToPostedUrl(array(
				'entryId' => $draft->id,
				'draftId' => $draft->draftId
			));
		}
		else
		{
			blx()->user->setError(Blocks::t('Couldn’t save draft.'));

			$this->renderRequestedTemplate(array(
				'entry' => $draft
			));
		}
	}

	/**
	 * Publishes a draft.
	 */
	public function actionPublishDraft()
	{
		$this->requirePostRequest();

		$draftId = blx()->request->getPost('draftId');
		$draft = blx()->entryRevisions->getDraftById($draftId);

		if (!$draft)
		{
			throw new Exception(Blocks::t('No draft exists with the ID “{id}”', array('id' => $draftId)));
		}

		$this->_setDraftValuesFromPost($draft);

		if (blx()->entryRevisions->publishDraft($draft))
		{
			blx()->user->setNotice(Blocks::t('Draft published.'));

			$this->redirectToPostedUrl(array(
				'entryId' => $draft->id
			));
		}
		else
		{
			blx()->user->setError(Blocks::t('Couldn’t publish draft.'));

			$this->renderRequestedTemplate(array(
				'entry' => $draft
			));
		}
	}

	/**
	 * Sets the draft model's values from the post data.
	 *
	 * @access private
	 * @param EntryDraftModel $draft
	 */
	private function _setDraftValuesFromPost(EntryDraftModel $draft)
	{
		$draft->title = blx()->request->getPost('title');
		$draft->slug = blx()->request->getPost('slug');
		$draft->postDate = $this->getDateFromPost('postDate');
		$draft->expiryDate = $this->getDateFromPost('expiryDate');
		$draft->enabled = blx()->request->getPost('enabled');
		$draft->tags = blx()->request->getPost('tags');

		$draft->setContent(blx()->request->getPost('blocks'));

		if (Blocks::hasPackage(BlocksPackage::Users))
		{
			$draft->authorId = blx()->request->getPost('author');
		}
		else
		{
			$draft->authorId = blx()->user->getUser()->id;
		}
	}
}
