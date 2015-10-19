<?php

namespace backend\modules\catalog\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Catalog;
use common\models\CatalogItems;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\helpers\Url;
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
                        'actions' => ['index', 'add', 'update', 'delete', 'items', 'item-add', 'item-update', 'item-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'tem-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Catalog::find();
        Url::remember();
        return $this->render('index', [
            'dataProvider' => $this->_findData($query)
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $this->_loadData($model = new Catalog());
        return $this->render('form', [
            'model' => new Catalog()
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = Catalog::findOne(['id' => $id]);
        $this->_loadData($model);
        return $this->render('form', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        CatalogItems::deleteAll(['parent_id' => $id]);
        Catalog::findOne(['id' => $id])->delete();
        return $this->redirect(Url::previous());
    }

    /*
     |-----------------------------------------------------------
     |   ITEMS_BY_CATALOG
     |-----------------------------------------------------------
     */

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionItems($id)
    {
        $query = CatalogItems::find()->where(['parent_id' => $id]);
        Url::remember();
        return $this->render('index_items', [
            'dataProvider' => $this->_findData($query)
        ]);
    }

    /**
     * @return string
     */
    public function actionItemAdd()
    {
        $this->_loadData($model = new CatalogItems());
        return $this->render('form_items', [
            'model' => new CatalogItems()
        ]);
    }

    public function actionItemUpdate($id)
    {
        $model = CatalogItems::findOne(['id' => $id]);
        $this->_loadData($model);
        return $this->render('form_items', ['model' => $model]);
    }

    public function actionItemDelete($id)
    {
        CatalogItems::findOne(['id' => $id])->delete();
        return $this->redirect(Url::previous());
    }

    /*
     |-----------------------------------------------------------
     |   PRIVATE_FUNCTIONS
     |-----------------------------------------------------------
     */

    /**
     * @param $query
     * @return ActiveDataProvider
     * @throws NotFoundHttpException
     */
    private function _findData($query)
    {
        $model = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
            'pagination' => new Pagination([
                'pageSize' => self::PAGE_SIZE,
                'forcePageParam' => false,
                'pageSizeParam' => false
            ])
        ]);

        if(!$model){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $model;
    }

    /**
     * @param $model
     * @return \yii\web\Response
     */
    private function _loadData($model)
    {
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return (isset($model->parent_id) && $model->parent_id)
            ? $this->redirect(Yii::$app->homeUrl.$this->module->id .'/items/'.$model->parent_id)
            : $this->redirect(Yii::$app->homeUrl.$this->module->id);
        }
    }
}