<?php

namespace backend\modules\catalog\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Catalog;
use common\models\CatalogItems;
use yii\helpers\Url;
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
                    'item-delete' => ['post'],
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
            'dataProvider' => $this->findData($query)
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $this->loadData($model = new Catalog());
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
        $this->loadData($model);
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
            'dataProvider' => $this->findData($query)
        ]);
    }

    /**
     * @return string
     */
    public function actionItemAdd()
    {
        $this->loadData($model = new CatalogItems());
        return $this->render('form_items', [
            'model' => new CatalogItems()
        ]);
    }

    public function actionItemUpdate($id)
    {
        $model = CatalogItems::findOne(['id' => $id]);
        $this->loadData($model);
        return $this->render('form_items', ['model' => $model]);
    }

    public function actionItemDelete($id)
    {
        CatalogItems::findOne(['id' => $id])->delete();
        return $this->redirect(Url::previous());
    }
}