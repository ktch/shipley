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
class DashboardController extends BaseController
{
	/**
	 */
	public function actionGetAlerts()
	{
		$alerts = DashboardHelper::getAlerts(true);
		$r = array('alerts' => $alerts);
		$this->returnJson($r);
	}

	/**
	 * Saves a widget.
	 */
	public function actionSaveUserWidget()
	{
		$this->requirePostRequest();

		$widget = new WidgetModel();
		$widget->id = blx()->request->getPost('widgetId');
		$widget->type = blx()->request->getRequiredPost('type');

		$typeSettings = blx()->request->getPost('types');

		if (isset($typeSettings[$widget->type]))
		{
			$widget->settings = $typeSettings[$widget->type];
		}

		// Did it save?
		if (blx()->dashboard->saveUserWidget($widget))
		{
			blx()->user->setNotice(Blocks::t('Widget saved.'));
			$this->redirectToPostedUrl();
		}
		else
		{
			blx()->user->setError(Blocks::t('Couldn’t save widget.'));
		}

		// Reload the original template
		$this->renderRequestedTemplate(array(
			'widget' => $widget
		));
	}

	/**
	 * Deletes a widget.
	 */
	public function actionDeleteUserWidget()
	{
		$this->requirePostRequest();
		$this->requireAjaxRequest();

		$widgetId = JsonHelper::decode(blx()->request->getRequiredPost('id'));
		blx()->dashboard->deleteUserWidgetById($widgetId);

		$this->returnJson(array('success' => true));
	}

	/**
	 * Reorders widgets.
	 */
	public function actionReorderUserWidgets()
	{
		$this->requirePostRequest();
		$this->requireAjaxRequest();

		$widgetIds = JsonHelper::decode(blx()->request->getRequiredPost('ids'));
		blx()->dashboard->reorderUserWidgets($widgetIds);

		$this->returnJson(array('success' => true));
	}

	/**
	 * Returns the items for the Feed widget.
	 */
	public function actionGetFeedItems()
	{
		$this->requireAjaxRequest();

		$url = blx()->request->getRequiredParam('url');
		$limit = blx()->request->getParam('limit');

		$items = blx()->dashboard->getFeedItems($url, $limit);
		$this->returnJson(array('items' => $items));
	}

	/**
	 * Creates a new support ticket for the GetHelp widget.
	 */
	public function actionSendSupportRequest()
	{
		$this->requirePostRequest();
		$this->requireAjaxRequest();

		$message = blx()->request->getRequiredPost('message');

		require_once blx()->path->getLibPath().'HelpSpotAPI.php';
		$hsapi = new \HelpSpotAPI(array('helpSpotApiURL' => "https://support.blockscms.com/api/index.php"));

		$user = blx()->user->getUser();

		$result = $hsapi->requestCreate(array(
			'sFirstName' => $user->getFriendlyName(),
			'sLastName' => ($user->lastName ? $user->lastName : 'Doe'),
			'sEmail' => $user->email,
			'tNote' => $message
		));

		if ($result)
		{
			$this->returnJson(array('success' => true));
		}
		else
		{
			$this->returnErrorJson($hsapi->errors);
		}
	}

	/**
	 * Returns the update widget HTML.
	 */
	public function actionCheckForUpdates()
	{
		blx()->updates->getUpdates();

		$this->renderTemplate('_components/widgets/Updates/body', array(
			'total' => blx()->updates->getTotalNumberOfAvailableUpdates()
		));
	}
}
