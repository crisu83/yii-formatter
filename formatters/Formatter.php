<?php

abstract class Formatter extends CComponent
{
	public static $builtInFormatters = array(
		'boolean'=>'BooleanFormatter',
		'dateTime'=>'DateTimeFormatter',
	);

	/**
	 * @var string the name of the attribute.
	 */
	public $attribute;

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	abstract public function formatAttribute($object, $attribute);

	/**
	 * Unformats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the unformatted value.
	 */
	abstract public function unformatAttribute($object, $attribute);

	/**
	 * @param string $name the name or class of the formatter.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @param array $params initial values to be applied to the formatter properties.
	 * @return Formatter the formatter instance.
	 */
	public static function createFormatter($name, $object, $attribute, $params = array()) {
		// todo: add support for inline formatters.

		if (isset(self::$builtInFormatters[$name]))
			$className = Yii::import(self::$builtInFormatters[$name], true);
		else
			$className = Yii::import($name, true);

		$formatter = new $className;
		$params['attribute'] = $attribute;
		foreach ($params as $name => $value)
			$formatter->$name = $value;

		return $formatter;
	}
}