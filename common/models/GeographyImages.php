<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "geography_images".
 *
 * @property integer $id
 * @property integer $geography_id
 * @property string $basename
 * @property string $ext
 */
class GeographyImages extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $files;

    CONST PATH = '/frontend/web/userfiles/geography/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geography_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'geography_id' => 'Geography ID',
            'basename' => 'Basename',
            'ext' => 'Ext',
        ];
    }

    /**
     * @param $id
     */
    public function upload($id)
    {
        if ($this->validate()) {
            foreach ($this->files as $file) {
                $time = time();
                $file->saveAs('userfiles/geography/' . $file->baseName . '_' . $time . '.' . $file->extension);
                $model = new GeographyImages();
                $model->geography_id = $id;
                $model->basename = $file->baseName . '_' . $time;
                $model->ext = $file->extension;
                $model->save();
            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeography()
    {
        return $this->hasOne(Geography::className(), ['id' => 'geography_id']);
    }

    /**
     * @param $id
     * @return static[]
     */
    public static function getImages($id)
    {
        return self::find()->where(['geography_id' => $id])->asArray()->all();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList()
    {
        return self::find()->asArray()->all();
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            unlink($_SERVER['DOCUMENT_ROOT'] . self::PATH . $this->basename . '.'. $this->ext);
            return true;
        } else {
            return false;
        }
    }
}
