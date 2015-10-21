<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "boxes".
 *
 * @property integer $id
 * @property string $sys_name
 * @property string $name
 * @property string $title
 * @property integer $publish
 * @property integer $pos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Boxes extends \yii\db\ActiveRecord
{
    const PUBLISH = 1;
    const UNPUBLISHED = 0;

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
            [['text'], 'string']
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
        return self::find()->select(['sys_name','title','name','text'])->where(['publish' => self::PUBLISH])->asArray()->all();
    }
}
