<?php

namespace common\models;

use Yii;

class OrderSend extends \yii\db\ActiveRecord
{
    const SUBJECT = 'Оформление заявки';
    /**
     * @return bool
     */
    public function send()
    {
        return Yii::$app->mailer->compose('order', ['model' => Yii::$app->request->post()])
            ->setFrom([Yii::$app->request->post('email') => Yii::$app->request->post('name')])
            ->setTo(User::getEmail())
            ->setSubject(self::SUBJECT)
            ->send();
    }

}
