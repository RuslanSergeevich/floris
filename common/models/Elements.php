<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "elements".
 *
 * @property integer $id
 * @property string $name
 */
class Elements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'elements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public static function getValue($id){
        $res = self::find()->where(['id' => $id])->one();
        return $res?$res->name:null;
    }
}
