<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\FileBehavior;

/**
 * This is the model class for table "boxes".
 *
 * @property integer $id
 * @property string $sys_name
 * @property string $name
 * @property string $title
 * @property string $text
 * @property string $link
 * @property integer $publish
 * @property integer $pos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Boxes extends \yii\db\ActiveRecord
{
    const PUBLISH = 1;
    const UNPUBLISHED = 0;

    /**
     * directory to save
     */
    const PATH = '/userfiles/boxes/';
    /**
     *
     */
    const IMAGE_ENTITY = 'image';

    /**
     * @var
     */
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
        return 'boxes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sys_name', 'name', 'title'], 'required'],
            [['publish', 'created_at', 'updated_at'], 'integer'],
            [['sys_name', 'name', 'title'], 'string', 'max' => 255],
            [['text','link'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sys_name' => 'Системное имя',
            'name' => 'Название блока',
            'title' => 'Заголовок блока',
            'text' => 'Контент блока',
            'link' => 'Ссылка на кнопку',
            'file' => 'Изображение(1420 x 660px)',
            'publish' => 'Публикация',
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

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getBoxBySysName()
    {
        return self::find()->select(['sys_name','title','name','text','link','image'])->where(['publish' => self::PUBLISH])->asArray()->all();
    }

    /**
     * @param $sys_name
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getBox($sys_name)
    {
        $model = self::find()->select(['sys_name','text'])->where(['publish' => self::PUBLISH, 'sys_name' => $sys_name])->asArray()->one();
        return $model['text'];
    }
}
