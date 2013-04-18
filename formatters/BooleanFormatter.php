<?php
/**
 * BooleanFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class BooleanFormatter extends BaseFormatter
{
	/**
	 * @var string the true value to format to.
	 */
	public $trueValue = 'Yes';
	/**
	 * @var string the false value to format to.
	 */
	public $falseValue = 'No';

	/**
	 * Formats the given value.
	 * @param string $value the value to format.
	 * @return string the formatted value.
	 */
	public function format($value)
	{
		if (!isset($value))
			return null;
		return $value ? $this->trueValue : $this->falseValue;
	}
}
