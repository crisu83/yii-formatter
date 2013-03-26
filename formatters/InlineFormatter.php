<?php
/**
 * InlineFormatter class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package crisu83.yii-formatter.formatters
 */

class InlineFormatter extends Formatter
{
	/**
	 * @var string the name of the format method.
	 */
	public $formatMethod;
	/**
	 * @var string the name of the unformat method.
	 */
	public $unformatMethod;
	/**
	 * @var array additional parameters for the formatter.
	 */
	public $params;

	/**
	 * Formats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 */
	protected function formatAttribute($object, $attribute)
	{
		$method = $this->formatMethod;
		$object->$method($attribute, $this->params);
	}

	/**
	 * Unformats the given attribute.
	 * @param CModel $object the model.
	 * @param string $attribute the name of the attribute.
	 */
	protected function unformatAttribute($object, $attribute)
	{
		$method = $this->unformatMethod;
		$object->$method($attribute, $this->params);
	}
}