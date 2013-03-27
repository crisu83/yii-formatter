<?php
/**
 * NumberFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class NumberFormatter extends Formatter
{
	/**
	 * @var array the format configurations.
	 * @see CNumberFormatter::formatNumber
	 */
	public $format;

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	public function formatAttribute($object, $attribute)
	{
		return Yii::app()->numberFormatter->formatNumber($this->format, $object->$attribute);
	}
}