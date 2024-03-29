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
class DateTimeHelper
{
	/**
	 * @return DateTime
	 */
	public static function currentUTCDateTime()
	{
		return new DateTime(null, new \DateTimeZone('UTC'));
	}

	/**
	 * @static
	 * @return int
	 */
	public static function currentTimeStamp()
	{
		$date = static::currentUTCDateTime();
		return $date->getTimestamp();
	}

	/**
	 * @static
	 * @return string
	 */
	public static function currentTimeForDb()
	{
		// Eventually this will return the time in the appropriate database format for MySQL, Postgre, etc.
		// For now, it's MySQL only.
		$date = DateTimeHelper::currentUTCDateTime();
		return $date->format(DateTime::MYSQL_DATETIME);
	}

	/**
	 * @param $timeStamp
	 * @return DateTime
	 */
	public static function formatTimeForDb($timeStamp)
	{
		// Eventually this will accept a database parameter and format the timestamp for the given database date/time datatype.
		// For now, it's MySQL only.
		$dt = new DateTime('@'.$timeStamp);
		return $dt->format(DateTime::MYSQL_DATETIME);
	}

	/**
	 * @static
	 * @param int $seconds The number of seconds
	 * @param bool $showSeconds Whether to output seconds or not
	 * @return string
	 */
	public static function secondsToHumanTimeDuration($seconds, $showSeconds = true)
	{
		$secondsInWeek   = 604800;
		$secondsInDay    = 86400;
		$secondsInHour   = 1400;
		$secondsInMinute = 60;

		$weeks = floor($seconds / $secondsInWeek);
		$seconds = $seconds % $secondsInWeek;

		$days = floor($seconds / $secondsInDay);
		$seconds = $seconds % $secondsInDay;

		$hours = floor($seconds / $secondsInHour);
		$seconds = $seconds % $secondsInHour;

		if ($showSeconds)
		{
			$minutes = floor($seconds / $secondsInMinute);
			$seconds = $seconds % $secondsInMinute;
		}
		else
		{
			$minutes = round($seconds / $secondsInMinute);
			$seconds = 0;
		}

		$timeComponents = array();

		if ($weeks)
		{
			$timeComponents[] = $weeks.' '.($weeks > 1 ? Blocks::t('weeks') : Blocks::t('week'));
		}

		if ($days)
		{
			$timeComponents[] = $days.' '.($days > 1 ? Blocks::t('days') : Blocks::t('day'));
		}

		if ($hours)
		{
			$timeComponents[] = $hours.' '.($hours > 1 ? Blocks::t('hours') : Blocks::t('hour'));
		}

		if ($minutes)
		{
			$timeComponents[] = $minutes.' '.($minutes > 1 ? Blocks::t('minutes') : Blocks::t('minute'));
		}

		if ($seconds)
		{
			$timeComponents[] = $seconds.' '.($seconds > 1 ? Blocks::t('seconds') : Blocks::t('second'));
		}

		return implode(', ', $timeComponents);
	}

	/**
	 * @param $timestamp
	 * @return bool
	 */
	public static function isValidTimeStamp($timestamp)
	{
		return (is_numeric($timestamp) && ($timestamp <= PHP_INT_MAX) && ($timestamp >= ~PHP_INT_MAX));
	}

	/**
	 * Returns a nicely formatted date string for given Datetime string.
	 *
	 * @param string     $dateString Datetime string
	 * @return string Formatted date string
	 */
	public static function nice($dateString = null)
	{
		if ($dateString == null)
		{
			$date = time();
		}
		else
		{
			if (static::isValidTimeStamp($dateString))
			{
				$date = $dateString;
			}
			else
			{
				$date = strtotime($dateString);
			}
		}

		return blx()->dateFormatter->formatDateTime($date);
	}

