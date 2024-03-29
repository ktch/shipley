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
 *
 */
class UserProfilesService extends BaseEntityService
{
	// -------------------------------------------
	//  User Profile Blocks
	// -------------------------------------------

	/**
	 * The block model class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $blockModelClass = 'UserProfileBlockModel';

	/**
	 * The block record class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $blockRecordClass = 'UserProfileBlockRecord';

	/**
	 * The content record class name.
	 *
	 * @access protected
	 * @var string
	 */
	protected $contentRecordClass = 'UserProfileRecord';

	/**
	 * The name of the content table column right before where the block columns should be inserted.
	 *
	 * @access protected
	 * @var string
	 */
	protected $placeBlockColumnsAfter = 'userId';

	// -------------------------------------------
	//  User Profiles
	// -------------------------------------------

	/**
	 * Saves a user profile.
	 *
	 * @param UserModel $user
	 * @return bool
	 */
	public function saveProfile(UserModel $user)
	{
		$profileRecord = $this->getProfileRecordByUserId($user->id);

		// Populate the blocks' content
		$blocks = $this->getAllBlocks();
		$blockTypes = array();

		foreach ($blocks as $block)
		{
			$blockType = blx()->blockTypes->populateBlockType($block);
			$blockType->entity = $user;

			if ($blockType->defineContentAttribute() !== false)
			{
				$handle = $block->handle;
				$profileRecord->$handle = $blockType->getPostData();
			}

			// Keep the block type instance around for calling onAfterEntitySave()
			$blockTypes[] = $blockType;
		}

		if ($profileRecord->save())
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
			$user->addErrors($profileRecord->getErrors());

			return false;
		}
	}

	/**
	 * Gets a profile's record by its user ID.
	 *
	 * @param int $userId
	 * @return UserProfileRecord
	 */
	public function getProfileRecordByUserId($userId)
	{
		$profileRecord = UserProfileRecord::model()->findByAttributes(array(
			'userId' => $userId
		));

		if (!$profileRecord)
		{
			$profileRecord = new UserProfileRecord();
			$profileRecord->userId = $userId;
		}

		return $profileRecord;
	}

	// -------------------------------------------
	//  Users
	// -------------------------------------------

	/**
	 * Crop and save a user's photo by coordinates for a given user model.
	 *
	 * @param $source
	 * @param $x1
	 * @param $x2
	 * @param $y1
	 * @param $y2
	 * @param UserModel $user
	 * @return bool
	 * @throws \Exception
	 */
	public function cropAndSaveUserPhoto($source, $x1, $x2, $y1, $y2, UserModel $user)
	{
		$userPhotoFolder = blx()->path->getUserPhotosPath().$user->username.'/';
		$targetFolder = $userPhotoFolder.'original/';

		IOHelper::ensureFolderExists($userPhotoFolder);
		IOHelper::ensureFolderExists($targetFolder);

		$filename = pathinfo($source, PATHINFO_BASENAME);
		$targetPath = $targetFolder . $filename;


		$image = blx()->images->loadImage($source);
		$image->crop($x1, $x2, $y1, $y2);
		$result = $image->saveAs($targetPath);

		if ($result)
		{
			IOHelper::changePermissions($targetPath, IOHelper::writableFilePermissions);
			$record = UserRecord::model()->findById($user->id);
			$record->photo = $filename;
			$record->save();

			$user->photo = $filename;

			return true;
		}

		return false;
	}

	/**
	 * Delete a user's photo.
	 *
	 * @param UserModel $user
	 * @return void
	 */
	public function deleteUserPhoto(UserModel $user)
	{
		$folder = blx()->path->getUserPhotosPath().$user->username;

		if (IOHelper::folderExists($folder))
		{
			IOHelper::deleteFolder($folder);
		}
	}
}
