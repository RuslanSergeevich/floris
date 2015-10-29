<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\FileBehavior;

/**
 * This is the model class for table "workers".
 *
 * @property integer $id
 * @property string $name
 * @property string $appointment
 * @property string $image
 * @property integer $created_at
 * @property integer $updated_at
 */
class Workers extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;

    /**
     * directory to save
     */
    const PATH = '/userfiles/workers/';
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
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'appointment'], 'required'],
            [['image'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'appointment'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'appointment' => 'Должность',
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
