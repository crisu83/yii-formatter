yii-formatter
=============

A collection of formatters for the Yii PHP framework.

## Setup

In order to start using the formatters you need to configure it for your application.

```php
'components' => array(
    'format' => array(
        'class' => 'path.to.Formatter',
        'formatters' => array(), // global formatter configurations (name=>config)
    ),
),
```

## Usage

Once you have configured the formatted you can use it by calling the format component.

```php
Yii::app()->format->boolean($published);
Yii::app()->format->currency($price, array('currency' => 'EUR'));
Yii::app()->format->dateTime($updatedAt, array('dateWidth' => 'short', 'timeWidth' => 'short');
Yii::app()->format->runFormatter('path.to.MyFormatter', 'foo');
Yii::app()->format->inline(array($this, 'myFormattingMethod'), 'bar');
```

### Formatting model attributes

To allow for formatting model attributes easily you can attach the formatter behavior to your model.

```php
function behaviors() {
  return array(
    'formatter' => array(
      'class' => 'path.to.FormatterBehavior',
      'formatters' => array(), // component formatter configurations (name=>config)
    ),
  );
}
```

When the behavior is attached you can call it to format any attribute value using a formatter.

```php
$model->formatAttribute('boolean', 'published');
$model->formatAttribute('currency', 'price', array('price' => 'EUR'));
$model->formatAttribute('dateTime', 'updatedAt', array('dateWidth' => 'short', 'timeWidth' => 'short'));
$model->formatAttribute('path.to.MyFormatter', 'foo');
$model->formatAttribute('myFormattingMethod', 'bar');
```

You can also write your own formatters or use inline methods for formatting attribute values if necessary.