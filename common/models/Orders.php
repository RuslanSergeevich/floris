<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $message
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Orders extends \yii\db\ActiveRecord
{
    const ACTIVE = 1;
    const DISABLE = 0;
    const LIMIT = 7;
    const THEME = 'Заявка на сотрудничество';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

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
    public function rules()
    {
        return [
            [['phone', 'status', 'created_at', 'updated_at'], 'integer'],
            [['message', 'name'], 'string'],
            [['email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Номер телефона',
            'message' => 'Тема сотрудничества',
            'status' => 'Обработана?',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param $status
     * @return mixed
     */
    public static function getStatuses($status)
    {
        $statuses = [
            self::ACTIVE => 'Обработана',
            self::DISABLE => 'Новая'
        ];
        return $statuses[$status];
    }

    /**
     * @param $id
     * @return string
     */
    public static function getRoomName($id)
    {
        $model = Rooms::findOne(['id' => $id]);
        return isset($model) ? $model->name : 'Не найдена запись с id #'.$id;
    }

    /**
     * @return int|string
     */
    public static function getNewOrders()
    {
        return self::find()->where(['status' => self::DISABLE])->count();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getNewOrdersList()
    {
        return static::find()->where(['status' => self::DISABLE])->limit(self::LIMIT)->asArray()->all();
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
            ->setSubject(self::THEME)
            ->setTextBody($this->phone . $this->message)
            ->send();
    }
}
