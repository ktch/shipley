<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Language
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 * Handles language settings from the control panel.
 */
class LanguageSettingsController extends BaseController
{
	/**
	 * Saves the language settings.
	 */
	public function actionSave()
	{
		$this->requirePostRequest();

		$languages = blx()->request->getPost('languages', array());
		sort($languages);

		if (blx()->systemSettings->saveSettings('languages', $languages))
		{
			blx()->userSession->setNotice(Blocks::t('Language settings saved.'));
			$this->redirectToPostedUrl();
		}
		else
		{
			blx()->userSession->setError(Blocks::t('Couldn’t save language settings.'));
		}

		$this->renderRequestedTemplate(array(
			'selectedLanguages' => $languages
		));
	}
}
