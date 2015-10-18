<?php

namespace common\models;

use Yii;
use backend\components\FileBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $alias
 * @property string $image
 * @property string $name
 * @property string $text
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property integer $publish
 * @property integer $pos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Blog extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;

    const PATH = '/userfiles/blog/';
    const IMAGE_ENTITY = 'image';

    public $file;

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
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'text', 'title'], 'required'],
            [['image', 'text', 'title', 'description', 'keywords'], 'string'],
            [['publish', 'pos', 'created_at', 'updated_at'], 'integer'],
            [['alias', 'name'], 'string', 'max' => 255],
            ['pos', 'default', 'value' => 0],
            ['alias', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'image' => 'Изображение',
            'file' => 'Изображение',
            'name' => 'Название',
            'text' => 'Содержание',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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

    public static function getAllBlogs()
    {
        return self::find()->where(['publish' => self::PUBLISH])->orderBy('created_at DESC')->asArray()->all();
    }
}
