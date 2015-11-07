<?php

namespace backend\modules\geography\controllers;

use common\models\GeographyImages;
use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Geography;
use yii\helpers\Url;
use yii\filters\VerbFilter;

class DefaultController extends SiteController
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'update', 'delete', 'delete-img'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'delete-img' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Geography::find();
        Url::remember();
        return $this->render('index', [
            'dataProvider' => $this->findData($query)
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = Geography::findOne(['id' => $id]);
        $this->loadData($model);
        return $this->render('form', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        GeographyImages::deleteAll(['geography_id' => $id]);
        Geography::findOne(['id' => $id])->delete();
        return $this->redirect(Url::previous());
    }

    /**
     * @param $id
     * @return false|int
     * @throws \Exception
     */
    public function actionDeleteImg($id)
    {
        return GeographyImages::findOne(['id' => $id])->delete();
    }
}
