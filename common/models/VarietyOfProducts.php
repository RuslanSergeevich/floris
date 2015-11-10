<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\FileBehavior;

/**
 * This is the model class for table "variety_of_products".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $publish
 * @property integer $created_at
 * @property integer $updated_at
 */
class VarietyOfProducts extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;

    /**
     * directory to save
     */
    const PATH = '/userfiles/variety_of_products/';
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
        return 'variety_of_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['image'], 'string'],
            [['publish', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255]
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
            'image' => 'Изображение',
            'file' => 'Изображение',
            'publish' => 'Публикация',
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
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList()
    {
        return self::find()->where(['publish' => self::PUBLISH])->asArray()->all();
    }
}
