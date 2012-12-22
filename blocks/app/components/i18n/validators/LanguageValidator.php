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
 * Will validate that the given attribute is a valid language ID by calling \CLocale::getInstance, which checks
 * against the file system.
 */
class LanguageValidator extends \CValidator
{
	/**
	 * @param $object
	 * @param $attribute
	 */
	protected function validateAttribute($object, $attribute)
	{
		$value = $object->$attribute;

		if (!Locale::exists($value))
		{
			$message = Blocks::t('Couldn’t find the language id “{value}”.', array('value', $value));
			$this->addError($object, $attribute, $message);
		}
	}
}
