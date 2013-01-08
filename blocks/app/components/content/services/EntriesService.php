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
class EntriesService extends BaseEntityService
{
	// -------------------------------------------
	//  Entry Blocks
	// -------------------------------------------

	/**
	 * The block model class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $blockModelClass = 'EntryBlockModel';

	/**
	 * The block record class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $blockRecordClass = 'EntryBlockRecord';

	/**
	 * The content record class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $contentRecordClass = 'EntryContentRecord';

	/**
	 * The name of the content table column right before where the block columns should be inserted.
	 *
	 * @access protected
	 * @var string
	 */
	protected $placeBlockColumnsAfter = 'entryId';

	// -------------------------------------------
	//  Entries
	// -------------------------------------------

	/**
	 * Finds entries.
	 *
	 * @param EntryCriteria|null $criteria
	 * @return array
	 */
	public function findEntries(EntryCriteria $criteria = null)
	{
		if (!$criteria)
		{
			$criteria = new EntryCriteria();
		}

		$query = blx()->db->createCommand()
			->select('e.*, t.title')
			->from('entries e')
			->join('entrytitles t', 'e.id = t.entryId');

		if ($this->_applyEntryConditions($query, $criteria))
		{
			if ($criteria->order)
			{
				$query->order($criteria->order);
			}

			if ($criteria->offset)
			{
				$query->offset($criteria->offset);
			}

			if ($criteria->limit)
			{
				$query->limit($criteria->limit);
			}

			$result = $query->queryAll();
			return EntryModel::populateModels($result, $criteria->indexBy);
		}
		else
		{
			return array();
		}
	}

	/**
	 * Finds an entry.
	 *
	 * @param EntryCriteria|null $criteria
	 * @return EntryModel|null
	 */
	public function findEntry(EntryCriteria $criteria = null)
	{
		if (!$criteria)
		{
			$criteria = new EntryCriteria();
		}

		$query = blx()->db->createCommand()
			->select('e.*, t.title')
			->from('entries e')
			->join('entrytitles t', 'e.id = t.entryId');

		if ($this->_applyEntryConditions($query, $criteria))
		{
			$result = $query->queryRow();

			if ($result)
			{
				return EntryModel::populateModel($result);
			}
		}
	}

	/**
	 * Gets the total number of entries.
	 *
	 * @param EntryCriteria|null $criteria
	 * @return int
	 */
	public function getTotalEntries(EntryCriteria $criteria = null)
	{
		if (!$criteria)
		{
			$criteria = new EntryCriteria();
		}

		$query = blx()->db->createCommand()
			->select('count(e.id)')
			->from('entries e')
			->join('entrytitles t', 'e.id = t.entryId');

		if ($this->_applyEntryConditions($query, $criteria))
		{
			return (int) $query->queryScalar();
		}
		else
		{
			return 0;
		}
	}

