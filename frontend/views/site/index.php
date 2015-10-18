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
            <?= $model['name']?>
        </div>
        <div class="btns">
            <?= Html::a('ПОДРОБНО О КОМПАНИИ', Url::to('about'), ['class' => 'btn'])?>
        </div>
    </section>
    <section class="b2">
        <div class="b-left">
            <div class="title">
                ВЫБИРАЙТЕ<br>НАТУРАЛЬНУЮ<br>ПРОДУКЦИЮ
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
            ЗАКАЖИТЕ ПРОИЗВОДСТВО ЧАЯ<br>ПОД СВОЕЙ ТОРГОВОЙ МАРКОЙ
        </div>
        <div class="btns">
            <a class="btn" href="#">ПОДРОБНЕЕ</a>
        </div>
    </section>
    <section class="b4">
        <div class="b-left">
            <div class="title left">
                ЧИТАЙТЕ ИНТЕРЕСНЫЕ<br>СТАТЬИ О ЛЮБИМОМ<br>НАПИТКЕ
                <div class="btns">
                    <a class="btn blog" href="/blog.html">ЧИТАТЬ БЛОГ</a>
                </div>
            </div>
        </div>
        <div class="b-right">
            <div class="title">
                5 топ-тем нашего блога:
            </div>
            <ul>
                <li>
                    <a href="#">Вся правда о чае в пакетиках</a>
                </li>
                <li>
                    <a href="#">10 ошибок начинающих производителей</a>
                </li>
                <li>
                    <a href="#">Запускать нельзя тестировать. Новый подход к созданию упаковки</a>
                </li>
                <li>
                    <a href="#">Раскрываем секреты продающего видео</a>
                </li>
                <li>
                    <a href="#">Большой бизнес за 2 дня. Как мы работали на фестивале уличной еды</a>
                </li>
            </ul>
        </div>
    </section>
    <section class="b5">
        <div class="title">
            ГЕОГРАФИЯ ТОЧЕК ПРОДАЖ
        </div>
        <ul>
            <li>
                <div class="title">
                    Потребителю
                </div>
                <p>
                    Мы придумали удобный сервис для<br>любителей чая Флорис. Это хороший<br>способ найти ближайший магазин<br>с нашей продукцией.
                </p>
                <a class="btn" href="#">Найти</a>
            </li>
            <li>
                <div class="title">
                    Реализатору
                </div>
                <p>
                    Уникальный сервис расчитан на то,<br>чтобы ваши продажи росли. Добавьте<br>свою магазин для увеличения потока<br>клиентов.
                </p>
                <a class="btn" href="#">ДОБАВИТЬ МАГАЗИН</a>
            </li>
        </ul>
    </section>
</main>