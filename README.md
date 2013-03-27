yii-formatter
=============

A collection of formatters for the Yii PHP framework.

## Usage

In order to use the formatters you need to attach the formatter behavior to your model.

```php
function behaviors() {
  return array(
    'formatter' => array(
      'class' => 'path.to.FormatterBehavior',
      'formatters' => array(), // default formatter configurations (name=>config)
    ),
  );
}
```

When the behavior is attached you can call it to format any attribute value using a built in formatter or if necessary your own.

```php
$model->formatAttribute('boolean', 'published');
$model->formatAttribute('currency', 'price', 'EUR');
$model->formatAttribute('dateTime', 'updatedAt', array('dateWidth' => 'short', 'timeWidth' => 'short'));
```
