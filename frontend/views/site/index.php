<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\CatalogItems;
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
    <div id="main">
        <main>
            <div class="top-slider">
                <ul>
                    <li>
                        <a class="fancybox" href="/userfiles/gallery/_BIG_1449211662.jpg"><img src="/userfiles/gallery/top-pic.jpg" alt="" rel="product"></a>
                        <div class="slider-info">
                            <div class="slider-info__title">
                                ВСТРЕЧАЙТЕ НОВИНКУ СЕЗОНА 2016
                            </div>
                            <!-- /.slider-info__title -->
                            <div class="slider-info__text">
                                Чайный набор “На здоровье”
                            </div>
                            <!-- /.slider-info__text -->
                            <a href="#" class="slider-info__button">ПОДРОБНЕЙ</a>
                            <!-- /.slider-info__button -->
                        </div>
                        <!-- /.slider-info -->
                    </li>
                    <!--<li><iframe src="https://player.vimeo.com/video/190399562" width="640" height="273" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></li>-->
                    <li>
                        <a class="fancybox" href="/userfiles/gallery/_BIG_1449211662.jpg"><img src="userfiles/gallery/top-pic.jpg" alt="" rel="product"></a>
                        <div class="slider-info">
                            <div class="slider-info__title">
                                ВСТРЕЧАЙТЕ НОВИНКУ СЕЗОНА 2016
                            </div>
                            <!-- /.slider-info__title -->
                            <div class="slider-info__text">
                                Чайный набор “На здоровье”
                            </div>
                            <!-- /.slider-info__text -->
                            <a href="#" class="slider-info__button">ПОДРОБНЕЙ</a>
                            <!-- /.slider-info__button -->
                        </div>
                        <!-- /.slider-info -->
                    </li>
                    <li><a class="fancybox" href="/userfiles/gallery/_BIG_1449211662.jpg"><img src="/userfiles/gallery/top-pic.jpg" alt="" rel="product"></a></li>
                    <li><a class="fancybox" href="/userfiles/gallery/_BIG_1449211662.jpg"><img src="/userfiles/gallery/top-pic.jpg" alt="" rel="product"></a></li>
                    <li><a class="fancybox" href="/userfiles/gallery/_BIG_1449211662.jpg"><img src="/userfiles/gallery/top-pic.jpg" alt="" rel="product"></a></li>
                </ul>
            </div>
            <!-- /.top-slider -->
            <div class="title-page3"><?= strip_tags(\common\models\Boxes::getBoxName('our_production'))?></div>
            <div class="prod-block clr">
                <div class="prod-block__overflow">
                    <a href="#" class="prod-block__item">
                        <b class="prod-block__img prod-block__img-01"></b>
                        <!-- /.prod-block__img -->
                        <span class="prod-block__title">ФЕРМЕТИРОВАННЫЕ ЧАИ</span>
                        <!-- /.prod-block__title -->
                    </a>
                    <!-- /.prod-block__item -->
                </div>
                <!-- /.prod-block__overflow -->
                <div class="prod-block__overflow">
                    <a href="#" class="prod-block__item">
                        <b class="prod-block__img prod-block__img-02"></b>
                        <!-- /.prod-block__img -->
                        <span class="prod-block__title">ФЕРМЕТИРОВАННЫЕ ЧАИ</span>
                        <!-- /.prod-block__title -->
                    </a>
                    <!-- /.prod-block__item -->
                </div>
                <!-- /.prod-block__overflow -->
                <div class="prod-block__overflow">
                    <a href="#" class="prod-block__item">
                        <b class="prod-block__img prod-block__img-03"></b>
                        <!-- /.prod-block__img -->
                        <span class="prod-block__title">ФЕРМЕТИРОВАННЫЕ ЧАИ</span>
                        <!-- /.prod-block__title -->
                    </a>
                    <!-- /.prod-block__item -->
                </div>
                <!-- /.prod-block__overflow -->
                <div class="prod-block__overflow">
                    <a href="#" class="prod-block__item">
                        <b class="prod-block__img prod-block__img-04"></b>
                        <!-- /.prod-block__img -->
                        <span class="prod-block__title">ФЕРМЕТИРОВАННЫЕ ЧАИ</span>
                        <!-- /.prod-block__title -->
                    </a>
                    <!-- /.prod-block__item -->
                </div>
                <!-- /.prod-block__overflow -->
                <div class="prod-block__overflow">
                    <a href="#" class="prod-block__item">
                        <b class="prod-block__img prod-block__img-05"></b>
                        <!-- /.prod-block__img -->
                        <span class="prod-block__title">ФЕРМЕТИРОВАННЫЕ ЧАИ</span>
                        <!-- /.prod-block__title -->
                    </a>
                    <!-- /.prod-block__item -->
                </div>
                <!-- /.prod-block__overflow -->
                <div class="prod-block__overflow">
                    <a href="#" class="prod-block__item">
                        <b class="prod-block__img prod-block__img-06"></b>
                        <!-- /.prod-block__img -->
                        <span class="prod-block__title">ФЕРМЕТИРОВАННЫЕ ЧАИ</span>
                        <!-- /.prod-block__title -->
                    </a>
                    <!-- /.prod-block__item -->
                </div>
                <!-- /.prod-block__overflow -->
            </div>
            <!-- /.prod-block -->
            <section class="cataloge">
                <div class="b-cataloge-content b-cataloge-content3">
                    <div class="inner" id="catalog-box">
                        <div class="b-product-list">
                            <div class="title-page3 title-page4"><?= strip_tags(\common\models\Boxes::getBoxName('hit'))?></div>

                            <?php if   ($catalogs):?>
                                <ul>
                                    <?php foreach ($catalogs as $catalog): ?>
                                        <? print_r($catalog->alias)?>
                                        <li data-composition_id="<?=$catalog->composition_id;?>" data-packing_id="<?=$catalog->packing_id;?>" data-weight_id="<?=$catalog->weight_id;?>" class="catd-text-catalog">
                                            <a href="/product/<?=$catalog->alias?>"><img src="/userfiles/gallery/<?php echo $catalog->basename?>.<?php echo $catalog->ext?>" alt=""></a>
                                            <div class="card-text__prise card-text__prise2"><b><?php echo \common\models\PricesValues::getPriceValue(1, $catalog->id)?></b> ваша цена</div>
                                            <!-- /.card-text__prise -->
                                            <div class="card-text__name"><?=$catalog->name;?></div>
                                            <!-- /.card-text__name -->
                                            <div class="card-text__info-card">Травяной чай с крымскими ягодами.</div>
                                            <!-- /.card-text__info-card -->
                                            <div class="card-text__weight">Вес: Сюда Достать вес г</div>
                                            <!-- /.card-text__weight -->
                                            <a href="#sotrudnichestvo" class="card-text__button fancybox"><?php echo \common\models\Elements::getValue(1);?></a>
                                            <!-- /.card-text__button -->
                                        </li> 
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>       
                        </div>
                    </div>
                </div>
                <div class="main-page-text">
                    <h1 class="main-page-title-box"><?= strip_tags(\common\models\Boxes::getBoxTitle('stevia_1'))?></h1>
                    <!-- /.main-page-text-title -->
                    <div class="text-box text-box-2 text-box-2-first">
                        <span class="main-page-text-title"><?= strip_tags(\common\models\Boxes::getBoxName('stevia_1'))?></span>
                        <!-- /.main-page-text-title -->
                        <?= strip_tags(\common\models\Boxes::getBox('stevia_1'))?></div>
                        <!-- /.text-box-2 -->
                        <div class="text-box text-box-2 text-box-2-last">
                            <?= strip_tags(\common\models\Boxes::getBox('stevia_2'))?></div>
                            <!-- /.text-box-2 -->
                            <div class="text-box text-box-3 text-box-3-first">
                                <span class="main-page-text-title"></span>
                                <!-- /.main-page-text-title -->
                                <?= strip_tags(\common\models\Boxes::getBox('stevia_3'))?>
                            </div>
                            <!-- /.text-box-3 -->
                            <div class="text-box text-box-3">
                                <div class="main-page-text-title"><?= strip_tags(\common\models\Boxes::getBoxName('stevia_4'))?></div>
                                <!-- /.main-page-text-title -->
                                <?= strip_tags(\common\models\Boxes::getBox('stevia_4'))?>
                            </div>
                            <!-- /.text-box-3 -->
                            <div class="text-box text-box-3 text-box-3-last">
                                <div class="main-page-text-title"><?= strip_tags(\common\models\Boxes::getBoxName('stevia_5'))?></div>
                                <!-- /.main-page-text-title -->
                                <?= strip_tags(\common\models\Boxes::getBox('stevia_5'))?>
                            </div>
                            <!-- /.text-box-3 -->
                        </div>
                        <!-- /.main-page-text -->
                    </section>
                    <div class="map">
                        <div class="title-page3 title-page4 title-page5"><?= strip_tags(\common\models\Boxes::getBoxName('geo_main'))?></div>
                        <div class="map-box">
                            <div class="b-map">
                                <div id="myMap"></div>
                            </div>
                        </div>
                        <!-- /.map-box -->
                    </div>
                    <!-- /.map -->
                </main>
            </div>