<?php

use yii\helpers\Html;

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
<section class="contacts">
    <div class="contacts-header"></div>
    <div class="geography-sale">
        <div class="inner center">
            <div class="text">
                ОСТАВЬТЕ СВОЮ ЗАЯВКУ
            </div>
            <a class="btn green" href="#">ЗАЯВКА</a>
        </div>
    </div>
    <div class="b-info">
        <div class="inner">
            <ul>
                <?php if(isset($model->boxes['sales_department'])):?>
                <li>
                    <h2>
                        <?= $model->boxes['sales_department']['title']?>
                    </h2>
                        <?= $model->boxes['sales_department']['text']?>
                </li>
                <?php endif;?>
                <?php if(isset($model->boxes['office'])):?>
                <li>
                    <h2>
                        <?= $model->boxes['office']['title']?>
                    </h2>
                        <?= $model->boxes['office']['text']?>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <div class="b-info">
        <div class="inner">
            <ul>
                <?php if(isset($model->boxes['supply_division'])):?>
                <li>
                    <h2>
                        <?= $model->boxes['supply_division']['title']?>
                    </h2>
                        <?= $model->boxes['supply_division']['text']?>
                </li>
                <?php endif;?>
                <?php if(isset($model->boxes['press'])):?>
                <li>
                    <h2>
                        <?= $model->boxes['press']['title']?>
                    </h2>
                        <?= $model->boxes['press']['text']?>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <div class="b-info">
        <div class="inner">
            <ul>
                <?php if(isset($model->boxes['director'])):?>
                <li>
                    <h2>
                        <?= $model->boxes['director']['title']?>
                    </h2>
                        <?= $model->boxes['director']['text']?>
                </li>
                <?php endif;?>
                <?php if(isset($model->boxes['looking_people'])):?>
                <li>
                    <h2>
                        <?= $model->boxes['looking_people']['title']?>
                    </h2>
                        <?= $model->boxes['looking_people']['text']?>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <div class="b-info connect-soc">
        <div class="inner">
            <h2>
                ПРИСОЕДИНЯЙТЕСЬ
            </h2>
            <div class="social">
                <a class="fb" href="#" target="_blank"></a><a class="insta" href="#" target="_blank"></a><a class="vk" href="#" target="_blank"></a><a class="youtube" href="#" target="_blank"></a>
            </div>
        </div>
    </div>
    <?php if(isset($model->boxes['promotional_material'])):?>
    <div class="b-info">
        <div class="inner center">
            <h2>
                <?= $model->boxes['promotional_material']['title']?>
            </h2>
                <?= $model->boxes['promotional_material']['text']?>
                <a class="btn green" href="#">СКАЧАТЬ</a>
        </div>
    </div>
    <?php endif;?>
</section>