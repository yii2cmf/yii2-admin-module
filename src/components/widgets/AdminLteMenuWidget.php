<?php
namespace yii2cmf\modules\admin\components\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class AdminLteMenuWidget extends Widget
{
    public $items;

    public function run()
    {
        parent::run();
        return $this->getMenu();
    }

    protected function getMenu()
    {
        $menu = Html::beginTag('ul', ['class' => 'nav nav-pills nav-sidebar flex-column', 'data-widget' => 'treeview', 'role' => 'menu', 'data-accordion' => 'false']);
        foreach ($this->getItems() as $key => $menuItem) {
            self::getListItem($menu, $menuItem, true);
        }
        $menu .= Html::endTag('ul');
        return $menu;
    }

    protected static function getListItem(&$menu, &$menuItem)
    {
        if (!empty($menuItem['header'])) {
            $menu .= Html::tag('li', $menuItem['header'], ['class' => 'nav-header']);
        }

        if (!empty($menuItem['label'])) {
            $menu .= Html::beginTag('li', ['class' => self::getListItemClass($menuItem)]); //nav-item has-treeview
            $menu .= Html::beginTag('a', ['class' => self::getLinkClass($menuItem), 'href' => Url::toRoute($menuItem['url'])]);
            $menu .= Html::tag('i', '', ['class' => !empty($menuItem['icon']) ? $menuItem['icon'] :'nav-icon far fa-circle']);
            $menu .= Html::beginTag('p');
            $menu .= $menuItem['label'];
            self::getListItemEndIcon($menu, $menuItem);
            $menu .= Html::endTag('p');
            $menu .= Html::endTag('a');
            self::getUnsortedList($menu, $menuItem);
            $menu .= Html::endTag('li');
        }

    }

    protected static function getUnsortedList(&$menu, array $menuItem)
    {
        if (array_key_exists('items', $menuItem)) {
            $menu .= Html::beginTag('ul', ['class' => 'nav nav-treeview']);
            foreach ($menuItem['items'] as $item) {
                self::getListItem($menu, $item);
            }
            $menu .= Html::endTag('ul');
        }
    }

    protected static function getListItemEndIcon(&$menu, $menuItem)
    {
        if (array_key_exists('items', $menuItem)) {
            $menu .= Html::tag('i', '', ['class' => 'right fas fa-angle-left']);
        }
    }

    /**
     * @return array
     */
    protected function getItems()
    {
        $moduleItems = [];
        foreach (Yii::$app->getModules() as $id => $module) {
            if (is_array($module) && array_key_exists('class',$module)) {
                $module = Yii::$app->getModule($id);
            }
            if (is_object($module) && method_exists($module, 'getMenu')) {
                $moduleItems[] = $module->getMenu();
            }
        }
        return isset($this->items) ? array_merge($this->items, $moduleItems) : $moduleItems;
    }

    protected static function getLinkClass(array $menuItem):string
    {
        return !empty($menuItem['active']) && $menuItem['active'] ? 'nav-link active ' : 'nav-link';//'nav-link';
    }

    protected static function getListItemClass(array $menuItem)
    {
        return !empty($menuItem['active']) ? 'nav-item has-treeview menu-open' : 'nav-item has-treeview';
    }

    protected static function dump($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';die;
    }
}