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
<section class="map">
    <div class="map-header"></div>
    <div class="map-content">
        <div class="inner">
            <h2>
                Найдите ближайший магазин с нашей продукцией
            </h2>
            <h3>
                Введите в поиске название города
            </h3>
            <form>
                <input type="text" name="" placeholder="Город"><input type="submit" value="">
            </form>
        </div>
        <div class="b-map">
            <script src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=HFA-Yxd_lNu8zY8JwFTv3r1Aj-iAaFM0&width=100%&height=100%&lang=ru_RU&sourceType=constructor" type="text/javascript"></script>
        </div>
        <div class="gallerey-magazine">
            <div class="inner">
                <h2>
                    Галлерея продукции на полке
                </h2>
            </div>
            <ul>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="/images/map/map-magazine.png" alt=""></a><a href="#"><img src="/images/map/map-magazine.png" alt=""></a>
                </li>
            </ul>
        </div>
        <div class="inner add-mag">
            <a class="btn green" href="#">ДОБАВИТЬ МАГАЗИН</a>
            <p>
                или свяжитесь с нашим <a href="#">отделом продаж</a>
            </p>
        </div>
    </div>
</section>