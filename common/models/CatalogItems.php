<?php
namespace common\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\DropDownTreeBehavior;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "catalog_items".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $composition_id
 * @property integer $packing_id
 * @property integer $weight_id
 * @property integer $parent_id
 * @property integer $gallery_cat_id
 * @property string $in_package
 * @property string $time
 * @property string $portions
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
 * @property string $type
 * @property string $sub_link
 */
class CatalogItems extends \yii\db\ActiveRecord
{
    const PUBLISH = 1;
    const UNPUBLISHED = 0;
    const MAIN_IMAGE = 1;
    public static $galleries = [];
    public static $types = [];
    public static $composition = [];
    public static $packing = [];
    public static $weight = [];
    public $sub_link;
    public $basename;
    public $ext;
    public function init()
    {
        self::$galleries = $this->getTree(Gallery::find()->asArray()->all());
        self::$types = ArrayHelper::map(ArrayHelper::merge([['id' => '0', 'name' => 'Не выбрано']],Types::find()->asArray()->all()),'id','name');
        self::$composition = Composition::getList();
        self::$packing = Packing::getList();
        self::$weight = Weight::getList();
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
            [['parent_id', 'status', 'gallery_cat_id', 'publish', 'pos', 'hit', 'created_at', 'updated_at', 'type_id', 'composition_id', 'packing_id', 'weight_id', 'bottom_menu_show', 'bottom_menu_sort'], 'integer'],
            [['text', 'title', 'compositions', 'logistic_info', 'description', 'keywords', 'time', 'portions', 'short_desc', 'bottom_menu_name'], 'string'],
            [['alias', 'name', 'in_package'], 'string', 'max' => 255],
            ['pos', 'default', 'value' => 0],
            ['hit', 'default', 'value' => 0],
            ['bottom_menu_sort', 'default', 'value' => 0],
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
            'type_id' => 'Выберите тип товара',
            'parent_id' => 'Parent ID',
            'composition_id' => 'Составы чая',
            'packing_id' => 'Упаковка',
            'weight_id' => 'Масса(нетто)',
            'gallery_cat_id' => 'Галерея',
            'short_desc' => 'Краткое описание',
            'in_package' => 'В упаковке',
            'alias' => 'Alias',
            'time' => 'Время приготовления',
            'portions' => 'Порции',
            'name' => 'Наименование',
            'text' => 'Контент',
            'compositions' => 'Состав',
            'logistic_info' => 'Логистическая информация',
            'status' => 'Наличие',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'publish' => 'Публикация',
            'pos' => 'Позиция',
            'hit' => 'Хит продаж',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'bottom_menu_show' => 'Отображать в нижнем меню',
            'bottom_menu_name' => 'Название в нижнем меню',
            'bottom_menu_sort' => 'Позиция в нижнем меню',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryImages()
    {
        return $this->hasMany(GalleryImages::className(), ['gallery_cat_id' => 'gallery_cat_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Types::className(), ['id' => 'type_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'parent_id']);
    }
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function loadItems()
    {
        return self::find()->with(['type','catalog','galleryImages'])->all();
    }
    /**
     * @param $parent_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function loadItemsOneImage($parent_id)
    {
        return self::find()->where(['parent_id' => $parent_id])->with([
            'galleryImages' => function ($query) {
                                        $query->where(['main' => self::MAIN_IMAGE]);
                                    },
        ])->orderBy('pos ASC')->all();
    }
    /**
     * @param $parent_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function loadItemsOneImageByType($parent_id)
    {
        return self::find()->where(['type_id' => $parent_id])->with([
            'galleryImages' => function ($query) {
                $query->where(['main' => self::MAIN_IMAGE]);
            },
        ])->all();
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
     * @param $packing_id
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getItemsByPacking($packing_id,$id)
    {
        return self::find()->where(['packing_id' => $packing_id])->andWhere(['<>','id',$id])->with([
            'galleryImages' => function ($query) {
                $query->where(['main' => self::MAIN_IMAGE]);
            },
        ])->all();
    }
    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getItemsByParentId($id)
    {
        return self::find()->where(['parent_id' => $id])->asArray()->all();
    }
    public static function getHits(){
        $catalogs = self::find()
            ->select('catalog_items.*, gallery_images.basename as basename, gallery_images.ext as ext')
            ->join('LEFT JOIN', 'gallery_images', 'catalog_items.gallery_cat_id = gallery_images.gallery_cat_id')
            ->where(['catalog_items.hit' => 1])
            ->all();
        return $catalogs;
    }
}