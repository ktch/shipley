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
class SecurityService extends BaseApplicationComponent
{
	private $_iterationCount;

	/**
	 *
	 */
	function __construct()
	{
		parent::init();
		$this->_iterationCount = blx()->config->get('phpPass-iterationCount');
	}

	/**
	 * @return int
	 */
	public function getMinimumPasswordLength()
	{
		return 6;
	}

	/**
	 * @param $password
	 * @throws Exception
	 * @return string
	 */
	public function hashPassword($password)
	{
		$passwordHasher = new \PasswordHash($this->_iterationCount, false);
		$hashAndType = $passwordHasher->hashPassword($password);
		$check = $passwordHasher->checkPassword($password, $hashAndType['hash']);

		if (!$check)
		{
			$passwordHasher = new \PasswordHash($this->_iterationCount, false);
			$hashAndType = $passwordHasher->hashPassword($password);
			$check = $passwordHasher->checkPassword($password, $hashAndType['hash']);
		}

		if ($check)
		{
			return $hashAndType;
		}

		throw new Exception(Blocks::t('Could not hash the given password.'));
	}

	/**
	 * @param $password
	 * @param $storedHash
	 * @return bool
	 */
	public function checkPassword($password, $storedHash)
	{
		$passwordHasher = new \PasswordHash($this->_iterationCount, false);
		$check = $passwordHasher->checkPassword($password, $storedHash);

		return $check;
	}
}
