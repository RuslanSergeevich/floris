<?php

namespace backend\modules\prices\controllers;

use common\models\PricesValues;
use Yii;
use yii\filters\AccessControl;
use backend\controllers\SiteController;
use common\models\Prices;
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
        $query = Prices::find();
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
        $this->loadData($model = new Prices());
        return $this->render('form', [
            'model' => new Prices()
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = Prices::findOne(['id' => $id]);
        $this->loadData($model);
        if(Yii::$app->request->post('Products'))
            $this->_saveProducts(Yii::$app->request->post('Products'), $id);
        return $this->render('form', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        PricesValues::deleteAll(['price_id' => $id]);
        Prices::findOne(['id' => $id])->delete();
        return $this->redirect(Url::previous());
    }

    /**
     * @param $data
     * @param $id
     */
    private function _saveProducts($data, $id)
    {
        foreach($data as $key => $value){
            if(!$product = PricesValues::findOne(['price_id' => $id, 'product_id' => $key]))
                $product = new PricesValues();
            $product->price_id = $id;
            $product->price_value = $value;
            $product->product_id = $key;
            $product->save();
        }
    }
}
