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
class PagesService extends BaseEntityService
{
	// -------------------------------------------
	//  Page Blocks
	// -------------------------------------------

	/**
	 * The block model class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $blockModelClass = 'PageBlockModel';

	/**
	 * The block record class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $blockRecordClass = 'PageBlockRecord';

	/**
	 * The content record class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $contentRecordClass = 'PageContentRecord';

	/**
	 * Populates a block record from a model.
	 *
	 * @access protected
	 * @param PageBlockModel $block
	 * @return PageBlockRecord $blockRecord;
	 */
	protected function populateBlockRecord(PageBlockModel $block)
	{
		$blockRecord = parent::populateBlockRecord($block);
		$blockRecord->pageId = $block->pageId;
		return $blockRecord;
	}

	/**
	 * Returns the content table name.
	 *
	 * @param BaseBlockModel $block
	 * @access protected
	 * @return string|false
	 */
	protected function getContentTable(BaseBlockModel $block)
	{
		return false;
	}

	/**
	 * Returns all blocks by a page ID.
	 *
	 * @param int $pageId
	 * @return array
	 */
	public function getBlocksByPageId($pageId)
	{
		$blockRecords = PageBlockRecord::model()->ordered()->findAllByAttributes(array(
			'pageId' => $pageId
		));
		return $this->populateBlocks($blockRecords);
	}

	/**
	 * Returns the total number of blocks by a page ID.
	 *
	 * @param int $pageId
	 * @return int
	 */
	public function getTotalBlocksByPageId($pageId)
	{
		return PageBlockRecord::model()->countByAttributes(array(
			'pageId' => $pageId
		));
	}

	// -------------------------------------------
	//  Pages
	// -------------------------------------------

	/**
	 * Gets all pages.
	 *
	 * @param string|null $indexBy
	 * @return array
	 */
	public function getAllPages($indexBy = null)
	{
		$pageRecords = PageRecord::model()->ordered()->findAll();
		return PageModel::populateModels($pageRecords, $indexBy);
	}

	/**
	 * Gets all pages that are editable by the current user.
	 *
	 * @param string|null $indexBy
	 * @return array
	 */
	public function getEditablePages($indexBy = null)
	{
		$editablePages = array();
		$allPages = $this->getAllPages();

		foreach ($allPages as $page)
		{
			if (blx()->userSession->checkPermission('editPage'.$page->id))
			{
				if ($indexBy === null)
				{
					$editablePages[] = $page;
				}
				else
				{
					$editablePages[$page->$indexBy] = $page;
				}
			}
		}

		return $editablePages;
	}

	/**
	 * Gets the total number of pages.
	 *
	 * @return int
	 */
	public function getTotalPages()
	{
		return PageRecord::model()->count();
	}

	/**
	 * Gets a page by its ID.
	 *
	 * @param $pageId
	 * @return PageModel|null
	 */
	public function getPageById($pageId)
	{
		$pageRecord = PageRecord::model()->findById($pageId);
		if ($pageRecord)
		{
			return PageModel::populateModel($pageRecord);
		}
	}

	/**
	 * Gets a page by its URI.
	 *
	 * @param string $uri
	 * @return PageModel|null
	 */
	public function getPageByUri($uri)
	{
		$pageRecord = PageRecord::model()->findByAttributes(array(
			'uri' => $uri
		));

		if ($pageRecord)
		{
			return PageModel::populateModel($pageRecord);
		}
	}

	/**
	 * Saves a page.
	 *
	 * @param PageModel $page
	 * @throws \Exception
	 * @return bool
	 */
	public function savePage(PageModel $page)
	{
		$pageRecord = $this->_getPageRecordById($page->id);

		$pageRecord->title     = $page->title;
		$pageRecord->uri       = $page->uri;
		$pageRecord->template  = $page->template;

		if ($pageRecord->save())
		{
			// Now that we have a page ID, save it on the model
			if (!$page->id)
			{
				$page->id = $pageRecord->id;
			}

			return true;
		}
		else
		{
			$page->addErrors($pageRecord->getErrors());
			return false;
		}
	}

	/**
	 * Saves a page's content
	 *
	 * @param PageModel $page
	 * @return bool
	 */
	public function savePageContent(PageModel $page)
	{
		$contentRecord = $this->getPageContentRecordByPageId($page->id);

		$blocks = $this->getBlocksByPageId($page->id);

		$content = array();
		$blockTypes = array();

		foreach ($blocks as $block)
		{
			$blockType = blx()->blockTypes->populateBlockType($block);
			$blockType->entity = $page;

			if ($blockType->defineContentAttribute() !== false)
			{
				$handle = $block->handle;
				$content[$block->id] = $blockType->getPostData();
			}

			// Keep the block type instance around for calling onAfterEntitySave()
			$blockTypes[] = $blockType;
		}

		$contentRecord->content = $content;

		if ($contentRecord->save())
		{
			// Give the block types a chance to do any post-processing
			foreach ($blockTypes as $blockType)
			{
				$blockType->onAfterEntitySave();
			}

			return true;
		}
		else
		{
			$page->addErrors($contentRecord->getErrors());
		}
	}

	/**
	 * Deletes a page by its ID.
	 *
	 * @param int $pageId
	 * @return bool
	*/
	public function deletePageById($pageId)
	{
		blx()->db->createCommand()->delete('pages', array('id' => $pageId));
		return true;
	}

	/**
	 * Gets a page record or creates a new one.
	 *
	 * @access private
	 * @param int $pageId
	 * @throws Exception
	 * @return PageRecord
	 */
	private function _getPageRecordById($pageId = null)
	{
		if ($pageId)
		{
			$pageRecord = PageRecord::model()->findById($pageId);

			if (!$pageRecord)
			{
				throw new Exception(Blocks::t('No page exists with the ID “{id}”', array('id' => $pageId)));
			}
		}
		else
		{
			$pageRecord = new PageRecord();
		}

		return $pageRecord;
	}

	/**
	 * Gets a page content record by the page ID, or creates a new one.
	 *
	 * @param int $pageId
	 * @return PageContentRecord
	 */
	public function getPageContentRecordByPageId($pageId)
	{
		$record = PageContentRecord::model()->findByAttributes(array(
			'pageId'   => $pageId,
			'language' => Blocks::getLanguage(),
		));

		if (empty($record))
		{
			$record = new PageContentRecord();
			$record->pageId = $pageId;
			$record->language = Blocks::getLanguage();
		}

		return $record;
	}
}