	/**
	 * Applies WHERE conditions to a DbCommand query for entries.
	 *
	 * @access private
	 * @param DbCommand $query
	 * @param           $criteria
	 * @param array     $criteria
	 * @return bool
	 */
	private function _applyEntryConditions($query, $criteria)
	{
		$whereConditions = array();
		$whereParams = array();

		if ($criteria->id)
		{
			$whereConditions[] = DbHelper::parseParam('e.id', $criteria->id, $whereParams);
		}

		if ($criteria->slug)
		{
			$whereConditions[] = DbHelper::parseParam('e.slug', $criteria->slug, $whereParams);
		}

		if ($criteria->uri)
		{
			$whereConditions[] = DbHelper::parseParam('e.uri', $criteria->uri, $whereParams);
		}

		if ($criteria->after)
		{
			$whereConditions[] = DbHelper::parseDateParam('e.postDate', '>=', $criteria->after, $whereParams);
		}

		if ($criteria->before)
		{
			$whereConditions[] = DbHelper::parseDateParam('e.postDate', '<', $criteria->before, $whereParams);
		}

		if ($criteria->archived)
		{
			$whereConditions[] = 'e.archived = 1';
		}
		else
		{
			$whereConditions[] = 'e.archived = 0';

			if ($criteria->status && $criteria->status != '*')
			{
				$statusCondition = $this->_getEntryStatusCondition($criteria->status);

				if ($statusCondition)
				{
					$whereConditions[] = $statusCondition;
				}
			}
		}

		if ($criteria->editable)
		{
			$user = blx()->userSession->getUser();

			if (!$user)
			{
				return false;
			}

			if (Blocks::hasPackage(BlocksPackage::PublishPro))
			{
				$editableSectionIds = blx()->sections->getEditableSectionIds();
				$whereConditions[] = array('in', 'sectionId', $editableSectionIds);

				$noPeerConditions = array();

				foreach ($editableSectionIds as $sectionId)
				{
					if (!$user->can('editPeerEntriesInSection'.$sectionId))
					{
						$noPeerConditions[] = array('or', 'sectionId != '.$sectionId, 'authorId = '.$user->id);
					}
				}

				if ($noPeerConditions)
				{
					array_unshift($noPeerConditions, 'and');
					$whereConditions[] = $noPeerConditions;
				}
			}
			else
			{
				if (!$user->can('editEntries'))
				{
					return false;
				}

				if (!$user->can('editPeerEntries'))
				{
					$whereConditions[] = 'authorId = '.$user->id;
				}
			}
		}

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			if ($criteria->sectionId && $criteria->sectionId != '*')
			{
				$whereConditions[] = DbHelper::parseParam('e.sectionId', $criteria->sectionId, $whereParams);
			}

			if ($criteria->section)
			{
				$query->join('sections s', 'e.sectionId = s.id');
				$whereConditions[] = DbHelper::parseParam('s.handle', $criteria->section, $whereParams);
			}
		}

		$whereConditions[] = 't.language = :language';

		if ($criteria->language)
		{
			$whereParams[':language'] = $criteria->language;
		}
		else
		{
			$whereParams[':language'] = Blocks::getLanguage();
		}

		if (Blocks::hasPackage(BlocksPackage::Users))
		{
			if ($criteria->authorId && $criteria->authorId != '*')
			{
				$whereConditions[] = DbHelper::parseParam('e.authorId', $criteria->authorId, $whereParams);
			}

			if (($criteria->authorGroupId && $criteria->authorGroupId != '*') || ($criteria->authorGroup && $criteria->authorGroup != '*'))
			{
				$query->join('usergroups_users ugu', 'ugu.userId = e.authorId');

				if ($criteria->authorGroupId && $criteria->authorGroupId != '*')
				{
					$whereConditions[] = DbHelper::parseParam('ugu.groupId', $criteria->authorGroupId, $whereParams);
				}

				if ($criteria->authorGroup && $criteria->authorGroup != '*')
				{
					$query->join('usergroups ug', 'ug.id = ugu.groupId');
					$whereConditions[] = DbHelper::parseParam('ug.handle', $criteria->authorGroup, $whereParams);
				}
			}
		}

		if (count($whereConditions) == 1)
		{
			$query->where($whereConditions[0], $whereParams);
		}
		else
		{
			array_unshift($whereConditions, 'and');
			$query->where($whereConditions, $whereParams);
		}

