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
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	abstract public function formatAttribute($object, $attribute);

	/**
	 * @param string $name the name or class of the formatter.
	 * @param CModel $object the model.
	 * @param array $params initial values to be applied to the formatter properties.
	 * @return Formatter the formatter instance.
	 */
	public static function createFormatter($name, $object, $params = array())
	{
		if (method_exists($object, $name))
		{
			$formatter = new InlineFormatter();
			$formatter->method = $name;
			$formatter->params = $params;
		}
		else
		{
			if (isset(self::$builtInFormatters[$name]))
				$className = Yii::import(self::$builtInFormatters[$name], true);
			else
				$className = Yii::import($name, true);

			$formatter = new $className;
			foreach ($params as $name => $value)
				$formatter->$name = $value;
		}

		return $formatter;
	}
}
