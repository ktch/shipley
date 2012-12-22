<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Rebrand
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 * Email functions
 */
class EmailMessagesVariable
{
	/**
	 * Returns all of the system email messages.
	 *
	 * @return array
	 */
	public function getAllMessages()
	{
		return blx()->emailMessages->getAllMessages();
	}

	/**
	 * Returns a system email message by its key.
	 *
	 * @param string $key
	 * @param string|null $language
	 * @return EmailMessageModel|null
	 */
	public function getMessage($key, $language = null)
	{
		return blx()->emailMessages->getMessage($key, $language);
	}
}
