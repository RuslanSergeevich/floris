<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogItems */
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
<section class="product">
    <div class="product-header"></div>
    <div class="cataloge-menu">
        <menu>
            <li>
                <a href="#">Весь ассортимент</a>
            </li>
            <?php if ($types = \common\models\Types::getList()):
                ArrayHelper::remove($types, 0);?>
                <?php foreach ($types as $key => $value): ?>
                <?= Html::tag('li', Html::tag('a', $value, [
                    'href' => '#']), [
                    'class' => $key == $model->type_id ? 'active' : ''
                ])?>
            <?php endforeach; ?>
            <?php endif; ?>
        </menu>
    </div>
    <div class="product-selecter">
        <div class="b-top">
            Чай в фильтр-пакетах
        </div>
        <div class="inner">
            <ul>
                <li>
                    <img src="/images/product/slider-img-prod.png" alt="">
                </li>
                <li>
                    <img src="/images/product/slider-img-prod.png" alt="">
                </li>
                <li>
                    <img src="/images/product/slider-img-prod.png" alt="">
                </li>
                <li>
                    <img src="/images/product/slider-img-prod.png" alt="">
                </li>
                <li>
                    <img src="/images/product/slider-img-prod.png" alt="">
                </li>
                <li>
                    <img src="/images/product/slider-img-prod.png" alt="">
                </li>
                <li>
                    <img src="/images/product/slider-img-prod.png" alt="">
                </li>
            </ul>
        </div>
    </div>
    <div class="inner">
        <div class="product-card">
            <div class="img">

                <?= Html::ul(\common\models\GalleryImages::getImages($model->gallery_cat_id), ['item' => function($item, $index) {
                    return Html::tag(
                        'li',
                        Html::a(Html::img('@gallery/' . $item['basename'] .'.'. $item['ext'],
                            ['alt' => '', 'rel' => 'product']),
                            Yii::getAlias('@gallery/'.$item['basename'] .'.'. $item['ext']),
                            [
                                'class' => 'fancybox'
                            ])
                    );
                }]) ?>
            </div>
            <div class="description">
                <div class="top">
                    <div class="social">
                        <a class="fb" href="#" target="_blank"></a><a class="insta" href="#" target="_blank"></a><a class="vk" href="#" target="_blank"></a>
                    </div>
                    <h2>
                        Инди<span>Чай в фильтр-пакетах</span>
                    </h2>
                </div>
                <div class="b-text">
                    <p>
                        Описание Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p class="bold">
                        Состав:
                    </p>
                    <p>
                        Описание Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <ul>
                        <li>
                            <img src="/images/icons/kartochka/ves.svg" alt="" height="50">
                            <p>
                                40 г
                            </p>
                        </li>
                        <li>
                            <img src="/images/icons/kartochka/min.svg" alt="" height="50">
                            <p>
                                5 мин.
                            </p>
                        </li>
                        <li>
                            <img src="/images/icons/kartochka/porcii.svg" alt="" height="50">
                            <p>
                                20 порций
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="logistic-info fright">
                    <select>
                        <option value="">
                            Логистическая информация 1
                        </option>
                        <option value="">
                            Логистическая информация 2
                        </option>
                    </select>
                </div>
                <a class="btn green" href="#">КУПИТЬ ОПТОМ</a>
            </div>
        </div>
    </div>
</section>