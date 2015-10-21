<?php

use yii\helpers\Url;
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
<main>
    <section class="b1">
        <div class="title">
            <?= $model->name?>
        </div>
        <div class="btns">
            <?= Html::a('ПОДРОБНО О КОМПАНИИ', Url::to('about'),['class' => 'btn'])?>
        </div>
    </section>
    <section class="b2">
        <ul class="list-product">
            <li class="active" data-product="product-1">
                <img src="/images/choise-product.png" alt="">
            </li>
            <li data-product="product-2">
                <img src="/images/choise-product.png" alt="">
            </li>
            <li data-product="product-3">
                <img src="/images/choise-product.png" alt="">
            </li>
            <li data-product="product-4">
                <img src="/images/choise-product.png" alt="">
            </li>
            <li data-product="product-5">
                <img src="/images/choise-product.png" alt="">
            </li>
        </ul>
        <div class="choise-product b-left product-1 active">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 1
            </div>
            <div class="b-text">
                <div class="sub-title">
                    Чай в фильтр-пакетах
                </div>
                <p>
                    Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.
                </p>
                <?= Html::a('В КАТАЛОГ', Url::to('cataloge'),['class' => 'btn'])?>
            </div>
        </div>
        <div class="choise-product b-left product-2">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 2
            </div>
            <div class="b-text">
                <div class="sub-title">
                    Чай в фильтр-пакетах
                </div>
                <p>
                    Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.
                </p>
                <a class="btn" href="#">В КАТАЛОГ</a>
            </div>
        </div>
        <div class="choise-product b-left product-3">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 3
            </div>
            <div class="b-text">
                <div class="sub-title">
                    Чай в фильтр-пакетах
                </div>
                <p>
                    Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.
                </p>
                <a class="btn" href="#">В КАТАЛОГ</a>
            </div>
        </div>
        <div class="choise-product b-left product-4">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 4
            </div>
            <div class="b-text">
                <div class="sub-title">
                    Чай в фильтр-пакетах
                </div>
                <p>
                    Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.
                </p>
                <a class="btn" href="#">В КАТАЛОГ</a>
            </div>
        </div>
        <div class="choise-product b-left product-5">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 5
            </div>
            <div class="b-text">
                <div class="sub-title">
                    Чай в фильтр-пакетах
                </div>
                <p>
                    Аналог классического чая Floris в измельченном формате и герметично упакованный в фильрт-пакет. Чай заваривается за пять минут не теряя при этом неповторимый вкус чаев Floris.
                </p>
                <a class="btn" href="#">В КАТАЛОГ</a>
            </div>
        </div>
    </section>
    <section class="b3">
        <div class="title">
            <?= $model->boxes['tea_production']['title']?>
        </div>
        <div class="btns">
            <a class="btn" href="#">ПОДРОБНЕЕ</a>
        </div>
    </section>
    <section class="b4">
        <div class="b-left">
            <div class="title left">
                <?= $model->boxes['interesting_article']['title']?>
                <div class="btns">
                    <?= Html::a('ЧИТАТЬ БЛОГ', Url::to('blog'),['class' => 'btn'])?>
                </div>
            </div>
        </div>
        <div class="b-right">
            <div class="title">
                5 топ-тем нашего блога:
            </div>
            <?= Html::ul(\common\models\Blog::find()->showMain()->limit(5)->all(), ['item' => function($item, $index) {
                return Html::tag(
                    'li', Html::a($item['name'], Url::to(['blog/view', 'alias' => $item['alias']]))
                );
            }]) ?>
        </div>
    </section>
    <section class="b5">
        <div class="title">
            <?= $model->boxes['geography']['title']?>
        </div>
            <?= $model->boxes['geography']['text']?>
    </section>
</main>