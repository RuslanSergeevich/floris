<?php

namespace common\models;

use Yii;

class OrderSend extends \yii\db\ActiveRecord
{
    const SUBJECT = 'Оформление заявки';
    const FROM = 'info@floristea.com';
    /**
     * @return bool
     */
    public function send()
    {
        return Yii::$app->mailer->compose('order', ['model' => Yii::$app->request->post()])
            ->setFrom(self::FROM)
            ->setTo('djShtaket88@mail.ru')
            ->setSubject(self::SUBJECT)
            ->send();
    }

}
