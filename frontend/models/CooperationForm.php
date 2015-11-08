<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * CooperationForm is the model behind the contact form.
 */
class CooperationForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'body'], 'required'],
            ['email', 'email'],
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
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->phone . $this->body)
            ->send();
    }
}
