<?php
/**
 * FormatterBehavior class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.behaviors
 */

class FormatterBehavior extends CBehavior
{
	/**
	 * @var array an array of formatter configurations (name=>config).
	 */
	public $formatters = array();
	/**
	 * @var string the name of the formatter component (defaults to 'format').
	 */
	public $componentID = 'format';

	private $_formatter;

	/**
	 * Formats the given attribute.
	 * @param string $format the name of the formatter.
	 * @param string $value the value to be formatted.
	 * @param array $params initial values to be applied to the formatter properties.
	 */
	public function formatAttribute($format, $value, $params = array())
	{
		if (is_string($format) && isset($this->formatters[$format]))
			$params = CMap::mergeArray($this->formatters[$format], $params);
		return $this->getFormatter()->runFormatter($format, $value, $params);
	}

	/**
	 * Returns the formatter instance.
	 * @return Formatter the formatter.
	 */
	public function getFormatter()
	{
		if (isset($this->_formatter))
			return $this->_formatter;
		else
			return $this->_formatter = Yii::app()->getComponent($this->componentID);
	}
}
