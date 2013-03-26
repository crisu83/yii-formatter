<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Christoffer
 * Date: 26.3.2013
 * Time: 22:37
 * To change this template use File | Settings | File Templates.
 */

class FormatterBehavior extends CActiveRecordBehavior
{
	public $formatters = array();

	/**
	 * Formats the given attribute.
	 * @param string $name the name of the formatter.
	 * @param string $attribute the name of the attribute.
	 * @param array $params initial values to be applied to the formatter properties.
	 * @return string the formatted value.
	 */
	public function formatAttribute($name, $attribute, $params = array())
	{
		if (isset($this->formatters[$name]))
			$params = CMap::mergeArray($this->formatters[$name], $params);
		$formatter = Formatter::createFormatter($name, $this->owner, $attribute, $params);
		return $formatter->formatAttribute($this->owner, $attribute);
	}

	/**
	 * Unformats the given attribute.
	 * @param string $name the name of the formatter.
	 * @param string $attribute the name of the attribute.
	 * @param array $params initial values to be applied to the formatter properties.
	 * @return string the unformatted value.
	 */
	public function unformatAttribute($name, $attribute, $params = array())
	{
		if (isset($this->formatters[$name]))
			$params = CMap::mergeArray($this->formatters[$name], $params);
		$formatter = Formatter::createFormatter($name, $this->owner, $attribute, $params);
		return $formatter->unformatAttribute($this->owner, $attribute);
	}
}