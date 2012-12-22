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
class PlainTextBlockType extends BaseBlockType
{
	/**
	 * Returns the type of block this is.
	 *
	 * @return string
	 */
	public function getName()
	{
		return Blocks::t('Plain Text');
	}

	/**
	 * Defines the settings.
	 *
	 * @access protected
	 * @return array
	 */
	protected function defineSettings()
	{
		return array(
			'hint'          => array(AttributeType::String, 'default' => Blocks::t('Enter text…', null, null, null, blx()->language)),
			'multiline'     => array(AttributeType::Bool),
			'initialRows'   => array(AttributeType::Number, 'min' => 1, 'default' => 4),
			'maxLength'     => array(AttributeType::Number, 'min' => 0),
			'maxLengthUnit' => array(AttributeType::Enum, 'values' => array('words', 'chars')),
		);
	}

	/**
	 * Returns the block's settings HTML.
	 *
	 * @return string|null
	 */
	public function getSettingsHtml()
	{
		return blx()->templates->render('_components/blocktypes/PlainText/settings', array(
			'settings' => $this->getSettings()
		));
	}

	/**
	 * Returns the content attribute config.
	 *
	 * @return mixed
	 */
	public function defineContentAttribute()
	{
		if ($this->getSettings()->multiline)
		{
			return array(AttributeType::String, 'column' => ColumnType::Text);
		}
		else
		{
			return array(AttributeType::String, 'column' => ColumnType::Varchar);
		}
	}

	/**
	 * Returns the block's input HTML.
	 *
	 * @param string $name
	 * @param mixed  $value
	 * @return string
	 */
	public function getInputHtml($name, $value)
	{
		return blx()->templates->render('_components/blocktypes/PlainText/input', array(
			'name'     => $name,
			'value'    => $value,
			'settings' => $this->getSettings()
		));
	}
}
