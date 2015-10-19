<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\DropDownTreeBehavior;

/**
 * This is the model class for table "catalog_items".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $gallery_cat_id
 * @property string $alias
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
class CatalogItems extends \yii\db\ActiveRecord
{

    public static $galleries;

    public function init()
    {
        self::$galleries = $this->getTree(Gallery::find()->asArray()->all());
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
            [
                'class' => DropDownTreeBehavior::className()
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'alias', 'name', 'text', 'title'], 'required'],
            [['parent_id', 'gallery_cat_id', 'publish', 'pos', 'created_at', 'updated_at'], 'integer'],
            [['text', 'title', 'description', 'keywords'], 'string'],
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
            'parent_id' => 'Parent ID',
            'gallery_cat_id' => 'Галерея',
            'alias' => 'Alias',
            'name' => 'Наименование',
            'text' => 'Контент',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
