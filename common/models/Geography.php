<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\FileBehavior;

/**
 * This is the model class for table "geography".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $image
 * @property string $file
 * @property integer $created_at
 * @property integer $updated_at
 */
class Geography extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;

    /**
     * directory to save
     */
    const PATH = '/userfiles/geography/';
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
        return 'geography';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['address', 'image'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
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
            'address' => 'Адрес',
            'image' => 'Image',
            'file' => 'Изображение',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->asArray()->all();
    }
}
