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
class RichTextBlockType extends BaseBlockType
{
	/**
	 * Returns the type of block this is.
	 *
	 * @return string
	 */
	public function getName()
	{
		return Blocks::t('Rich Text');
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
			'minHeight' => array(AttributeType::Number, 'default' => 100, 'min' => 1),
		);
	}

	/**
	 * Returns the block's settings HTML.
	 *
	 * @return string|null
	 */
	public function getSettingsHtml()
	{
		return blx()->templates->render('_components/blocktypes/RichText/settings', array(
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
		return array(AttributeType::String, 'column' => ColumnType::Text);
	}

	/**
	 * Preps the block value for use.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
	public function prepValue($value)
	{
		// Prevent everyone from having to use the |raw filter when outputting RTE content
		$charset = blx()->templates->getTwig()->getCharset();
		return new \Twig_Markup($value, $charset);
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
		blx()->templates->includeCssResource('lib/redactor/redactor.css');
		blx()->templates->includeJsResource('lib/redactor/redactor.min.js');
		blx()->templates->includeJsResource('lib/redactor/plugins/fullscreen.js');

		$config = array(
			'buttons' => array('html','|','formatting','|','bold','italic','|','unorderedlist','orderedlist','|','link','image','video','table'),
			'plugins' => array('fullscreen'),
		);

		if ($this->getSettings()->minHeight)
		{
			$config['minHeight'] = $this->getSettings()->minHeight;
		}

		$configJson = JsonHelper::encode($config);

		blx()->templates->includeJs('$(".redactor-'.$name.'").redactor('.$configJson.');');

		return '<textarea id="'.$name.'" name="'.$name.'" class="redactor-'.$name.'" style="display: none">'.$value.'</textarea>';
	}
}
