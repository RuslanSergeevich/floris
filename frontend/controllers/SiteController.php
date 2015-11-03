<?php
namespace frontend\controllers;

use frontend\models\BackCallForm;
use frontend\models\CooperationForm;
use Yii;
use yii\web\Controller;
use common\models\Pages;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{

    const ROOT_PATH = 'index';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->_queryOrException(Pages::findOne(['alias' => self::ROOT_PATH, 'publish' => Pages::PUBLISH]))
        ]);
    }

    public function actionPage($alias)
    {
        $model = $this->_queryOrException(Pages::findOne(['alias' => $alias, 'publish' => Pages::PUBLISH]));
        return $this->render($model['template'], [
            'model' => $model
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionSend()
    {
        $model = new CooperationForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmail(Yii::$app->params['adminEmail']);
            Yii::$app->session->setFlash('message', 'Спасибо');
        } else {
            Yii::$app->session->setFlash('message', 'Error!');
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionBackcall()
    {
        $model = new BackCallForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmail(Yii::$app->params['adminEmail']);
            Yii::$app->session->setFlash('message', 'Спасибо! МЫ с Вами свяжемся в ближайшее время!');
        } else {
            Yii::$app->session->setFlash('message', 'Error!');
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    private function _queryOrException($model)
    {
        if(!$model){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}