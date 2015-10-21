<?php

namespace backend\modules\rooms\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Rooms;
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
        $query = Rooms::find()->where(['parent_id' => 0])->orderBy(['pos' => SORT_ASC]);
        return $this->render('index', [
            'dataProvider' => $this->findData($query)
        ]);
    }

    /**
     * @return string
     */
    public function actionAdd()
    {
        $this->loadData($model = new Rooms());
        return $this->render('form', [
            'model' => new Rooms()
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = Rooms::findOne(['id' => $id]);
        $this->loadData($model);
        return $this->render('form', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        Rooms::findOne(['id' => $id])->delete();
        return $this->redirect(Url::previous());
    }

    public function actionUpdatePos()
    {
        foreach(Yii::$app->request->post('data') as $key => $value){
            $gallery = Rooms::findOne(['id' => $value]);
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
            'dataProvider' => $this->findData(Rooms::find()->where(['parent_id' => $id])->orderBy(['pos' => SORT_ASC])),
            'parent_id' => $id
        ]);
    }
}
