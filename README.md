Yii2 admin module
=================
. 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require yii2cmf/yii2-admin-module "*"
```

or add

```
"yii2cmf/yii2-admin-module": "*"
```

to the require section of your `composer.json` file.


Usage
-----

You need to add the following code to your application configuration:

```php
'modules' => [
    'admin' => [
        'class' => 'yii2cmf\modules\admin\Module',
    ],
]
```