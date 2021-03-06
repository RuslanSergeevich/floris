<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\FileBehavior;
use backend\components\FileBehavior2;
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
 * @property string $text
 * @property integer $publish
 * @property integer $pos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Catalog extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;
    const IMAGE_ENTITY = 'image';
    const IMAGE_ENTITY2 = 'cat_image';
    const PATH = '/userfiles/catalog/';

    public $file;
    public $file2;

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
            ],
            [
                'class' => FileBehavior2::className(),
                'path' => self::PATH,
                'entity' => self::IMAGE_ENTITY2
            ],
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
            [['publish', 'pos', 'created_at', 'updated_at', 'bottom_menu_show', 'bottom_menu_sort'], 'integer'],
            [['image', 'text_on_main', 'cat_image', 'our_prod','title', 'description', 'keywords','alias', 'text', 'text_on_top', 'title_on_top', 'text_under_name', 'bottom_menu_name'], 'string'],
            ['pos', 'default', 'value' => 0],
            ['our_prod', 'default', 'value' => 0],
            ['bottom_menu_sort', 'default', 'value' => 0],
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
            'text_on_main' => 'Название для главной страницы',
            'file' => 'Изображение (загружать размером 1400 x 300 px)',
            'text_under_name' => 'Текст под названием',
            'title_on_top' => 'Заголовок на изображении',
            'text_on_top' => 'Текст на изображении',
            'text' => 'Текст',
            'title' => 'title',
            'description' => 'description',
            'keywords' => 'keywords',
            'alias' => 'alias',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'our_prod' => 'Отображать в блоке "Наша продукция"?',
            'created_at' => 'Создана',
            'updated_at' => 'Обновлена',
            'bottom_menu_show' => 'Отображать в нижнем меню',
            'bottom_menu_name' => 'Название в нижнем меню',
            'bottom_menu_sort' => 'Позиция в нижнем меню',
            'file2' => 'Картинка для каталога (загружать размером 313 x 314 px)'
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

    public static function unlinkImage($id)
    {
        $model = self::findOne(['id' => $id]);
        if(unlink($model->getFileDir() . $model->image)){
            $model->image = '';
            return $model->update();
        }
    }

    public static function getOurProducts()
    {
        $items = self::find()->where(['our_prod' => 1])->limit(6)->all();
        return $items;
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
