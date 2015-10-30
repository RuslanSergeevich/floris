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
<section class="about">
    <div class="top-block b-top-section top-section">
        <div class="title">
            <?= $model->name?>
        </div>
    </div>
    <div class="b-content">
        <div class="inner">
            <?= $model->text?>
            <div class="b-local">
                <div class="title">
                    <?= $model->boxes['ingredients']['title']?>
                </div>
                    <?= $model->boxes['ingredients']['text']?>
            </div>
            <div class="b-local">
                <div class="title">
                    <?= $model->boxes['recipes']['title']?>
                </div>
                    <?= $model->boxes['recipes']['text']?>
            </div>
            <div class="b-local">
                <div class="title">
                    <?= $model->boxes['production']['title']?>
                </div>
                    <?= $model->boxes['production']['text']?>
            </div>
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
            <div class="b-local">
                <div class="title">
                    <?= $model->boxes['our_clients']['title']?>
                </div>
                    <?= $model->boxes['our_clients']['text']?>
            </div>
            <div class="logos">
                <ul>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                    <li>
                        <img src="/images/about/logo.png" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="geography-sale">
        <div class="inner center">
            <div class="text">
                <?= $model->boxes['geography_points']['title']?>
            </div>
            <?= Html::a('НАЙТИ', Url::to($model->boxes['geography_points']['link']),['class' => 'btn border'])?>
        </div>
    </div>
    <div class="b-content employees">
        <div class="inner">
            <div class="b-local">
                <div class="title">
                    Сотрудники компании
                </div>
            </div>
            <?= Html::ul(Workers::getList(), ['item' => function($item, $index) {
                return Html::tag(
                    'li',
                    Html::tag('div', Html::img('@workers' .'/'. $item['image']), [ 'class' => 'img']) . Html::tag('p',$item['name'] . Html::tag('span', $item['appointment']))
                );
            }]) ?>
            <div class="b-local vacations">
                <div class="title fleft">
                    <?= $model->boxes['vacancy']['title']?>
                </div>
                    <?= $model->boxes['vacancy']['text']?>
                <?= Html::a('ВАКАНСИИ', Url::to($model->boxes['geography_points']['link']),['class' => 'btn border'])?>
            </div>
        </div>
    </div>
</section>