<?php
/**
 * PercentageFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class PercentageFormatter extends BaseFormatter
{
	/**
	 * Formats the given value.
	 * @param string $value the value to format.
	 * @return string the formatted value.
	 */
	public function format($value)
	{
		return Yii::app()->numberFormatter->formatPercentage($value);
	}
}