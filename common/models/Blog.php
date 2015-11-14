<?php

namespace common\models;

use Yii;
use backend\components\FileBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use frontend\components\BoxesBehavior;

/**
 * This is the model class for table "blog".
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
 * @property integer $show_main
 * @property integer $pos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Blog extends \yii\db\ActiveRecord
{

    const PUBLISH = 1;
    const UNPUBLISHED = 0;
    const SHOW_MAIN = 1;

    public $sub_link;

    /**
     * directory to save
     */
    const PATH = '/userfiles/blog/';
    /**
     *
     */
    const IMAGE_ENTITY = 'image';

    /**
     * @var
     */
    public $file;

    /**
     * @return array
     */
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
                'class' => BoxesBehavior::className(),
            ]
        ];
    }

    /**
     * @return ScopesBlog
     */
    public static function find() {
        return new ScopesBlog(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'text', 'title'], 'required'],
            [['image', 'text', 'title', 'description', 'keywords'], 'string'],
            [['publish', 'pos', 'show_main', 'created_at', 'updated_at'], 'integer'],
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
            'alias' => 'Alias',
            'image' => 'Изображение',
            'file' => 'Изображение',
            'name' => 'Название',
            'text' => 'Содержание',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'publish' => 'Публикация',
            'show_main' => 'Отображать на главной?',
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
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllBlogs()
    {
        return self::find()->where(['publish' => self::PUBLISH])->orderBy('created_at DESC')->asArray()->all();
    }

    /**
     * @param $id
     * @return bool|int
     * @throws \Exception
     */
    public static function unlinkImage($id)
    {
        $model = self::findOne(['id' => $id]);
        if(unlink($model->getFileDir() . $model->image)){
            $model->image = '';
            return $model->update();
        }
    }
}

class ScopesBlog extends ActiveQuery{

    /**
     * @return $this
     */
    public function showMain() {
        return $this->andWhere(['show_main' => Blog::SHOW_MAIN, 'publish' => Blog::PUBLISH]);
    }

}