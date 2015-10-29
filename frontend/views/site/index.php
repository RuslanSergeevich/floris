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
    <section class="b1 b-top-section" style="background: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['we_produce']['image']?>')">
        <div class="title">
            <?= $model->boxes['we_produce']['title']?>
        </div>
        <div class="btns">
            <?= Html::a('ПОДРОБНО О КОМПАНИИ', Url::to($model->boxes['we_produce']['link']),['class' => 'btn'])?>
        </div>
    </section>
    <section class="b2">
        <div class="b-list-product">
            <ul>
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
                <li data-product="product-6">
                    <img src="/images/choise-product.png" alt="">
                </li>
                <li data-product="product-7">
                    <img src="/images/choise-product.png" alt="">
                </li>
                <li data-product="product-8">
                    <img src="/images/choise-product.png" alt="">
                </li>
                <li data-product="product-9">
                    <img src="/images/choise-product.png" alt="">
                </li>
                <li data-product="product-10">
                    <img src="/images/choise-product.png" alt="">
                </li>
                <li data-product="product-11">
                    <img src="/images/choise-product.png" alt="">
                </li>
            </ul>
        </div>
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
                <a class="btn" href="#">В КАТАЛОГ</a>
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
        <div class="choise-product b-left product-6">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 6
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
        <div class="choise-product b-left product-7">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 7
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
        <div class="choise-product b-left product-8">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 8
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
        <div class="choise-product b-left product-9">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 9
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
        <div class="choise-product b-left product-10">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 10
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
        <div class="choise-product b-left product-11">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ 11
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
    <section class="b3" style="background: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['tea_production']['image']?>')">
        <div class="title">
            <?= $model->boxes['tea_production']['title']?>
        </div>
        <div class="btns">
            <a class="btn" href="#">ПОДРОБНЕЕ</a>
        </div>
    </section>
    <section class="b4" style="background: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['interesting_article']['image']?>')">
        <div class="b-left">
            <div class="title left">
                <?= $model->boxes['interesting_article']['title']?>
                <div class="btns">
                    <?= Html::a('ЧИТАТЬ БЛОГ', Url::to($model->boxes['interesting_article']['link']),['class' => 'btn blog'])?>
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
    <section class="b5" style="background: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['geography']['image']?>')">
        <div class="title">
            ГЕОГРАФИЯ ТОЧЕК ПРОДАЖ
        </div>
        <ul>
            <li>
                <div class="title">
                    <?= $model->boxes['geography']['title']?>
                </div>
                <?= $model->boxes['geography']['text']?>
                <?= Html::a('Найти', Url::to($model->boxes['geography']['link']),['class' => 'btn'])?>
            </li>
            <li>
                <div class="title">
                    <?= $model->boxes['geography_02']['title']?>
                </div>
                <?= $model->boxes['geography_02']['text']?>
                <?= Html::a('ДОБАВИТЬ МАГАЗИН', Url::to($model->boxes['geography_02']['link']),['class' => 'btn'])?>
            </li>
        </ul>
    </section>
</main>