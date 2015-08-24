<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "actions".
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
class Actions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'image', 'name', 'text', 'title', 'description', 'keywords', 'created_at', 'updated_at'], 'required'],
            [['image', 'text', 'title', 'description', 'keywords'], 'string'],
            [['publish', 'pos', 'created_at', 'updated_at'], 'integer'],
            [['alias', 'name'], 'string', 'max' => 255]
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
            'image' => 'Image',
            'name' => 'Name',
            'text' => 'Text',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'publish' => 'Publish',
            'pos' => 'Pos',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
