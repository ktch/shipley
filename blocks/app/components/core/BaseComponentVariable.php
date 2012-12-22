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
 * Component template variable class
 *
 * @abstract
 */
abstract class BaseComponentVariable
{
	protected $component;

	/**
	 * Constructor
	 *
	 * @param BaseComponent $component
	 */
	function __construct($component)
	{
		$this->component = $component;
	}

	/**
	 * Use the component's name as its string representation.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->component->getName();
	}

	/**
	 * Returns the component's class handle.
	 *
	 * @return string
	 */
	public function getClassHandle()
	{
		return $this->component->getClassHandle();
	}

	/**
	 * Returns the component's name.
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->component->getName();
	}

	/**
	 * Returns the component's settings HTML.
	 *
	 * @return string
	 */
	public function getSettingsHtml()
	{
		return $this->component->getSettingsHtml();
	}

	/**
	 * Mass-populates instances of this class with a given set of models.
	 *
	 * @static
	 * @param array $models
	 * @return array
	 */
	public static function populateVariables($models)
	{
		return VariableHelper::populateVariables($models, get_called_class());
	}
}
