<?php
/**
 * Formatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

abstract class BaseFormatter extends CComponent
{
	// List of built in formatters.
	public static $builtInFormatters = array(
		'boolean'=>'BooleanFormatter',
		'currency'=>'CurrencyFormatter',
		'dateTime'=>'DateTimeFormatter',
		'decimal'=>'DecimalFormatter',
		'number'=>'NumberFormatter',
		'percentage'=>'PercentageFormatter',
	);

	/**
	 * Formats the given value.
	 * @param string $value the value to format.
	 * @return string the formatted value.
	 */
	abstract public function format($value);

	/**
	 * @param string $format the name or class of the formatter.
	 * @param CModel $object the model.
	 * @param array $params initial values to be applied to the formatter properties.
	 * @return BaseFormatter the formatter instance.
	 */
	public static function createFormatter($format, $params = array())
	{
		if (is_callable($format))
		{
			$formatter = new InlineFormatter();
			$formatter->method = $format;
			$formatter->params = $params;
		}
		else
		{
			if (isset(self::$builtInFormatters[$format]))
				$className = Yii::import(self::$builtInFormatters[$format], true);
			else
				$className = Yii::import($format, true);

			$formatter = new $className;
			foreach ($params as $format => $value)
				$formatter->$format = $value;
		}

		return $formatter;
	}
}
