<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $alias
 * @property string $name
 * @property string $text
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property integer $publish
 * @property integer $pos
 * @property string $created_at
 * @property string $updated_at
 */
class Pages extends \yii\db\ActiveRecord
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
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'publish', 'pos'], 'integer'],
            [['alias', 'name', 'text', 'title', 'description', 'keywords'], 'required'],
            [['text', 'title', 'description', 'keywords'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'parent_id' => 'Родительская страница',
            'alias' => 'Alias',
            'name' => 'Название',
            'text' => 'Текст',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлена'
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public static function getListPages($id = false)
    {
        if($id){
            $model = Pages::find()->select('id, name')->where(['parent_id' => 0])->where(['<>', 'id', $id])->all();
        } else {
            $model = Pages::find()->select('id, name')->where(['parent_id' => 0])->all();
        }

        return ArrayHelper::map(ArrayHelper::merge([['id' => '0', 'name' => 'Не выбрано']],$model),'id','name');
    }

    /**
     * @param $status
     * @return mixed
     */
    public static function getStatusesIcon($status)
    {
        $statuses = [
            self::UNPUBLISHED => '<i class="fa fa-fw fa-close icon-2x"></i>',
            self::PUBLISH => '<i class="fa fa-fw fa-check icon-2x"></i>'
        ];
        return $statuses[$status];
    }
}
