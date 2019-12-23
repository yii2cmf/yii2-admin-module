Yii2 admin module
=================
. 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yii2cmf/yii2-admin-module "*"
```

or add

```
"yii2cmf/yii2-admin-module": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
use yii2cmf\templates\admin;

AdminLTEAsset::register($this);
```