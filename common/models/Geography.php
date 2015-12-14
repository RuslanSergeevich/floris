<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "geography".
 *
 * @property integer $id
 * @property string $country
 * @property string $city
 * @property string $address
 * @property string $mode
 * @property string $shop_name
 * @property string $fio
 * @property string $phone
 * @property string $email
 * @property integer $publish
 * @property integer $created_at
 * @property integer $updated_at
 */
class Geography extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;

    public $files;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geography';
    }

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
    public function rules()
    {
        return [
            [['country', 'city', 'address', 'shop_name'], 'required'],
            [['country', 'city', 'address', 'mode', 'shop_name', 'fio'], 'string'],
            [['created_at', 'publish', 'updated_at'], 'integer'],
            [['phone', 'email'], 'string', 'max' => 255],
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Страна',
            'city' => 'Город',
            'address' => 'Адрес',
            'mode' => 'Режим работы',
            'shop_name' => 'Название магазина',
            'fio' => 'ФИО',
            'phone' => 'Номер телефона',
            'email' => 'Электронный адрес',
            'publish' => 'Публикация',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлён',
        ];
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->asArray()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeographyImages()
    {
        return $this->hasMany(GeographyImages::className(), ['geography_id' => 'id']);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getDataJSON()
    {
        return self::find()->select(['id','country','city','address','mode','shop_name','phone'])
                           ->where(['publish' => self::PUBLISH])
                           ->with('geographyImages')
                           ->asArray()
                           ->all();
    }
}
