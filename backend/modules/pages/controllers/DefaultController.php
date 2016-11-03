<?php

namespace backend\modules\pages\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Pages;
use yii\helpers\Url;
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
                        'actions' => ['index', 'add', 'update', 'delete', 'update-pos', 'childs'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'update-pos' => ['post'],
                    'childs' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Pages::find()->where(['parent_id' => 0])->orderBy(['pos' => SORT_ASC]);
        Url::remember();
        return $this->render('index', [
            'dataProvider' => $this->findData($query)
        ]);
    }

    /**
     * @return string
     */
    public function actionAdd()
    {
        $this->loadData($model = new Pages());
        return $this->render('form', [
            'model' => new Pages()
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = Pages::findOne(['id' => $id]);
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
        Pages::findOne(['id' => $id])->delete();
        return $this->redirect(Url::previous());
    }

    public function actionUpdatePos()
    {
        foreach(Yii::$app->request->post('data') as $key => $value){
            $gallery = Pages::findOne(['id' => $value]);
            $gallery->pos = $key;
            $gallery->update();
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function actionChilds($id)
    {
        return $this->renderAjax('_pages_childs', [
            'dataProvider' => $this->findData(Pages::find()->where(['parent_id' => $id])->orderBy(['pos' => SORT_ASC])),
            'parent_id' => $id
        ]);
    }
}
