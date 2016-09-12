<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prices_values".
 *
 * @property integer $id
 * @property integer $price_id
 * @property integer $product_id
 * @property integer $price_value
 */
class PricesValues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prices_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_id', 'product_id', 'price_value'], 'required'],
            [['price_id', 'product_id', 'price_value'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price_id' => 'Price ID',
            'product_id' => 'Product ID',
            'price_value' => 'Price Value',
        ];
    }

    /**
     * @param $price_id
     * @param $product_id
     * @return int
     */
    public static function getPriceValue($price_id, $product_id)
    {
        $value = self::findOne(['price_id' => $price_id, 'product_id' => $product_id]);
        return isset($value->price_value) ? $value->price_value : 0;
    }
}
