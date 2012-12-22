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
class EntryRevisionsVariable
{
	// -------------------------------------------
	//  Drafts
	// -------------------------------------------

	/**
	 * Returns entry drafts by an entry ID.
	 *
	 * @param int $entryId
	 * @return array
	 */
	public function getDraftsByEntryId($entryId)
	{
		return blx()->entryRevisions->getDraftsByEntryId($entryId);
	}

	/**
	 * Returns the drafts of a given entry that are editable by the current user.
	 *
	 * @param int $entryId
	 * @return array
	 */
	public function getEditableDraftsByEntryId($entryId)
	{
		return blx()->entryRevisions->getEditableDraftsByEntryId($entryId);
	}

	/**
	 * Returns an entry draft by its offset.
	 *
	 * @param $draftId
	 * @return EntryDraftModel|null
	 */
	public function getDraftById($draftId)
	{
		return blx()->entryRevisions->getDraftById($draftId);
	}

	/**
	 * Returns an entry draft by its offset.
	 *
	 * @param int $entryId
	 * @param int $offset
	 * @return EntryDraftModel|null
	 */
	public function getDraftByOffset($entryId, $offset = 0)
	{
		return blx()->entryRevisions->getDraftByOffset($entryId, $offset);
	}

	// -------------------------------------------
	//  Versions
	// -------------------------------------------

	/**
	 * Returns entry versions by an entry ID.
	 *
	 * @param int $entryId
	 * @return array
	 */
	public function getVersionsByEntryId($entryId)
	{
		return blx()->entryRevisions->getVersionsByEntryId($entryId);
	}

	/**
	 * Returns an entry version by its ID.
	 *
	 * @param $versionId
	 * @return EntryVersionModel|null
	 */
	public function getVersionById($versionId)
	{
		return blx()->entryRevisions->getVersionById($versionId);
	}

	/**
	 * Returns an entry version by its offset.
	 *
	 * @param int $entryId
	 * @param int $offset
	 * @return EntryVersionModel|null
	 */
	public function getVersionByOffset($entryId, $offset = 0)
	{
		return blx()->entryRevisions->getVersionByOffset($entryId, $offset);
	}
}