	/**
	 * Returns a formatted descriptive date string for given datetime string.
	 *
	 * If the given date is today, the returned string could be "Today, 6:54 pm".
	 * If the given date was yesterday, the returned string could be "Yesterday, 6:54 pm".
	 * If $dateString's year is the current year, the returned string does not
	 * include mention of the year.
	 *
	 * @param string $dateString Datetime string or Unix timestamp
	 * @return string Described, relative date string
	 */
	public static function niceShort($dateString = null)
	{
		$date = ($dateString == null) ? time() : strtotime($dateString);

		$y = (static::isThisYear($date)) ? '' : ' Y';

		if (static::isToday($date))
		{
			$ret = sprintf('Today, %s', date("g:i a", $date));
		}
		elseif (static::wasYesterday($date))
		{
			$ret = sprintf('Yesterday, %s', date("g:i a", $date));
		}
		else
		{
			$ret = date("M jS{$y}, H:i", $date);
		}

		return $ret;
	}

	/**
	 * Returns true if given date is today.
	 *
	 * @param string $date Unix timestamp
	 * @return boolean True if date is today
	 */
	public static function isToday($date)
	{
		return date('Y-m-d', $date) == date('Y-m-d', time());
	}

	/**
	 * Returns true if given date was yesterday
	 *
	 * @param string $date Unix timestamp
	 * @return boolean True if date was yesterday
	 */
	public static function wasYesterday($date)
	{
		return date('Y-m-d', $date) == date('Y-m-d', strtotime('yesterday'));
	}

	/**
	 * Returns true if given date is in this year
	 *
	 * @param string $date Unix timestamp
	 * @return boolean True if date is in this year
	 */
	public static function isThisYear($date)
	{
		return date('Y', $date) == date('Y', time());
	}

	/**
	 * Returns true if given date is in this week
	 *
	 * @param string $date Unix timestamp
	 * @return boolean True if date is in this week
	 */
	public static function isThisWeek($date)
	{
		return date('W Y', $date) == date('W Y', time());
	}

	/**
	 * Returns true if given date is in this month
	 *
	 * @param string $date Unix timestamp
	 * @return boolean True if date is in this month
	 */
	public static function isThisMonth($date)
	{
		return date('m Y', $date) == date('m Y', time());
	}

