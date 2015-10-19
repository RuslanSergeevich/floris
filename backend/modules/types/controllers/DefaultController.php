<?php

namespace backend\modules\types\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Types;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $query = Types::find();
        return $this->render('index', [
            'dataProvider' => $this->_findData($query)
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $this->_loadData($model = new Types());
        return $this->render('form', [
            'model' => new Types()
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        if(!$model = Types::findOne(['id' => $id])){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $this->_loadData($model);
        return $this->render('form', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        Types::findOne(['id' => $id])->delete();
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

    /**
     * @param $model
     * @return \yii\web\Response
     */
    private function _loadData($model)
    {
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(Yii::$app->homeUrl.$this->module->id);
        }
    }
}
