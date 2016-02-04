<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "catalog".
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
class Catalog extends \yii\db\ActiveRecord
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
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * @return ScopesCatalog
     */
    public static function find() {
        return new ScopesCatalog(get_called_class());
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
            'title' => 'title',
            'description' => 'description',
            'keywords' => 'keywords',
            'alias' => 'alias',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogItems()
    {
        return $this->hasMany(CatalogItems::className(), ['parent_id' => 'id']);
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
}

class ScopesCatalog extends ActiveQuery{

    /**
     * @return $this
     */
    public function publish() {
        return $this->andWhere(['publish' => Catalog::PUBLISH]);
    }

}
