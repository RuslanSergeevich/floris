<?php

namespace backend\modules\geography\controllers;

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
                        'actions' => ['index', 'add', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
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
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $this->loadData($model = new Geography());
        return $this->render('form', [
            'model' => new Geography()
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
        Geography::findOne(['id' => $id])->delete();
        return $this->redirect(Url::previous());
    }
}
