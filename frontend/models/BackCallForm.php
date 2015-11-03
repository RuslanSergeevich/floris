<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * BackCallForm is the model behind the contact form.
 */
class BackCallForm extends Model
{
    public $name;
    public $phone;
    public $subject = 'Форма заказа обратного звонка';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            ['phone', 'safe'],
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$email => $this->name])
            ->setSubject($this->subject)
            ->setHtmlBody($this->phone)
            ->send();
    }
}
