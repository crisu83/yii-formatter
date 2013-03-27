<?php
/**
 * FormatterBehavior class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.behaviors
 */

Yii::import('vendor.crisu83.yii-formatter.formatters.*');

class FormatterBehavior extends CActiveRecordBehavior
{
	/**
	 * @var array an array of formatter configurations (name=>config).
	 */
	public $formatters = array();

	private $_formatters = array();

	/**
	 * Formats the given attribute.
	 * @param string $name the name of the formatter.
	 * @param string $attribute the name of the attribute.
	 * @param array $params initial values to be applied to the formatter properties.
	 */
	public function formatAttribute($name, $attribute, $params = array())
	{
		$this->formatAttributes($name, array($attribute), $params);
	}

	/**
	 * Unformats the given attribute.
	 * @param string $name the name of the formatter.
	 * @param string $attribute the name of the attribute.
	 * @param array $params initial values to be applied to the formatter properties.
	 */
	public function unformatAttribute($name, $attribute, $params = array())
	{
		$this->unformatAttributes($name, array($attribute), $params);
	}

	/**
	 * Formats the given attributes.
	 * @param string $name the name of the formatter.
	 * @param string $attributes list of the attributes.
	 * @param array $params initial values to be applied to the formatter properties.
	 */
	public function formatAttributes($name, $attributes, $params = array())
	{
		if (isset($this->formatters[$name]))
			$params = CMap::mergeArray($this->formatters[$name], $params);
		$formatter = Formatter::createFormatter($name, $this->owner, $params);
		$formatter->format($this->owner, $attributes);
	}

	/**
	 * Unformats the given attributes.
	 * @param string $name the name of the formatter.
	 * @param string $attributes list of the attributes.
	 * @param array $params initial values to be applied to the formatter properties.
	 */
	public function unformatAttributes($name, $attributes, $params = array())
	{
		if (isset($this->formatters[$name]))
			$params = CMap::mergeArray($this->formatters[$name], $params);
		$formatter = Formatter::createFormatter($name, $this->owner, $params);
		$formatter->unformat($this->owner, $attributes);
	}
}
