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
class ArrayHelper
{
	/**
	 * Flattens a multi-dimensional array into a single-dimensional array
	 *
	 * @param        $arr
	 * @param string $prefix
	 * @return array
	 */
	public static function flattenArray($arr, $prefix = null)
	{
		$flattened = array();

		foreach ($arr as $key => $value)
		{
			if ($prefix !== null)
			{
				$key = "{$prefix}[{$key}]";
			}

			if (is_array($value))
			{
				$flattened = array_merge($flattened, static::flattenArray($value, $key));
			}
			else
			{
				$flattened[$key] = $value;
			}
		}

		return $flattened;
	}

	/**
	 * Expands a flattened array back into its original form
	 *
	 * @param $arr
	 * @return array
	 */
	public static function expandArray($arr)
	{
		$expanded = array();

		foreach ($arr as $key => $value)
		{
			// is this an array element?
			if (preg_match('/^(\w+)(\[.*)/', $key, $m))
			{
				$key = '$expanded["'.$m[1].'"]' . preg_replace('/\[([a-zA-Z]\w*?)\]/', "[\"$1\"]", $m[2]);
				eval($key.' = "'.addslashes($value).'";');
			}
			else
			{
				$expanded[$key] = $value;
			}
		}

		return $expanded;
	}

	/**
	 * @param $settings
	 * @return array
	 */
	public static function expandSettingsArray($settings)
	{
		$arr = array();

		foreach ($settings as $setting)
		{
			$arr[$setting->name] = $setting->value;
		}

		return static::expandArray($arr);
	}

	/**
	 * Converts a comma-delimited string into a trimmed array
	 * ex: ArrayHelper::stringToArray('one, two, three') => array('one', 'two', 'three')
	 *
	 * @param mixed $str The string to convert to an array
	 * @return array The trimmed array
	 */
	public static function stringToArray($str)
	{
		if (is_array($str))
		{
			return $str;
		}
		else if (empty($str))
		{
			return array();
		}
		else if (is_string($str))
		{
			return array_map('trim', explode(',', $str));
		}
		else
		{
			return array($str);
		}
	}

	/**
	 * Prepends or appends a value to an array.
	 *
	 * @param array &$arr
	 * @param mixed $value
	 * @param bool  $prepend
	 */
	public static function prependOrAppend(&$arr, $value, $prepend)
	{
		if ($prepend)
		{
			array_unshift($arr, $value);
		}
		else
		{
			array_push($arr, $value);
		}
	}
}
