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
 * Entry link type class
 */
class EntryLinkType extends BaseLinkType
{
	/**
	 * Returns the type of links this creates.
	 *
	 * @return string
	 */
	public function getName()
	{
		return Blocks::t('Entries');
	}

	/**
	 * Returns the name of the table where entities are stored.
	 *
	 * @return string
	 */
	public function getEntityTableName()
	{
		return 'entries';
	}

	/**
	 * Defines any link type-specific settings.
	 *
	 * @access protected
	 * @return array
	 */
	protected function defineSettings()
	{
		$settings = array();

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			// Maps to EntryCriteria->sectionId
			$settings['sectionId'] = AttributeType::Mixed;
		}

		return $settings;
	}

	/**
	 * Returns the link's settings HTML.
	 *
	 * @return string|null
	 */
	public function getSettingsHtml()
	{
		return blx()->templates->render('_components/linktypes/Entries/settings', array(
			'settings' => $this->getSettings()
		));
	}

	/**
	 * Modifies the DbCommand being created that's used to retrieve the linked entities.
	 *
	 * @param DbCommand $query
	 * @return DbCommand
	 */
	public function modifyLinkedEntitiesQuery($query)
	{
		$query
			->addSelect('t.title')
			->join('entrytitles t', 'entries.id = t.entryId')
			->addWhere(array('and', 't.language = :language', 'entries.archived = 0'), array(':language' => Blocks::getLanguage()));

		return $query;
	}

	/**
	 * Mass populates entity models.
	 *
	 * @param array $data
	 * @return array
	 */
	public function populateEntities($data)
	{
		return EntryModel::populateModels($data);
	}

	/**
	 * Returns the linkable entity models.
	 *
	 * @param array $settings
	 * @return array
	 */
	public function getLinkableEntities($settings)
	{
		$criteria = new EntryCriteria($settings);
		$criteria->order = 'title';
		return blx()->entries->findEntries($criteria);
	}
}
