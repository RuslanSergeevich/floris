<?php
namespace frontend\components;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use common\models\Boxes;

/**
 * Class BoxesBehavior
 * @package frontend\components
 */
class BoxesBehavior extends Behavior
{
    public $boxes;

    /**
     * @param \yii\base\Component $owner
     */
    public function attach($owner)
    {
        parent::attach($owner);
        $owner->on(ActiveRecord::EVENT_AFTER_FIND, [$this, 'onAfterFind']);
    }

    /**
     * @throws \yii\base\Exception
     */
    public function onAfterFind()
    {
        $this->boxes = ArrayHelper::index(Boxes::getBoxBySysName(), 'sys_name');
    }
}