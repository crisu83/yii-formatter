<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Christoffer
 * Date: 26.3.2013
 * Time: 22:43
 * To change this template use File | Settings | File Templates.
 */

class BooleanFormatter extends Formatter
{
	public $trueValue = 'yes';
	public $falseValue = 'no';

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the formatted value.
	 */
	public function formatAttribute($object, $attribute)
	{
		return (int)$object->$attribute === 1 ? $this->trueValue : $this->falseValue;
	}

	/**
	 * Unformats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 * @return string the unformatted value.
	 */
	public function unformatAttribute($object, $attribute)
	{
		return $object->$attribute === $this->trueValue ? 1 : 0;
	}
}