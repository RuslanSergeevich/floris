<?php
namespace frontend\components;

use common\models\Pages;
use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\Html;
use Yii;

/**
 * Class DDWidget
 * @author Alexandr Krasnopyorov <sanya-sliver@yandex.ru>
 */
class DDWidget extends Widget
{

    /**
     * @var
     */
    public $model;

    /**
     * @var
     */
    public $css_class;

    /**
     * @var
     */
    public $entity_db;

    /**
     * @var
     */
    private $_html;

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
        if($this->model){
            foreach($this->model as $key => $value){
                $this->_html .= Html::tag('option', $value, [$this->entity_db => $key]);
            }
        }
        return Html::tag('div', Html::tag('select', $this->_html), ['class' => $this->css_class . ' fleft']);
    }

} 