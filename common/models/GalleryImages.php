<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery_images".
 *
 * @property integer $id
 * @property integer $gallery_cat_id
 * @property integer $main
 * @property string $name
 * @property string $alt
 * @property string $title
 * @property string $basename
 * @property string $ext
 * @property integer $publish
 * @property integer $pos
 */
class GalleryImages extends \yii\db\ActiveRecord
{

    const NOT_PARENT = 0;

    /**
     * @var yii/web/UploadedFile file attribute
     */
    public $file;

    const PATH = '/frontend/web/userfiles/gallery/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_cat_id', 'basename', 'ext'], 'required'],
            [['gallery_cat_id', 'publish', 'pos', 'main'], 'integer'],
            [['name', 'alt', 'title', 'basename', 'ext'], 'string', 'max' => 255],
            ['main', 'default', 'value' => 0]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_cat_id' => 'Gallery Cat ID',
            'main' => 'Основное изображение',
            'name' => 'Название',
            'alt' => 'Alt',
            'title' => 'Title',
            'basename' => 'Basename',
            'ext' => 'Ext',
            'publish' => 'Публикация',
            'pos' => 'Pos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogItem()
    {
        return $this->hasOne(CatalogItems::className(), ['gallery_cat_id' => 'gallery_cat_id']);
    }

    /**
     * @param $gallery_cat_id
     * @return int
     */
    public static function saveGalleryCatId($gallery_cat_id)
    {
        return GalleryImages::updateAll(['gallery_cat_id' => $gallery_cat_id],['gallery_cat_id' => self::NOT_PARENT]);

    }

    /**
     * @param $gallery_cat_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getImages($gallery_cat_id)
    {
        return GalleryImages::find()
            ->where(['gallery_cat_id' => $gallery_cat_id])
            ->orderBy('pos')
            ->all();
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            unlink($_SERVER['DOCUMENT_ROOT'].GalleryImages::PATH . $this->basename . '.'. $this->ext);
            unlink($_SERVER['DOCUMENT_ROOT'].GalleryImages::PATH . $this->basename . '_thumb.'. $this->ext);
            return true;
        } else {
            return false;
        }
    }
}
