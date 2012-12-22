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
abstract class BaseOptionsBlockType extends BaseBlockType
{
	protected $multi = false;

	/**
	 * Defines the settings.
	 *
	 * @access protected
	 * @return array
	 */
	protected function defineSettings()
	{
		return array(
			'options' => array(AttributeType::Mixed, 'default' => array())
		);
	}

	/**
	 * Preps the settings before they're saved to the database.
	 *
	 * @param array $settings
	 * @return array
	 */
	public function prepSettings($settings)
	{
		// Expand the options setting into an array.
		if (!isset($settings['options']) || !is_array($settings['options']))
		{
			$options = array();

			if (!empty($settings['options']) && is_string($settings['options']))
			{
				$lines = array_filter(preg_split('/[\r\n]+/', $settings['options']));

				foreach($lines as $line)
				{
					$parts = preg_split('/=>/', $line, 2);
					$options[trim($parts[0])] = (isset($parts[1])) ? trim($parts[1]) : trim($parts[0]);
				}
			}

			$settings['options'] = $options;
		}

		return $settings;
	}

	/**
	 * Returns the content attribute config.
	 *
	 * @return mixed
	 */
	public function defineContentAttribute()
	{
		if ($this->multi)
		{
			return AttributeType::Mixed;
		}
		else
		{
			return AttributeType::String;
		}
	}

	/**
	 * Returns the block's settings HTML.
	 *
	 * @return string|null
	 */
	public function getSettingsHtml()
	{
		// Prepare the options array for the textarea
		$options = '';

		if (is_array($this->getSettings()->options))
		{
			foreach ($this->getSettings()->options as $value => $label)
			{
				if ((string)$value === (string)$label)
				{
					$options .= $label."\n";
				}
				else
				{
					$options .= $value.' => '.$label."\n";
				}
			}
		}

		return blx()->templates->render('_components/blocktypes/optionsblocksettings', array(
			'label'   => $this->getOptionsSettingsLabel(),
			'options' => $options
		));
	}

	/**
	 * Returns the label for the Options setting.
	 *
	 * @abstract
	 * @access protected
	 * @return string
	 */
	abstract protected function getOptionsSettingsLabel();
}
