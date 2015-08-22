<?php

namespace backend\modules\pages\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Pages;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class DefaultController extends SiteController
{

    const PAGE_SIZE = 25;

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
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Pages::find()->where(['parent_id' => 0])->orderBy(['pos' => SORT_ASC]);
        return $this->render('index', [
            'dataProvider' => $this->_findData($query)
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new Pages();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->save();
            return $this->redirect(Yii::$app->homeUrl.$this->module->id);
        }
        return $this->render('form', [
            'model' => new Pages()
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        if(!$model = Pages::findOne(['id' => $id])){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->save();
            return $this->redirect(Yii::$app->homeUrl.$this->module->id);
        }
        return $this->render('form', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        if(!$model = Pages::findOne(['id' => $id])){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $model->delete();
        return $this->redirect(Yii::$app->homeUrl.$this->module->id);
    }

    /**
     * @param $query
     * @return ActiveDataProvider
     */
    private function _findData($query)
    {
        return new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
            'pagination' => new Pagination([
                'pageSize' => self::PAGE_SIZE,
                'forcePageParam' => false,
                'pageSizeParam' => false
            ])
        ]);
    }
}
