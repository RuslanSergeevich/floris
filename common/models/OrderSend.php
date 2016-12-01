<?php

namespace common\models;

use Yii;

class OrderSend extends \yii\db\ActiveRecord
{
    const SUBJECT = 'Оформление заявки';

    public $email;
    public $name;
    public $comment;
    public $phone;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['email', 'name', 'phone', 'comment'], 'string'],
            [['email'], 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'name' => 'Имя'
        ];
    }


    /**
     * @return bool
     */
    public function send()
    {

        Yii::$app->mailer->compose('order', ['model' => Yii::$app->request->post()])
            ->setTo('vregis@mail.ru')
            ->setFrom([$this->email => $this->name])
            ->setSubject(self::SUBJECT)
            ->send();
    }

}
