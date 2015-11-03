<?php

namespace frontend\controllers;

use Yii;
use common\models\Blog;

/**
 * Class BlogController
 * @package frontend\controllers
 */
class BlogController extends SiteController
{
    /**
     * @param $alias
     * @return string
     */
    public function actionView($alias)
    {
        $model = Blog::findOne(['alias' => $alias]);
        return $this->render('single_view', [
            'model' => $model,
        ]);
    }

}
