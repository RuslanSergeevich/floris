<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "packing".
 *
 * @property integer $id
 * @property string $name
 * @property string $declination
 * @property integer $publish
 * @property integer $pos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Packing extends \yii\db\ActiveRecord
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
        return 'packing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['publish', 'pos', 'created_at', 'updated_at'], 'integer'],
            [['name','declination'], 'string', 'max' => 255],
            ['pos', 'default', 'value' => 0]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'declination' => 'Склонение',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлена',
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
     * @param $id
     * @return string
     */
    public static function getValueById($id)
    {
        $dn = self::findOne(['id' => $id]);
        return $dn->declination;
    }


    /**
     * @return array
     */
    public static function getList()
    {
        return ArrayHelper::map(ArrayHelper::merge([['id' => '0', 'name' => 'Не выбрано']],self::find()->where(['publish' => self::PUBLISH])->orderBy('pos ASC')->asArray()->all()),'id','name');
    }
}
