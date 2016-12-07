<?php

namespace frontend\controllers;

use common\models\Catalog;
use common\models\ViewPrice;
use Yii;
use common\models\CatalogItems;

/**
 * Class ProductController
 * @package frontend\controllers
 */
class ProductController extends SiteController
{
    /**
     * @param $alias
     * @return string
     */
    public function actionView($alias)
    {
        $model = CatalogItems::find()->where(['alias' => $alias])->with([
            'galleryImages' => function($query){
                $query->andWhere(['<>', 'main', CatalogItems::MAIN_IMAGE]);
            }
        ])->one();
        $price = new ViewPrice($model->id);
        $this->view->params['bread_type'] = 'product';
        $this->view->params['name'] = $model->name;
        $this->view->params['parent'] = Catalog::find()->where(['id' => $model->parent_id])->one();
        return $this->render('single_view', [
            'model' => $model,
            'price' => $price
        ]);
    }

}
