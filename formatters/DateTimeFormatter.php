<?php
/**
 * DateTimeFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class DateTimeFormatter extends Formatter
{
	// Date and time widths.
	const WIDTH_SHORT = 'short';
	const WIDTH_MEDIUM = 'medium';
	const WIDTH_LONG = 'long';

	/**
	 * @var string the date width.
	 * Valid values are 'short', 'medium', 'long' (defaults to 'medium').
	 */
	public $dateWidth = self::WIDTH_MEDIUM;
	/**
	 * @var string the time width.
	 * Valid values are 'short', 'medium', 'long' (defaults to 'medium').
	 */
	public $timeWidth = self::WIDTH_MEDIUM;
	/**
	 * @var string the formatting pattern.
	 * @see CDateFormatter::format
	 */
	public $pattern;

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	public function formatAttribute($object, $attribute)
	{
		return !isset($this->pattern)
			? Yii::app()->dateFormatter->formatDateTime($object->$attribute, $this->dateWidth, $this->timeWidth)
			: Yii::app()->dateFormatter->format($this->pattern, $object->$attribute);
	}
}