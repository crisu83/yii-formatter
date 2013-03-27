<?php
/**
 * BooleanFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class BooleanFormatter extends Formatter
{
	/**
	 * @var string the true value to format to.
	 */
	public $trueValue = 'Yes';
	/**
	 * @var string the false value to format to.
	 */
	public $falseValue = 'No';

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	public function formatAttribute($object, $attribute)
	{
		return $object->$attribute === '1' ? $this->trueValue : $this->falseValue;
	}
}