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
class LicenseKeyStatus
{
	// Valid Key
	const Valid = 'Valid';

	// We either can't find the given key, or it's not tied to the domain they are running on.
	const InvalidKey = 'InvalidKey';

	// Can't find the a license key at all.
	const MissingKey = 'MissingKey';

	//  Haven't been able to verify the license key status yet.
	const Unverified = 'Unverified';
}