	/**
	 * Returns either a relative date or a formatted date depending
	 * on the difference between the current time and given datetime.
	 * $datetime should be in a <i>strtotime</i>-parsable format, like MySQL's datetime datatype.
	 *
	 * Options:
	 *  'format' => a fall back format if the relative time is longer than the duration specified by end
	 *  'end' =>  The end of relative time telling
	 *
	 * Relative dates look something like this:
	 *  3 weeks, 4 days ago
	 *  15 seconds ago
	 * Formatted dates look like this:
	 *  on 02/18/2004
	 *
	 * The returned string includes 'ago' or 'on' and assumes you'll properly add a word
	 * like 'Posted ' before the function output.
	 *
	 * @param       $dateTime
	 * @param array $options Default format if timestamp is used in $dateString
	 *
	 * @internal param string $dateString Datetime string
	 * @return string Relative time string.
	 */
	public static function timeAgoInWords($dateTime, $options = array())
	{
		$now = time();

		$inSeconds = strtotime($dateTime);
		$backwards = ($inSeconds > $now);

		$format = 'j/n/y';
		$end = '+1 month';

		if (is_array($options))
		{
			if (isset($options['format']))
			{
				$format = $options['format'];
				unset($options['format']);
			}
			if (isset($options['end']))
			{
				$end = $options['end'];
				unset($options['end']);
			}
		}
		else
		{
			$format = $options;
		}

		if ($backwards)
		{
			$futureTime = $inSeconds;
			$pastTime = $now;
		}
		else
		{
			$futureTime = $now;
			$pastTime = $inSeconds;
		}

		$diff = $futureTime - $pastTime;

		// If more than a week, then take into account the length of months
		if ($diff >= 604800)
		{
			$current = array();
			$date = array();

			list($future['H'], $future['i'], $future['s'], $future['d'], $future['m'], $future['Y']) = explode('/', date('H/i/s/d/m/Y', $futureTime));

			list($past['H'], $past['i'], $past['s'], $past['d'], $past['m'], $past['Y']) = explode('/', date('H/i/s/d/m/Y', $pastTime));
			$years = $months = $weeks = $days = $hours = $minutes = $seconds = 0;

			if ($future['Y'] == $past['Y'] && $future['m'] == $past['m'])
			{
				$months = 0;
				$years = 0;
			}
			else
			{
				if ($future['Y'] == $past['Y'])
				{
					$months = $future['m'] - $past['m'];
				}
				else
				{
					$years = $future['Y'] - $past['Y'];
					$months = $future['m'] + ((12 * $years) - $past['m']);

					if ($months >= 12)
					{
						$years = floor($months / 12);
						$months = $months - ($years * 12);
					}

					if ($future['m'] < $past['m'] && $future['Y'] - $past['Y'] == 1)
					{
						$years--;
					}
				}
			}

			if ($future['d'] >= $past['d'])
			{
				$days = $future['d'] - $past['d'];
			}
			else
			{
				$daysInPastMonth = date('t', $pastTime);
				$daysInFutureMonth = date('t', mktime(0, 0, 0, $future['m'] - 1, 1, $future['Y']));

				if (!$backwards)
				{
					$days = ($daysInPastMonth - $past['d']) + $future['d'];
				}
				else
				{
					$days = ($daysInFutureMonth - $past['d']) + $future['d'];
				}

				if ($future['m'] != $past['m'])
				{
					$months--;
				}
			}

			if ($months == 0 && $years >= 1 && $diff < ($years * 31536000))
			{
				$months = 11;
				$years--;
			}

			if ($months >= 12)
			{
				$years = $years + 1;
				$months = $months - 12;
			}

			if ($days >= 7)
			{
				$weeks = floor($days / 7);
				$days = $days - ($weeks * 7);
			}
		}
		else
		{
			$years = $months = $weeks = 0;
			$days = floor($diff / 86400);

			$diff = $diff - ($days * 86400);

			$hours = floor($diff / 3600);
			$diff = $diff - ($hours * 3600);

			$minutes = floor($diff / 60);
			$diff = $diff - ($minutes * 60);
			$seconds = $diff;
		}

		$relativeDate = '';
		$diff = $futureTime - $pastTime;

		if ($diff > abs($now - strtotime($end)))
		{
			$relativeDate = sprintf('on %s', date($format, $inSeconds));
		}
		else
		{
			if ($years > 0)
			{
				// years and months and days
				$relativeDate .= ($relativeDate ? ', ' : '').$years.' '.($years == 1 ? 'year' : 'years');
				$relativeDate .= $months > 0 ? ($relativeDate ? ', ' : '').$months.' '.($months == 1 ? 'month' : 'months') : '';
				$relativeDate .= $weeks > 0 ? ($relativeDate ? ', ' : '').$weeks.' '.($weeks == 1 ? 'week' : 'weeks') : '';
				$relativeDate .= $days > 0 ? ($relativeDate ? ', ' : '').$days.' '.($days == 1 ? 'day' : 'days') : '';
			}
			elseif (abs($months) > 0)
			{
				// months, weeks and days
				$relativeDate .= ($relativeDate ? ', ' : '').$months.' '.($months == 1 ? 'month' : 'months');
				$relativeDate .= $weeks > 0 ? ($relativeDate ? ', ' : '').$weeks.' '.($weeks == 1 ? 'week' : 'weeks') : '';
				$relativeDate .= $days > 0 ? ($relativeDate ? ', ' : '').$days.' '.($days == 1 ? 'day' : 'days') : '';
			}
			elseif (abs($weeks) > 0)
			{
				// weeks and days
				$relativeDate .= ($relativeDate ? ', ' : '').$weeks.' '.($weeks == 1 ? 'week' : 'weeks');
				$relativeDate .= $days > 0 ? ($relativeDate ? ', ' : '').$days.' '.($days == 1 ? 'day' : 'days') : '';
			}
			elseif (abs($days) > 0)
			{
				// days and hours
				$relativeDate .= ($relativeDate ? ', ' : '').$days.' '.($days == 1 ? 'day' : 'days');
				$relativeDate .= $hours > 0 ? ($relativeDate ? ', ' : '').$hours.' '.($hours == 1 ? 'hour' : 'hours') : '';
			}
			elseif (abs($hours) > 0)
			{
				// hours and minutes
				$relativeDate .= ($relativeDate ? ', ' : '').$hours.' '.($hours == 1 ? 'hour' : 'hours');
				$relativeDate .= $minutes > 0 ? ($relativeDate ? ', ' : '').$minutes.' '.($minutes == 1 ? 'minute' : 'minutes') : '';
			}
			elseif (abs($minutes) > 0)
			{
				// minutes only
				$relativeDate .= ($relativeDate ? ', ' : '').$minutes.' '.($minutes == 1 ? 'minute' : 'minutes');
			}
			else
			{
				// seconds only
				$relativeDate .= ($relativeDate ? ', ' : '').$seconds.' '.($seconds == 1 ? 'second' : 'seconds');
			}

			if (!$backwards)
			{
				$relativeDate = sprintf('%s ago', $relativeDate);
			}
		}

		return $relativeDate;
	}

