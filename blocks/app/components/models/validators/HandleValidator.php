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
class HandleValidator extends \CValidator
{
	public $reservedWords = array();

	protected static $baseReservedWords = array('id', 'dateCreated', 'dateUpdated', 'uid', 'this', 'true', 'false', 'y', 'n', 'yes', 'no', 'classHandle', 'attributeNames', 'attributes', 'attribute', 'rules', 'attributeLabels', 'blocks', 'content', 'rawContent');

	/**
	 * @param $object
	 * @param $attribute
	 */
	protected function validateAttribute($object, $attribute)
	{
		$handle = $object->$attribute;

		// Handles are always required, so if it's blank, the required validator will catch this.
		if ($handle)
		{
			$reservedWords = array_merge($this->reservedWords, static::$baseReservedWords);
			$reservedWords = array_map('strtolower', $reservedWords);
			$lcHandle = strtolower($handle);

			if (in_array($lcHandle, $reservedWords))
			{
				$message = Blocks::t('“{handle}” is a reserved word.', array('handle' => $handle));
				$this->addError($object, $attribute, $message);
			}
			else
			{
				if (!preg_match('/^[a-zA-Z][a-zA-Z0-9_]*$/', $handle))
				{
					$altMessage = Blocks::t('“{handle}” isn’t a valid handle.', array('handle' => $handle));
					$message = $this->message !== null ? $this->message : $altMessage;
					$this->addError($object, $attribute, $message);
				}
			}
		}
	}
}
