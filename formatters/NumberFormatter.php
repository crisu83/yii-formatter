<?php
/**
 * NumberFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class NumberFormatter extends BaseFormatter
{
	/**
	 * @var array the format configurations.
	 * @see CNumberFormatter::formatNumber
	 */
	public $format;

	/**
	 * Formats the given value.
	 * @param string $value the value to format.
	 * @return string the formatted value.
	 */
	public function format($value)
	{
		return Yii::app()->numberFormatter->formatNumber($this->format, $value);
	}
}