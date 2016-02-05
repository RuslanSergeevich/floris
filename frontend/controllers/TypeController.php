<?php

namespace frontend\controllers;

use Yii;
use common\models\Types;

/**
 * Class TypeController
 * @package frontend\controllers
 */
class TypeController extends SiteController
{
    /**
     * @param $alias
     * @return string
     */
    public function actionView($alias)
    {
        $model = Types::find()->where(['alias' => $alias])->one();
        return $this->render('single_view', [
            'model' => $model,
        ]);
    }

}
