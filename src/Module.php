<?php

namespace yii2cmf\modules\admin;

use Yii;
use yii\base\Theme;
use yii\base\Application;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{

    /**
     * @var $themeName string
     */
    public $themeName;

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'yii2cmf\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init():void
    {
        parent::init();
        \Yii::configure($this, require __DIR__ . '/config/components.php');
        \Yii::configure($this, require __DIR__ . '/config/params.php');
        $this->initTheme();
        $this->registerExternalModules();
        $this->registerTranslations();
    }

    private function initTheme(): void
    {
        Yii::$app->view->theme = new Theme([
            //'pathMap' => ['@app/views' => '@yii2cmf/templates/adminlte/views'],
            'pathMap' => ['@app/views' => '@yii2cmf/modules/admin/views/'.$this->themeName],
            'baseUrl' => '@web/modules/admin/views/adminlte/'.$this->themeName
        ]);
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/'.$this->id.'/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => __DIR__.'/messages',
            'fileMap' => [
                'modules/'.$this->id.'/common' => 'common.php',
                'modules/'.$this->id.'/info' => 'info.php',
                'modules/'.$this->id.'/error' => 'error.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/'.self::getModuleName().'/' . $category, $message, $params, $language);
    }

    public static function c($message, $params = [], $language = null)
    {
        return Yii::t('modules/'.self::getModuleName().'/common', $message, $params, $language);
    }

    public static function i($message, $params = [], $language = null)
    {
        return Yii::t('modules/'.self::getModuleName().'/info', $message, $params, $language);
    }

    public function getViewPath()
    {
        return \Yii::getAlias('@yii2cmf/modules/admin/views/'.$this->themeName);
    }

    private static function getModuleName()
    {
        return substr(__NAMESPACE__, strrpos(__NAMESPACE__, '\\')+1);
    }

    private function registerExternalModules():void
    {
        $modules = Yii::$app->getModules();
        $this->setModules($modules);
    }
}
