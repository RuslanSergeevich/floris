<?php
namespace common\models;

use common\models\Pages;
use common\models\CatalogItems;
use common\models\Catalog;
use yii\db\Query;
use Yii;
/**
 * Created by PhpStorm.
 * User: stark
 * Date: 09.11.16
 * Time: 19:58
 */


class BottomMenu {

    public static function getBottomMenu()
    {
        $connection = Yii::$app->getDb();
        /*TODO Костыль, убрать type */
        $q = $connection->createCommand('select bottom_menu_name, alias, bottom_menu_sort from pages where bottom_menu_show =  1 union select bottom_menu_name, concat_ws("","cataloge/",alias), bottom_menu_sort from catalog where bottom_menu_show =  1 union select bottom_menu_name, concat_ws("","product/",alias), bottom_menu_sort from catalog_items where bottom_menu_show =  1 order by bottom_menu_sort ASC');
        $result = $q->queryAll();
        return $result;
    }

}