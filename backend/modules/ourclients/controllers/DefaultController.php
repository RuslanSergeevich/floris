<?php

namespace backend\modules\ourclients\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Ourclients;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DefaultController extends SiteController
{
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
                    'delete' => ['post']
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Ourclients::find();
        return $this->render('index', [
            'dataProvider' => $this->findData($query)
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $this->loadData($model = new Ourclients());
        return $this->render('form', [
            'model' => new Ourclients()
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        if(!$model = Ourclients::findOne(['id' => $id])){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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
        Ourclients::findOne(['id' => $id])->delete();
        return $this->redirect(Yii::$app->homeUrl.$this->module->id);
    }
}
