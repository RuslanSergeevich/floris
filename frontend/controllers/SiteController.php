<?php
namespace frontend\controllers;

use common\models\Catalog;
use common\models\CatalogItems;
use common\models\GalleryImages;
use common\models\Geography;
use common\models\GeographyImages;
use common\models\Lk;
use common\models\Orders;
use common\models\OrderSend;
use common\models\Subscribers;
use frontend\models\BackCallForm;
use frontend\models\SearchModel;
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
                    'geocode-tool'  => ['post'],
                    'subscribe'     => ['post'],
                    'send-order'    => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
            $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
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

        $catalogs = CatalogItems::getHits();
        $slider = GalleryImages::getSlider();
        $items = Catalog::getOurProducts();
        return $this->render('index', [
            'model' => $this->_queryOrException(Pages::findOne(['alias' => self::ROOT_PATH, 'publish' => Pages::PUBLISH])),
            'catalogs' => $catalogs,
            'slider' => $slider,
            'items' => $items
        ]);
    }

    public function actionPage($alias)
    {
        $model = $this->_queryOrException(Pages::findOne(['alias' => $alias, 'publish' => Pages::PUBLISH]));
        if($model['template'] == 'get_price'){
             return $this->render($model['template'], [
             'model' => $model,
             $this->layout = 'price'
        ]);
        }else{
                 return $this->render($model['template'], [
            'model' => $model
        ]);   
        }

    }

    public function actionSubscribe()
    {
        $model = new Subscribers();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmail(Yii::$app->params['adminEmail']);
            Yii::$app->session->setFlash('message', 'Подписка офрилена!');
            $model->save();
        } else {
            Yii::$app->session->setFlash('message', 'Error!');
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionSend()
    {
        $model = new Orders();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmail(Yii::$app->params['adminEmail']);
            $model->status = 0;
            $model->save();
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

    public function actionSearch($alias = 'search')
    {
        $searchModel = new SearchModel();
        if(Yii::$app->request->isPost){
            $dataProvider = $searchModel->search(Yii::$app->request->post());
        }
        $model = $this->_queryOrException(Pages::findOne(['alias' => $alias, 'publish' => Pages::PUBLISH]));
        return $this->render($model['template'], [
            'model' => $model,
            'data'  => isset($dataProvider) ? $dataProvider : false
        ]);
    }

    /**
     * @return bool
     */
    public function actionSendOrder()
    {
        $model = new OrderSend();
        $model->name  = Yii::$app->request->post('name');
        $model->email = Yii::$app->request->post('email');
        $model->phone = Yii::$app->request->post('phone');
        if($model->validate()){
            return $model->send();
        }
        return false;
    }

    public function actionAddUserLk(){
        $response['is_new'] = Lk::addUserLk($_POST['email'], isset($_POST['phone'])?$_POST['phone']:'', $_POST['url']);
        return json_encode($response);
    }

    public function actionUserTokenLogin(){
        if($_GET['token']){
            $model = new Lk();
            $user = $model->find()->where(['active_alias' => $_GET['token']])->one();
            if($user){
                $session = Yii::$app->session;
                $session->set('id', $user->id);
                if($_GET['url']){
                    header('Location: '.$_GET["url"].'');
                    die();
                }
                header('Location: /price');
                die();
            }else{
                die('Токена не существует'); // TODO Продумать красивые обработчики
            }
        }else{
            die('Токена не существует'); // TODO Продумать красивые обработчики
        }
    }

    public function actionUserLogout(){
        $session = Yii::$app->session;
        $session->remove('id');
    }

    private function _queryOrException($model)
    {
        if(!$model){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}