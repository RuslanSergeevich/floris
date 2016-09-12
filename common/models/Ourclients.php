<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\FileBehavior;

/**
 * This is the model class for table "ourclients".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $publish
 * @property integer $pos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Ourclients extends \yii\db\ActiveRecord
{
    /**
     * directory to save
     */
    const PATH = '/userfiles/ourclients/';
    /**
     *
     */
    const IMAGE_ENTITY = 'image';
    /**
     * @var
     */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ourclients';
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
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['image'], 'string'],
            [['publish', 'pos', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            ['pos', 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'image' => 'Изображение',
            'file' => 'Изображение',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList()
    {
        return self::find()->orderBy('pos')->asArray()->all();
    }
}
