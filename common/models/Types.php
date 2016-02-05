<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "types".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $alias
 * @property string $name
 * @property integer $publish
 * @property integer $pos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Types extends \yii\db\ActiveRecord
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
        return 'types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['publish', 'pos', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'keywords','alias'], 'string'],
            [['name'], 'string', 'max' => 255],
            ['pos', 'default', 'value' => 0],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogItems()
    {
        return $this->hasMany(CatalogItems::className(), ['type_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'title' => 'title',
            'description' => 'description',
            'keywords' => 'keywords',
            'alias' => 'alias',
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

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->where(['publish' => self::PUBLISH])->orderBy('pos ASC')->asArray()->all();
    }
}
