<?php
namespace frontend\controllers;

use common\models\Geography;
use common\models\GeographyImages;
use frontend\models\BackCallForm;
use frontend\models\CooperationForm;
use Yii;
use yii\web\Controller;
use common\models\Pages;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{

    const ROOT_PATH = 'index';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'geocode-tool' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'geocode-tool' => [
                'class' => 'frontend\components\YandexMapApi',
            ]
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
        $to  = "djShtaket88@mail.ru";
        $subject = "Новое сообщение с формы обратной связи";
        $message = '<html>
                          <head>
                              <title>Новое сообщение</title>
                          </head>
                          <body>
                              <p>E-Mail: ыыыыыыыыыыыыыы</p>
                              <p>Сообщение: цццццццццццццц</p>
                          </body>
                      </html>';

        $headers  = "Content-type: text/html; charset=utf8 \r\n";
        $headers .= "From: zolotiepeski.com\r\n";

        mail($to, $subject, $message, $headers);
        exit;
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

    /**
     * @return \yii\web\Response
     */
    public function actionShopadd()
    {
        $model = new Geography();
        $modelImages = new GeographyImages();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            $modelImages->files = UploadedFile::getInstances($modelImages, 'files');
            $modelImages->upload($model->id);
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