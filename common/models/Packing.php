<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use backend\components\FileBehavior;

/**
 * This is the model class for table "packing".
 *
 * @property integer $id
 * @property string $name
 * @property string $title_main
 * @property string $text
 * @property string $image
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
     * directory to save
     */
    const PATH = '/userfiles/packing/';
    /**
     *
     */
    const IMAGE_ENTITY = 'image';

    /**
     * @var
     */
    public $file;

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
            [
                'class' => FileBehavior::className(),
                'path' => self::PATH,
                'entity' => self::IMAGE_ENTITY
            ]
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
            [['name','declination','image','title_main'], 'string', 'max' => 255],
            [['text'],'string'],
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
            'title_main' => 'Заголовок для главной в карусели',
            'text' => 'Описание',
            'image' => 'Изображение',
            'file' => 'Изображение',
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
        return ArrayHelper::map(ArrayHelper::merge([['id' => '0', 'name' => 'Тип упаковки']],self::find()->where(['publish' => self::PUBLISH])->orderBy('pos ASC')->asArray()->all()),'id','name');
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getListMain()
    {
        return self::find()->where(['publish' => self::PUBLISH])->asArray()->all();
    }
}
