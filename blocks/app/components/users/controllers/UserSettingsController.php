<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Users
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 * Handles user group tasks
 */
class UserSettingsController extends BaseController
{
	/**
	 * Saves a user group.
	 */
	public function actionSaveGroup()
	{
		$this->requirePostRequest();

		$group = new UserGroupModel();
		$group->id = blx()->request->getPost('groupId');
		$group->name = blx()->request->getPost('name');
		$group->handle = blx()->request->getPost('handle');

		// Did it save?
		if (blx()->userGroups->saveGroup($group))
		{
			// Save the new permissions
			$permissions = blx()->request->getPost('permissions', array());
			blx()->userPermissions->saveGroupPermissions($group->id, $permissions);

			blx()->userSession->setNotice(Blocks::t('Group saved.'));
			$this->redirectToPostedUrl();
		}
		else
		{
			blx()->userSession->setError(Blocks::t('Couldn’t save group.'));
		}

		// Reload the original template
		$this->renderRequestedTemplate(array(
			'group' => $group
		));
	}

	/**
	 * Deletes a user group.
	 */
	public function actionDeleteGroup()
	{
		$this->requirePostRequest();
		$this->requireAjaxRequest();

		$groupId = blx()->request->getRequiredPost('id');

		blx()->userGroups->deleteGroupById($groupId);

		$this->returnJson(array('success' => true));
	}

	/**
	 * Saves the system user settings.
	 */
	public function actionSaveUserSettings()
	{
		$this->requirePostRequest();
		$this->requireAdmin();

		$settings['allowPublicRegistration'] = (bool) blx()->request->getPost('allowPublicRegistration');

		if (blx()->systemSettings->saveSettings('users', $settings))
		{
			blx()->userSession->setNotice(Blocks::t('User settings saved.'));
			$this->redirectToPostedUrl();
		}
		else
		{
			blx()->userSession->setError(Blocks::t('Couldn’t save user settings.'));

			$this->renderRequestedTemplate(array(
				'settings' => $settings
			));
		}
	}
}
