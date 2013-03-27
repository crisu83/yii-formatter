<?php
/**
 * EmailFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class EmailFormatter extends BaseFormatter
{
	/**
	 * Formats the given attribute.
	 * @param string $value the value to format.
	 * @return string the formatted value.
	 */
	public function formatAttribute($value)
	{
		return CHtml::mailto($value);
	}
}