<?php
namespace backend\components;

use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Modules;
use Yii;

/**
 * Class SidebarWidget
 * @author Alexandr Krasnopyorov <sanya-sliver@yandex.ru>
 */
class SidebarWidget extends Widget
{

    const NAME_NAVIGATION = 'Навигация';
    const URL_SEPARATOR = '/';

    /**
     * @var
     */
    public $moduleId;
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
        if($modules = Modules::find()->where(['active' => 1])->orderBy('name','ASC')->asArray()->all()){
            $this->_html .= Html::tag('li', self::NAME_NAVIGATION, ['class' => 'header']);
                foreach($modules as $module){
                    $this->_html .= Html::tag('li', Html::a('<i class="fa fa-fw '. $module['icon'] .'"></i> <span>'.$module['name'].'</span>', Url::toRoute(self::URL_SEPARATOR.$module['module'])),
                        [
                            'class' => $this->moduleId == $module['module'] ? 'active' : '',
                            'id' => 'module-'.$module['module']
                        ]);
                }
        }
        return Html::tag('ul', $this->_html, ['class' => 'sidebar-menu']);
    }

} 