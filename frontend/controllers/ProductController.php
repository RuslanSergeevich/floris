<?php

namespace frontend\controllers;

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
        return $this->render('single_view', [
            'model' => $model
        ]);
    }

}
