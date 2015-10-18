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

    const ROOT_PATH = 'index';

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
        return $this->render('index', [
            'model' => $this->_queryOrException(Pages::findOne(['alias' => self::ROOT_PATH, 'publish' => Pages::PUBLISH]))
        ]);
    }

    public function actionPage($alias)
    {
        $model = $this->_queryOrException(Pages::findOne(['alias' => $alias, 'publish' => Pages::PUBLISH]));
        return $this->render($model['template'], [
            'model' => $model
        ]);
    }

    private function _queryOrException($model)
    {
        if(!$model){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }

}