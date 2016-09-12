<?php

namespace frontend\models;

use common\models\Blog;
use Yii;
use yii\db\ActiveRecord;

class SearchModel extends ActiveRecord
{
    public $keywords;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keywords'], 'required'],
            [['keywords'], 'string'],
        ];
    }

    /**
     * @param $params
     * @return array
     */
    public function search($params)
    {
        if (!($this->load($params) && $this->validate())) {
            return [];
        }

        $sql = "(SELECT `alias`, `name`, `text`, \"product\" AS `sub_link` FROM `catalog_items`
                WHERE (`name` LIKE '%{$this->keywords}%') OR (`text` LIKE '%{$this->keywords}%'))
                UNION (SELECT `alias`, `name`, `text`, \"blog\" AS `sub_link` FROM `blog`
                WHERE (`name` LIKE '%{$this->keywords}%') OR (`text` LIKE '%{$this->keywords}%'))";

        return Blog::findBySql($sql)->all();
    }
}