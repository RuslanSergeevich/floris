<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Pages;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        if(!$model = Pages::findOne(['alias' => 'index', 'publish' => Pages::PUBLISH])){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $this->render('index', [
            'model' => $model
        ]);
    }

}