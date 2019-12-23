<?php

namespace yii2cmf\modules\admin;

use yii\base\Theme;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'yii2cmf\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->initTheme();
    }

    private function initTheme(): void
    {
        \Yii::$app->view->theme = new Theme([
            //'pathMap' => ['@app/views' => '@app/modules/admin/themes/adminlte'],
            'pathMap' => ['@app/views' => '@yii2cmf/templates/adminlte/views/adminlte'],
            'baseUrl' => '@web/modules/admin/themes/adminlte'
        ]);
    }
}
