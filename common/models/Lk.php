<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "subscribers".
 *
 * @property integer $id
 * @property string $email
 * @property integer $publish
 * @property integer $created_at
 * @property integer $updated_at
 */
class Lk extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'phone'], 'required'], 
            [['publish', 'created_at', 'updated_at'], 'integer'],
            [['email', 'active_alias'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'E-mail',
            'phone' => 'Номер телефона',
            'publish' => 'Активирована?',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param $status
     * @return mixed
     */
    public static function getStatusesIcon($status)
    {
        $statuses = [
            self::UNPUBLISHED => '<i class="fa fa-fw fa-close"></i>',
            self::PUBLISH => '<i class="fa fa-fw fa-check"></i>'
        ];
        return $statuses[$status];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList()
    {
        return self::find()->where(['publish' => self::PUBLISH])->asArray()->all();
    }

    public static function addUserLk($email, $phone, $url){

        $is_new = false;
        $model = self::findUserByEmail($email);
        if(!$model){
            $is_new = true;
            $model = new self;
        }
        $model->email = $email;
        $model->phone = $phone;
        $model->publish = 1;
        $token = self::generateToken();
        $model->active_alias = $token;
        if($model->save()){
            $from = "Floris | Крымский чай и сладости floristea.com <info@floristea.com>";
            $to = $_POST['email'];
            $subject = 'Подтвердите свой e-mail на сайте floristea.com';
            $html = '';
            $html .= '<tr>Здравствуйте!<br/><br/></tr>';
            $html .= '<tr>Вы ввели свои данные на сайте <a href="//floristea.com">floristea.com</a><br/><br/></tr>';
            $html .= '<tr>Для получения доступа к оптовым ценам подтвердите свой адрес электронной почты, 
                          перейдя по ссылке <a href="'.Yii::$app->request->serverName.'/user-token-login?token='.$token.'&url='.$url.'" style="color:red">'.Yii::$app->request->serverName.'/user-token-login?token='.$token.'&url='.$url.'</a><br/><br/></tr>';
            $html .= '<tr>Если вы не совершали никаких действий на сайте просто проигнорируйте это письмо.<br/><br/></tr>';
            $html .= '<tr>Всегда рады ответить на ваши вопросы<br/><br/></tr>';
            $html .= '<tr><a href="tel:+73652583577">+73652583577</a> Команда Флорис.<br/><br/></tr>';
            $headers  = "Content-type: text/html; charset=utf-8 \r\n";
            $headers .= 'From: '.$from."\r\n"; 
            mail($to, $subject, $html, $headers);
        }
        return $is_new;
    }

    private static function generateToken($length = 15){
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    public static function findUserByEmail($email){
        $model = self::find()->where(['email' => $email])->one();
        return $model;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    /*public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$email => $this->email])
            ->setSubject('Подписка на рассылку!')
            ->setHtmlBody('Пользователь с E-mail: '.$this->email .' подписался на рассылку новостей.' )
            ->send();
    }*/
}
