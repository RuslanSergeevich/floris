<?php

namespace frontend\controllers;

use Yii;
use common\models\Catalog;

/**
 * Class ProductController
 * @package frontend\controllers
 */
class CatalogController extends SiteController
{
    /**
     * @param $alias
     * @return string
     */
    public function actionView($alias)
    {
        $model = Catalog::find()->where(['alias' => $alias])->one();
        return $this->render('single_view', [
            'model' => $model,
        ]);
    }

}
