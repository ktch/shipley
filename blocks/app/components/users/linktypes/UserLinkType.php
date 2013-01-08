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
 * User link type class
 */
class UserLinkType extends BaseLinkType
{
	/**
	 * Returns the type of links this creates.
	 *
	 * @return string
	 */
	public function getName()
	{
		return Blocks::t('Users');
	}

	/**
	 * Returns the name of the table where entities are stored.
	 *
	 * @return string
	 */
	public function getEntityTableName()
	{
		return 'users';
	}

	/**
	 * Defines any link type-specific settings.
	 *
	 * @access protected
	 * @return array
	 */
	protected function defineSettings()
	{
		return array(
			// Maps to UserCriteria->groupId
			'groupId' => AttributeType::Mixed,
		);
	}

	/**
	 * Returns the link's settings HTML.
	 *
	 * @return string|null
	 */
	public function getSettingsHtml()
	{
		return blx()->templates->render('_components/linktypes/Users/settings', array(
			'settings' => $this->getSettings()
		));
	}

	/**
	 * Mass populates entity models.
	 *
	 * @param array $data
	 * @return array
	 */
	public function populateEntities($data)
	{
		return UserModel::populateModels($data);
	}

	/**
	 * Returns the linkable entity models.
	 *
	 * @param array $settings
	 * @return array
	 */
	public function getLinkableEntities($settings)
	{
		$criteria = new UserCriteria($settings);
		return blx()->users->findUsers($criteria);
	}
}
