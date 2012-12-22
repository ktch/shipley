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
 * Handles email message tasks.
 */
class EmailMessagesController extends BaseController
{
	/**
	 * Saves an email message
	 */
	public function actionSaveMessage()
	{
		$this->requirePostRequest();
		$this->requireAjaxRequest();

		$message = new EmailMessageModel();
		$message->key = blx()->request->getRequiredPost('key');
		$message->subject = blx()->request->getRequiredPost('subject');
		$message->body = blx()->request->getRequiredPost('body');

		if (Blocks::hasPackage(BlocksPackage::Language))
		{
			$message->language = blx()->request->getPost('language');
		}
		else
		{
			$message->language = blx()->language;
		}

		if (blx()->emailMessages->saveMessage($message))
		{
			$this->returnJson(array('success' => true));
		}
		else
		{
			$this->returnErrorJson(Blocks::t('There was a problem saving your message.'));
		}
	}
}