		return true;
	}

	/**
	 * Returns the entry status conditions.
	 *
	 * @access private
	 * @param $statusParam
	 * @return array
	 */
	private function _getEntryStatusCondition($statusParam)
	{
		$statusConditions = array();
		$statuses = ArrayHelper::stringToArray($statusParam);

		foreach ($statuses as $status)
		{
			$status = strtolower($status);
			$currentTimeDb = DateTimeHelper::currentTimeForDb();

			switch ($status)
			{
				case 'live':
				{
					$statusConditions[] = array('and',
						'e.enabled = 1',
						"e.postDate <= '{$currentTimeDb}'",
						array('or', 'e.expiryDate is null', "e.expiryDate > '{$currentTimeDb}'")
					);
					break;
				}
				case 'pending':
				{
					$statusConditions[] = array('and',
						'e.enabled = 1',
						"e.postDate > '{$currentTimeDb}'"
					);
					break;
				}
				case 'expired':
				{
					$statusConditions[] = array('and',
						'e.enabled = 1',
						'e.expiryDate is not null',
						"e.expiryDate <= '{$currentTimeDb}'"
					);
					break;
				}
				case 'disabled':
				{
					$statusConditions[] = 'e.enabled != 1';
				}
			}
		}

		if ($statusConditions)
		{
			if (count($statusConditions) == 1)
			{
				return $statusConditions[0];
			}
			else
			{
				array_unshift($conditions, 'or');
				return $statusConditions;
			}
		}
	}

	/**
	 * Saves an entry.
	 *
	 * @param EntryModel $entry
	 * @throws Exception
	 * @return bool
	 */
	public function saveEntry(EntryModel $entry)
	{
		$entryRecord = $this->_getEntryRecord($entry);
		$titleRecord = $this->_getEntryTitleRecord($entry);
		$contentRecord = $this->getEntryContentRecord($entry);

		// Has the slug changed?
		if ($entryRecord->isNewRecord() || $entry->slug != $entryRecord->slug)
		{
			$this->_generateEntrySlug($entry);
		}

		$entryRecord->authorId = $entry->authorId;
		$entryRecord->slug = $entry->slug;
		$titleRecord->title = $entry->title;
		$entryRecord->postDate = DateTimeHelper::normalizeDate($entry->postDate, true);
		$entryRecord->expiryDate = DateTimeHelper::normalizeDate($entry->expiryDate);
		$entryRecord->enabled = $entry->enabled;

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			$blocks = blx()->sections->getBlocksBySectionId($entry->sectionId);
		}
		else
		{
			$blocks = $this->getAllBlocks();
		}

		$blockTypes = array();

		foreach ($blocks as $block)
		{
			$blockType = blx()->blockTypes->populateBlockType($block);
			$blockType->entity = $entry;

			if ($blockType->defineContentAttribute() !== false)
			{
				$handle = $block->handle;
				$contentRecord->$handle = $blockType->getPostData();
			}

			// Keep the block type instance around for calling onAfterEntitySave()
			$blockTypes[] = $blockType;
		}

		$entryValidates = $entryRecord->validate();
		$titleValidates = $titleRecord->validate();
		$contentValidates = $contentRecord->validate();

		$tagsValidate = true;
		$tagErrors = array();

		if ($entry->tags)
		{
			$entryTagRecords = $this->_processTags($entry, $entryRecord);
			$tagErrors = $this->_validateEntryTagRecords($entryTagRecords);
			$tagsValidate = empty($tagErrors);
		}

		if ($entryValidates && $titleValidates && $contentValidates && $tagsValidate)
		{
			if (Blocks::hasPackage(BlocksPackage::PublishPro))
			{
				// We already had to fetch this in getEntryContentRecord()
				// Would be nice if we could eliminate the extra DB query...
				$section = blx()->sections->getSectionById($entry->sectionId);

				if ($section->hasUrls)
				{
					// Make sure the section's URL format is valid. This shouldn't be possible due to section validation,
					// but it's not enforced by the DB, so anything is possible.
					if (!$section->urlFormat || strpos($section->urlFormat, '{slug}') === false)
					{
						throw new Exception(Blocks::t('The section “{section}” doesn’t have a valid URL Format.', array(
							'section' => Blocks::t($section->name)
						)));
					}

					$entryRecord->uri = str_replace('{slug}', $entry->slug, $section->urlFormat);
				}
			}
			else
			{
				$entryRecord->uri = 'blog/'.$entry->slug;
			}

			$entryRecord->save(false);

			// Save the post date on the model if we just made it up
			if (!$entry->postDate)
			{
				$entry->postDate = $entryRecord->postDate;
			}

			// Now that we have an entry ID, save it on the model & models
			if (!$entry->id)
			{
				$entry->id = $entryRecord->id;
				$titleRecord->entryId = $entryRecord->id;
				$contentRecord->entryId = $entryRecord->id;
			}

			// Save the title and content records
			$titleRecord->save(false);
			$contentRecord->save(false);

			// If we have any tags to process
			if (!empty($entryTagRecords))
			{
				// Create any of the new tag records first.
				if (isset($entryTagRecords['new']))
				{
					foreach ($entryTagRecords['new'] as $newEntryTagRecord)
					{
						$newEntryTagRecord->save(false);
					}
				}

				// Add any tags to the entry.
				if (isset($entryTagRecords['add']))
				{
					foreach ($entryTagRecords['add'] as $addEntryTagRecord)
					{
						$entryTagEntryRecord = new EntryTagEntryRecord();
						$entryTagEntryRecord->tagId = $addEntryTagRecord->id;
						$entryTagEntryRecord->entryId = $entryRecord->id;
						$entryTagEntryRecord->save(false);

						$this->_updateTagCount($addEntryTagRecord);
					}
				}

				// Process any tags that need to be removed from the entry.
				if (isset($entryTagRecords['delete']))
				{
					foreach ($entryTagRecords['delete'] as $deleteEntryTagRecord)
					{
						EntryTagEntryRecord::model()->deleteAllByAttributes(array(
							'tagId'   => $deleteEntryTagRecord->id,
							'entryId' => $entryRecord->id
						));

						$this->_updateTagCount($deleteEntryTagRecord);
					}
				}
			}

			// Save a new version
			if (Blocks::hasPackage(BlocksPackage::PublishPro))
			{
				blx()->entryRevisions->saveVersion($entry);
			}

			// Give the block types a chance to do any post-processing
			foreach ($blockTypes as $blockType)
			{
				$blockType->onAfterEntitySave();
			}

			return true;
		}
		else
		{
			$entry->addErrors(array_merge($entryRecord->getErrors(), $titleRecord->getErrors(), $contentRecord->getErrors(), $tagErrors));

			return false;
		}
	}

	/**
	 * Deletes an entry(s) by its ID(s).
	 *
	 * @param int|array $entryId
	 * @return bool
	 */
	public function deleteEntryById($entryId)
	{
		// First delete any links
		blx()->links->deleteLinksForEntity('Entry', $entryId);

		// Then delete the entry rows
		// (everything else should cascade-delete from there)
		if (is_array($entryId))
		{
			$condition = array('in', 'id', $entryId);
		}
		else
		{
			$condition = array('id' => $entryId);
		}

		blx()->db->createCommand()->delete('entries', $condition);

		return true;
	}

	/**
	 * Keeps the given $entryTagRecord->count column up-to-date with the number of entries using that tag.
	 *
	 * @param EntryTagRecord $entryTagRecord
	 */
	private function _updateTagCount(EntryTagRecord $entryTagRecord)
	{
		$criteria = new \CDbCriteria();
		$criteria->addCondition('tagId =:tagId');
		$criteria->params[':tagId'] = $entryTagRecord->id;
		$tagCount = EntryTagEntryRecord::model()->count($criteria);

		// If the count is zero, let's delete the entryTagRecord.
		if ($tagCount == 0)
		{
			$entryTagRecord->delete();
		}
		else
		{
			$entryTagRecord->count = $tagCount;
			$entryTagRecord->save(false);
		}
	}

	/**
	 * Checks to see if there are any tag validation errors.  If so, returns them.
	 *
	 * @param $entryTagRecords
	 * @return array
	 */
	private function _validateEntryTagRecords($entryTagRecords)
	{
		$errors = array();

		foreach ($entryTagRecords as $entryTagRecordActions)
		{
			foreach ($entryTagRecordActions as $entryTagRecord)
			{
				if (!$entryTagRecord->validate())
				{
					$errors[] = $entryTagRecord->getErrors();
				}
			}
		}

		return $errors;
	}

	/**
	 * Processes any tags on the EntryModel for the given EntryRecord.  Will generate a list of tags that need to be
	 * added, updated or deleted for an entry.
	 *
	 * @param EntryModel  $entry
	 * @param EntryRecord $entryRecord
	 * @return array
	 */
	private function _processTags(EntryModel $entry, EntryRecord $entryRecord)
	{
		$entryTagRecords = array();

		// Get the entries' current EntryTags
		$currentEntryTagRecords = $this->_getTagsForEntry($entryRecord);

		// See if any tags have even changed for this entry.
		if (count($currentEntryTagRecords) == count($entry->tags))
		{
			$identical = true;

			foreach ($currentEntryTagRecords as $currentEntryTagRecord)
			{
				if (!preg_grep("/{$currentEntryTagRecord->name}/i", $entry->tags))
				{
					// Something is different.
					$identical = false;
					break;
				}
			}

			if ($identical)
			{
				// Identical, so just return the empty array.
				return $entryTagRecords;
			}
		}

		// Process the new entry tags.
		foreach ($entry->tags as $newEntryTag)
		{
			foreach ($currentEntryTagRecords as $currentEntryTagRecord)
			{
				// The current entry already has this tag assigned to it... skip.
				if (strtolower($currentEntryTagRecord->name) == strtolower($newEntryTag))
				{
					// Try the next $newEntryTag
					continue 2;
				}
			}

			// If we make it here, then we know the tag is new for this entry because it doesn't exist in $currentEntryTagRecords
			// Make sure the tag exists at all, if not create the record.
			if (($entryTagRecord = $this->_getEntryTagRecordByName($newEntryTag)) == null)
			{
				$entryTagRecord = new EntryTagRecord();
				$entryTagRecord->name = $newEntryTag;
				$entryTagRecord->count = 1;

				// Keep track of the new tag records.
				$entryTagRecords['new'][] = $entryTagRecord;
			}

			// Keep track of the tags we'll need to add to the entry.
			$entryTagRecords['add'][] = $entryTagRecord;
		}

		// Now check for deleted tags from the entry.
		foreach ($currentEntryTagRecords as $currentEntryTagRecord)
		{
			foreach ($entry->tags as $newEntryTag)
			{
				if (strtolower($currentEntryTagRecord->name) == strtolower($newEntryTag))
				{
					// Try the next $currentEntryTagRecord
					continue 2;
				}
			}

			// If we made it here, then we know the tag was removed from the entry.
			$entryTagRecords['delete'][] = $currentEntryTagRecord;
		}

		return $entryTagRecords;
	}

	/**
	 * Given an entry, will return an array of EntryTagRecords associated with the entry.
	 *
	 * @param EntryRecord $entryRecord
	 * @return array
	 */
	private function _getTagsForEntry(EntryRecord $entryRecord)
	{
		$currentEntryTagRecords = array();

		$entryTagEntries = $entryRecord->entryTagEntries;

		foreach ($entryTagEntries as $entryTagEntry)
		{
			if (($currentEntryTagRecord = $this->_getEntryTagRecordById($entryTagEntry->tagId)) !== null)
			{
				$currentEntryTagRecords[] = $currentEntryTagRecord;
			}
		}

		return $currentEntryTagRecords;
	}

	/**
	 * Returns tags by a given entry ID.
	 *
	 * @param $entryId
	 * @return array
	 */
	public function getTagsByEntryId($entryId)
	{
		$tags = array();

		$entryRecord = EntryRecord::model()->findByPk($entryId);
		$entryTagRecords = $this->_getTagsForEntry($entryRecord);

		foreach ($entryTagRecords as $record)
		{
			$tags[] = $record->name;
		}

		return $tags;
	}

	/**
	 * Returns an EntryTagRecord with the given tag name.
	 *
	 * @param $tagName
	 * @return EntryTagRecord
	 */
	private function _getEntryTagRecordByName($tagName)
	{
		$entryTagRecord = EntryTagRecord::model()->findByAttributes(
			array('name' => $tagName)
		);

		return $entryTagRecord;
	}

	/**
	 * Returns an EntryTagRecord with the given ID.
	 *
	 * @param $id
	 * @return EntryTagRecord
	 */
	private function _getEntryTagRecordById($id)
	{
		$entryTagRecord = EntryTagRecord::model()->findByPk($id);
		return $entryTagRecord;
	}

	/**
	 * Gets an entry record or creates a new one.
	 *
	 * @access private
	 * @param EntryModel $entry
	 * @throws Exception
	 * @return EntryRecord
	 */
	private function _getEntryRecord(EntryModel $entry)
	{
		if ($entry->id)
		{
			$entryRecord = EntryRecord::model()->with('entryTagEntries')->findById($entry->id);

			if (!$entryRecord)
			{
				throw new Exception(Blocks::t('No entry exists with the ID “{id}”', array('id' => $entry->id)));
			}
		}
		else
		{
			$entryRecord = new EntryRecord();

			if (Blocks::hasPackage(BlocksPackage::PublishPro))
			{
				$entryRecord->sectionId = $entry->sectionId;
			}
		}

		return $entryRecord;
	}

	/**
	 * Gets an entry's title record or creates a new one.
	 *
	 * @access private
	 * @param EntryModel $entry
	 * @return EntryTitleRecord
	 */
	private function _getEntryTitleRecord(EntryModel $entry)
	{
		if (!$entry->language)
		{
			$entry->language = Blocks::getLanguage();
		}

		if ($entry->id)
		{
			$titleRecord = EntryTitleRecord::model()->findByAttributes(array(
				'entryId'  => $entry->id,
				'language' => $entry->language,
			));
		}

		if (empty($titleRecord))
		{
			$titleRecord = new EntryTitleRecord();
			$titleRecord->entryId = $entry->id;
			$titleRecord->language = $entry->language;
		}

		return $titleRecord;
	}

	/**
	 * Gets an entry's content record or creates a new one.
	 *
	 * @param EntryModel $entry
	 * @throws Exception
	 * @return EntryContentRecord
	 */
	public function getEntryContentRecord(EntryModel $entry)
	{
		if (!$entry->language)
		{
			$entry->language = Blocks::getLanguage();
		}

		if (Blocks::hasPackage(BlocksPackage::PublishPro))
		{
			$section = blx()->sections->getSectionById($entry->sectionId);

			if (!$section)
			{
				throw new Exception(Blocks::t('No section exists with the ID “{id}”', array('id' => $entry->getSection()->id)));
			}
		}

		if ($entry->id)
		{
			$attributes = array(
				'entryId' => $entry->id,
				'language' => $entry->language,
			);

			if (Blocks::hasPackage(BlocksPackage::PublishPro))
			{
				$contentRecord = SectionContentRecord::model($section)->findByAttributes($attributes);
			}
			else
			{
				$contentRecord = EntryContentRecord::model()->findByAttributes($attributes);
			}
		}

		if (empty($contentRecord))
		{
			if (Blocks::hasPackage(BlocksPackage::PublishPro))
			{
				$contentRecord = new SectionContentRecord($section);
			}
			else
			{
				$contentRecord = new EntryContentRecord();
			}

			$contentRecord->entryId = $entry->id;
			$contentRecord->language = $entry->language;
		}

		return $contentRecord;
	}

	/**
	 * Generates an entry slug based on its title.
	 *
	 * @access private
	 * @param EntryModel $entry
	 */
	private function _generateEntrySlug(EntryModel $entry)
	{
		$slug = ($entry->slug ? $entry->slug : $entry->title);

		// Remove HTML tags
		$slug = preg_replace('/<(.*?)>/', '', $slug);

		// Make it lowercase
		$slug = strtolower($slug);

		// Convert extended ASCII characters to basic ASCII
		$slug = StringHelper::asciiString($slug);

		// Slug must start and end with alphanumeric characters
		$slug = preg_replace('/^[^a-z0-9]+/', '', $slug);
		$slug = preg_replace('/[^a-z0-9]+$/', '', $slug);

		// Get the "words"
		$slug = implode('-', array_filter(preg_split('/[^a-z0-9]+/', $slug)));

		if ($slug)
		{
			// Make it unique
			$testSlug = '';

			$where = 'slug = :slug';
			$criteria = array();

			if (Blocks::hasPackage(BlocksPackage::PublishPro))
			{
				$where .= ' and sectionId = :sectionId';
				$criteria[':sectionId'] = $entry->sectionId;
			}

			if ($entry->id)
			{
				$where .= ' and id != :entryId';
				$criteria[':entryId'] = $entry->id;
			}

			for ($i = 0; true; $i++)
			{
				$testSlug = $slug;
				if ($i != 0)
				{
					$testSlug .= '-'.$i;
				}

				$criteria[':slug'] = $testSlug;

				$totalEntries = blx()->db->createCommand()
					->select('count(e.id)')
					->from('entries e')
					->where($where, $criteria)
					->queryScalar();

				if ($totalEntries == 0)
				{
					break;
				}
			}

			$entry->slug = $testSlug;
		}
		else
		{
			$entry->slug = '';
		}
	}
}
