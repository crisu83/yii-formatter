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
	// Valid date formats.
	const FORMAT_AMERICAN = 'american';
	const FORMAT_EUROPEAN = 'european';

	// Date and time widths.
	const WIDTH_SHORT = 'short';
	const WIDTH_MEDIUM = 'medium';
	const WIDTH_LONG = 'long';

	/**
	 * @var string the date format.
	 * Valid values are 'american' and 'european' (defaults to 'european').
	 */
	public $format = self::FORMAT_EUROPEAN;
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
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	protected function formatAttribute($object, $attribute)
	{
		$object->$attribute = Yii::app()->dateFormatter->formatDateTime(strtotime($object->$attribute), $this->dateWidth, $this->timeWidth);
	}

	/**
	 * Unformats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the unformatted value.
	 */
	protected function unformatAttribute($object, $attribute)
	{
		$object->$attribute = date($this->timeWidth !== null ? 'Y-m-d H:i:s' : 'Y-m-d', $this->convertDateToTimestamp($object->$attribute));
	}

	/**
	 * Converts the given date to a timestamp.
	 * @param string $date the date to convert.
	 * @return integer the timestamp.
	 */
	protected function convertDateToTimestamp($date)
	{
		if ($this->format === self::FORMAT_EUROPEAN)
			$date = str_replace('/', '-', $date);
		else if ($this->format === self::FORMAT_AMERICAN)
			$date = str_replace(array('-', '.'), '/', $date);
		return strtotime($date);
	}
}