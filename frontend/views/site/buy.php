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
            <form id="city__search">
                <input type="text" id="suggest" name="city" placeholder="Город"><input type="submit" value="">
            </form>
        </div>
        <div class="b-map">
            <div id="myMap"></div>
        </div>
        <!--<div class="gallerey-magazine">
            <div class="inner">
                <h2>
                    Галлерея продукции на полке
                </h2>
            </div>
            <?//php if($images = \common\models\GeographyImages::getList()):
                //$count = 1;?>
            <ul>
                <li>
                    <?//php foreach($images as $i):?>
                        <?//php if (($count % 2) == 1 && $count > 1) echo '<li></li>';
                            //echo Html::a(Html::img('@geography/'.$i['basename'] . '.' . $i['ext']), '#');
                        //$count++;?>
                    <?//php endforeach;?>
                </li>
            </ul>
            <?//php endif;?>
        </div>
        <div class="inner add-mag">
            <a class="btn green fancybox" href="#search-shop">ДОБАВИТЬ МАГАЗИН</a>
            <p>
                или свяжитесь с нашим <a href="#">отделом продаж</a>
            </p>
        </div>-->
    </div>
</section>
<?php $this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');?>
<?php $this->registerJsFile('js/_yandex_map.js',['depends'=>'yii\web\JqueryAsset']);?>