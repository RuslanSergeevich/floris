<?php

namespace common\models;

use Yii;

class OrderSend extends \yii\db\ActiveRecord
{
    const SUBJECT = 'Оформление заявки';

    public $email;
    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'name'], 'required'],
            [['email', 'name'], 'string'],
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
        return Yii::$app->mailer->compose('order', ['model' => Yii::$app->request->post()])
            ->setFrom([$this->email => $this->name])
            ->setTo(Yii::$app->request->post('email_to'))
            ->setSubject(self::SUBJECT)
            ->send();
    }

}
