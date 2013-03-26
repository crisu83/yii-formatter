<?php
/**
 * Formatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

abstract class Formatter extends CComponent
{
	// List of built in formatters.
	public static $builtInFormatters = array(
		'boolean'=>'BooleanFormatter',
		'dateTime'=>'DateTimeFormatter',
	);

	/**
	 * @var string list of attributes to be formatted.
	 */
	public $attributes;

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 */
	abstract protected function formatAttribute($object, $attribute);

	/**
	 * Unformats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 */
	abstract protected function unformatAttribute($object, $attribute);

	/**
	 * @param string $name the name or class of the formatter.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @param array $params initial values to be applied to the formatter properties.
	 * @return Formatter the formatter instance.
	 */
	public static function createFormatter($name, $object, $attributes, $params = array()) {
		if (is_string($attributes))
			$attributes = preg_split('/[\s,]+/', $attributes, -1, PREG_SPLIT_NO_EMPTY);

		if (is_array($name)
			&& isset($name[0], $name[1])
			&& method_exists($object, $name[0])
			&& method_exists($object, $name[1]))
		{
			$formatter = new InlineFormatter();
			$formatter->attributes = $attributes;
			$formatter->formatMethod = $name[0];
			$formatter->unformatMethod = $name[1];
			$formatter->params = $params;
		}
		else
		{
			if (isset(self::$builtInFormatters[$name]))
				$className = Yii::import(self::$builtInFormatters[$name], true);
			else
				$className = Yii::import($name, true);

			$formatter = new $className;
			$params['attributes'] = $attributes;
			foreach ($params as $name => $value)
				$formatter->$name = $value;
		}

		return $formatter;
	}

	/**
	 * Formats the given attributes.
	 * @param CModel $object the model.
	 * @param array $attributes the list of attributes to be formatted.
	 */
	public function format($object, $attributes = null)
	{
		if (is_array($attributes))
			$attributes = array_intersect($this->attributes, $attributes);
		else
			$attributes = $this->attributes;
		foreach ($attributes as $attribute)
			$this->formatAttribute($object, $attribute);
	}

	/**
	 * Unformats the given attributes.
	 * @param CModel $object the model.
	 * @param array $attributes the list of attributes to be unformatted.
	 */
	public function unformat($object, $attributes = null)
	{
		if (is_array($attributes))
			$attributes = array_intersect($this->attributes, $attributes);
		else
			$attributes = $this->attributes;
		foreach ($attributes as $attribute)
			$this->unformatAttribute($object, $attribute);
	}
}
