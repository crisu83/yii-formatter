<?php
/**
 * InlineFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class InlineFormatter extends BaseFormatter
{
	/**
	 * @var array the callable format method.
	 */
	public $method;
	/**
	 * @var array additional parameters for the formatter.
	 */
	public $params;

	/**
	 * Formats the given value.
	 * @param string $value the value to format.
	 * @return string the formatted value.
	 */
	public function format($value)
	{
		$method = $this->method;
		return call_user_func_array($method, array($value, $this->params));
	}
}