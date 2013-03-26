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
	 * @var string the true value to format from.
	 */
	public $trueFromValue = '1';
	/**
	 * @var string the true value to format to.
	 */
	public $trueToValue = 'yes';
	/**
	 * @var string the false value to format from.
	 */
	public $falseFromValue = '0';
	/**
	 * @var string the false value to format to.
	 */
	public $falseToValue = 'no';

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	protected function formatAttribute($object, $attribute)
	{
		$object->$attribute = ($object->$attribute === $this->trueFromValue ? $this->trueToValue : $this->falseToValue);
	}

	/**
	 * Unformats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the unformatted value.
	 */
	protected function unformatAttribute($object, $attribute)
	{
		$object->$attribute = ($object->$attribute === $this->trueToValue) ? $this->trueFromValue : $this->falseFromValue;
	}
}