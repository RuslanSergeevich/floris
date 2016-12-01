<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Workers;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
$this->title = Html::encode($model->title);
$this->registerMetaTag([
    'name' => 'description',
    'content' => Html::encode($model->description),
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => Html::encode($model->keywords)
]);
?>
        <section class="conditions">
            <div class="conditions-block">
                <h1><?=$model->name?></h1>
                <div class="conditions-features">
                    <ul class="conditions-features-list">
                        <li class="conditions-features-item">
                            <img src="images/payment_1.png">
                            <span class="conditions-name"><?= strip_tags(\common\models\Boxes::getBoxName('oplata'))?></span>
                            <?=\common\models\Boxes::getBox('oplata')?>
                        </li>
                        <li class="conditions-features-item">
                            <img src="images/payment_2.png">
                            <span class="conditions-name"><?= strip_tags(\common\models\Boxes::getBoxName('dostavka'))?></span>
                            <span class="conditions-second-name"><?=\common\models\Boxes::getBoxTitle('dostavka')?></span>
                            <?=\common\models\Boxes::getBox('dostavka')?>
                        </li>
                        <li class="conditions-features-item">
                            <img src="images/payment_3.png">
                            <span class="conditions-name"><?= strip_tags(\common\models\Boxes::getBoxName('rabota_po_dogovoru'))?></span>
                           <?=\common\models\Boxes::getBox('rabota_po_dogovoru')?>
                        </li>
                        <li class="conditions-features-item">
                            <img src="images/payment_4.png">
                            <span class="conditions-name"><?= strip_tags(\common\models\Boxes::getBoxName('min_zakaz'))?></span>
                            <?=\common\models\Boxes::getBox('min_zakaz')?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="discounts">
                <div class="discounts-container">
                   <h2><?= strip_tags(\common\models\Boxes::getBoxName('akcii_i_skidki'))?></h2>
                   <span><?=\common\models\Boxes::getBox('akcii_i_skidki_1')?></span>
                   <span><?=\common\models\Boxes::getBox('akcii_i_skidki_2')?></span>
                   <span><?=\common\models\Boxes::getBox('akcii_i_skidki_3')?></span>
                   <span><?=\common\models\Boxes::getBox('akcii_i_skidki_4')?></span>
                </div>
            </div>
            <div class="clear"></div>
            <div class="opt-conditions">
                <div class="conditions-block">
                    <div class="opt-description">
                        <div class="opt-right-block">
                        <h3><?= strip_tags(\common\models\Boxes::getBoxName('usloviya_optovih_prodaj'))?></h3>
                        <?=\common\models\Boxes::getBox('usloviya_optovih_prodaj')?>
                    </div>
                    <div class="opt-left-block">
                        <h3><?= strip_tags(\common\models\Boxes::getBoxName('krimskiy_chay_melkim_optom'))?></h3>
                        <?=\common\models\Boxes::getBox('krimskiy_chay_melkim_optom')?>
                    </div>                           
                </div>
            </section>