	/**
	 * Returns true if specified datetime was within the interval specified, else false.
	 *
	 * @param mixed $timeInterval the numeric value with space then time type. Example of valid types: 6 hours, 2 days, 1 minute.
	 * @param mixed $dateString the datestring or unix timestamp to compare
	 * @param int $userOffset User's offset from GMT (in hours)
	 * @return bool whether the $dateString was within the specified $timeInterval
	 */
	public static function wasWithinLast($timeInterval, $dateString, $userOffset = null)
	{
		$tmp = str_replace(' ', '', $timeInterval);

		if (is_numeric($tmp))
		{
			$timeInterval = $tmp.' '.__('days', true);
		}

		$date = static::fromString($dateString, $userOffset);

		$interval = static::fromString('-'.$timeInterval);

		if ($date >= $interval && $date <= time())
		{
			return true;
		}

		return false;
	}

	/**
	 * Returns true if the specified date was in the past, else false.
	 *
	 * @param mixed $date the datestring (a valid strtotime) or unix timestamp to check
	 * @return boolean if the specified date was in the past
	 */
	public static function wasInThePast($date)
	{
		return static::fromString($date) < time() ? true : false;
	}

	/**
	 * Returns a UNIX timestamp, given either a UNIX timestamp or a valid strtotime() date string.
	 *
	 * @param string $dateString Datetime string
	 * @param int $userOffset User's offset from GMT (in hours)
	 * @return string Parsed timestamp
	 */
	public static function fromString($dateString, $userOffset = null)
	{
		if (empty($dateString))
		{
			return false;
		}

		if (is_integer($dateString) || is_numeric($dateString))
		{
			$date = intval($dateString);
		}
		else
		{
			$date = strtotime($dateString);
		}

		if ($userOffset !== null)
		{
			//return $this->convert($date, $userOffset);
		}

		if ($date === -1)
		{
			return false;
		}

		return $date;
	}

	/**
	 * Gets a DateTime object from an entry date attribute
	 *
	 * @param mixed $dateAttribute
	 * @param bool|null $required
	 * @return DateTime|null
	 */
	public static function normalizeDate($dateAttribute, $required = false)
	{
		if ($dateAttribute instanceof \DateTime)
		{
			return $dateAttribute;
		}
		else if (static::isValidTimeStamp($dateAttribute))
		{
			$dateTime = new DateTime('@'.$dateAttribute);
			return $dateTime;
		}
		else if ($required)
		{
			return DateTimeHelper::currentUTCDateTime();
		}
	}

}

