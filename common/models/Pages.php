<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\DropDownTreeBehavior;
use frontend\components\BoxesBehavior;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property integer $template
 * @property integer $parent_id
 * @property integer $price_id
 * @property string $alias
 * @property string $name
 * @property string $menu_name
 * @property string $text
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property integer $publish
 * @property integer $show_menu
 * @property integer $pos
 * @property string $created_at
 * @property string $updated_at
 */
class Pages extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;
    const SHOW_MENU = 1;

    public static $pages;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
            [
                'class' => DropDownTreeBehavior::className(),
            ],
            [
                'class' => BoxesBehavior::className(),
            ]
        ];
    }

    public function init()
    {
        self::$pages = $this->getTree(Pages::find()->asArray()->all());
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
            [['parent_id', 'publish', 'pos', 'show_menu','price_id', 'bottom_menu_show', 'bottom_menu_sort'], 'integer'],
            [['alias', 'name', 'title', 'description'], 'required'],
            [['text', 'title', 'description', 'keywords', 'bottom_menu_name'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['alias', 'name', 'menu_name', 'template'], 'string', 'max' => 255],
            ['pos', 'default', 'value' => 0],
            ['bottom_menu_sort', 'default', 'value' => 0],
            ['show_menu', 'default', 'value' => 0],
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
            'template' => 'Выберите шаблон страницы',
            'parent_id' => 'Родительская страница',
            'price_id' => 'Прайс',
            'alias' => 'Alias',
            'name' => 'Название',
            'menu_name' => 'Название в меню',
            'text' => 'Текст',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'show_menu' => 'Отображать в меню?',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлена',
            'bottom_menu_show' => 'Отображать в нижнем меню',
            'bottom_menu_name' => 'Название в нижнем меню',
            'bottom_menu_sort' => 'Позиция в нижнем меню',
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
     * @param $id
     * @return $this
     */
    public static function existsChilds($id)
    {
        return static::find()->where(['parent_id' => $id])->count() > 0 ? true : false;
    }
}
