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

<section class="b1 top-section" style="background-image: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['we_produce']['image']?>')">
    <div id="video">
        <div class="video-logo"></div>
        <a class="close"></a>
        <video id="video-frame" autostart loop>
            <source src="/video/tea.mp4" type="video/mp4; codecs="avc1.42E01E, mp4a.40.2""><source src="/video/tea.webm" type="video/webm"><source src="/video/tea.ogv" type="video/ogg">
        </video>
    </div>
    <div class="title">
        <?= $model->name?>
        <?//= $model->boxes['we_produce']['title']?>
        <?//= Html::a('<i class="fi fi-menu_about"></i>ПОДРОБНО О КОМПАНИИ', Url::to($model->boxes['we_produce']['link']),['class' => 'btn'])?>
        <a class="play-video"><i class="fi fi-play"></i></a>
    </div>
</section>
<section class="about">
    <!--<div class="top-block b-top-section top-section">
        <div class="title">
            <?//= $model->name?>
        </div>
    </div>-->
    <div class="b-content">
        <div class="inner">
            <?= $model->text?>
            <?php if(isset($model->boxes['ingredients'])):?>
            <div class="b-local">
                <div class="title">
                    <?= $model->boxes['ingredients']['title']?>
                </div>
                    <?= $model->boxes['ingredients']['text']?>
            </div>
            <?php endif;?>
            <?php if(isset($model->boxes['recipes'])):?>
            <div class="b-local">
                <div class="title">
                    <?= $model->boxes['recipes']['title']?>
                </div>
                    <?= $model->boxes['recipes']['text']?>
            </div>
            <?php endif;?>
            <?php if(isset($model->boxes['production'])):?>
            <div class="b-local">
                <div class="title">
                    <?= $model->boxes['production']['title']?>
                </div>
                    <?= $model->boxes['production']['text']?>
            </div>
            <?php endif;?>
        </div>
    </div>
    <div class="b-content-promo screen">
        <div class="inner">
            <ul>
                <li>
                    Партнёры более
                    <div class="circle">
                        1000
                    </div>
                    магазинов
                </li>
                <li>
                    Используем
                    <div class="circle">
                        500<span>тонн</span>
                    </div>
                    сырья в год
                </li>
                <li>
                    Ассортимент
                    <div class="circle">
                        60
                    </div>
                    видов чая
                </li>
            </ul>
        </div>
    </div>
    <div class="b-content-promo mobile">
        <div class="inner">
            <ul class="list-promo">
                <li>
                    Партнёры более
                    <div class="circle">
                        1000
                    </div>
                    магазинов
                </li>
                <li>
                    Используем
                    <div class="circle">
                        500<span>тонн</span>
                    </div>
                    сырья в год
                </li>
                <li>
                    Ассортимент
                    <div class="circle">
                        60
                    </div>
                    видов чая
                </li>
            </ul>
        </div>
    </div>
    <div class="b-content clients">
        <div class="inner">
            <?php if(isset($model->boxes['our_clients'])):?>
            <div class="b-local">
                <div class="title">
                    <?= $model->boxes['our_clients']['title']?>
                </div>
                    <?= $model->boxes['our_clients']['text']?>
            </div>
            <?php endif;?>
            <div class="logos">
                <?= Html::ul(\common\models\Ourclients::getList(), ['item' => function($item) {
                    return Html::tag(
                        'li',
                        Html::img('@ourclients/'.$item['image'])
                    );
                }])?>
            </div>
        </div>
    </div>
    <?php if(isset($model->boxes['geography_points'])):?>
    <div class="geography-sale">
        <div class="inner center">
            <div class="text">
                <?= $model->boxes['geography_points']['title']?>
            </div>
            <?= Html::a('НАЙТИ', Url::to($model->boxes['geography_points']['link']),['class' => 'btn green'])?>
        </div>
    </div>
    <?php endif;?>
    <div class="b-content employees">
        <div class="inner">
            <div class="b-local">
                <div class="title">
                    Сертификаты
                </div>
            </div>
            <?= Html::ul(Workers::getList(), ['item' => function($item, $index) {
                $image = Html::a(Html::img('@workers' .'/'. $item['image']), Url::to('@workers' .'/'. $item['image']), ['class' => 'fancybox']);
                return Html::tag(
                    'li',
                    Html::tag('div', $image, [ 'class' => 'img']) . Html::tag('p',$item['name'] . Html::tag('span', $item['appointment']))
                );
            }]) ?>
            <?php if(isset($model->boxes['vacancy'])):?>
            <div class="b-local vacations">
                <div class="title fleft">
                    <?= $model->boxes['vacancy']['title']?>
                </div>
                    <?= $model->boxes['vacancy']['text']?>
                <?= Html::a('ВАКАНСИИ', Url::to($model->boxes['vacancy']['link']),['class' => 'btn green'])?>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>