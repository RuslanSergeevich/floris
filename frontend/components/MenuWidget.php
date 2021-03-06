<?php
namespace frontend\components;

use common\models\Pages;
use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\Html;
use Yii;

/**
 * Class MenuWidget
 * @author Alexandr Krasnopyorov <sanya-sliver@yandex.ru>
 */
class MenuWidget extends Widget
{

    /**
     * @var
     */
    private $_html;

    /**
     * @var
     */
    public $attach_icon = false;

    /**
     * @var
     */
    public $class_name = '';

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
        if($pages = Pages::find()->where(['publish' => Pages::PUBLISH, 'show_menu' => Pages::SHOW_MENU])->orderBy('pos','ASC')->asArray()->all()){
            foreach($pages as $page){
                $i = $this->attach_icon ? '<i class="fi fi-menu_'.$page['alias'].'"></i>' : '';
                $this->_html .= Html::tag('li', Html::a($i.$page['menu_name'], Url::toRoute(['site/page', 'alias' => $page['alias']])),
                    [
                        'class' => $this->attach_icon ? $page['alias'] : '',
                    ]);
            }
        }
        !$this->attach_icon ? $this->_html .= Html::tag('li', Html::a('ВАКАНСИИ', '#')) : '';
        return Html::tag('menu', $this->_html, ['class' => $this->class_name, 'role' => 'navigation']);
    }

} 