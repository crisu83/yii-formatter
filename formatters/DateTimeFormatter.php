<?php

class DateTimeFormatter extends Formatter
{
	// Valid date formats.
	const FORMAT_AMERICAN = 'american';
	const FORMAT_EUROPEAN = 'european';

	public $format = self::FORMAT_EUROPEAN;
	public $dateWidth = 'normal';
	public $timeWidth = 'normal';
	public $dateOnly = false;

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	public function formatAttribute($object, $attribute)
	{
		return Yii::app()->dateFormatter->formatDateTime(strtotime($object->$attribute), $this->dateWidth, !$this->dateOnly ? $this->timeWidth : null);
	}

	/**
	 * Unformats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the unformatted value.
	 */
	public function unformatAttribute($object, $attribute)
	{
		return date(!$this->dateOnly ? 'Y-m-d H:i:s' : 'Y-m-d', $this->convertDateToTimestamp($object->$attribute));
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