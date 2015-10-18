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
<section class="cataloge">
    <div class="cataloge-header"></div>
    <div class="cataloge-menu">
        <menu>
            <li class="active">
                <a href="#">Весь ассортимент</a>
            </li>
            <li>
                <a href="#">ТМ Floris</a>
            </li>
            <li>
                <a href="#">ТМ Легенды Крыма</a>
            </li>
            <li>
                <a href="#">Сладости</a>
            </li>
        </menu>
    </div>
    <div class="cataloge-filter">
        <div class="inner">
            <div class="comp fleft">
                <select>
                    <option value="">
                        Состав 1
                    </option>
                    <option value="">
                        Состав 2
                    </option>
                    <option value="">
                        Состав 3
                    </option>
                </select>
            </div>
            <div class="pack fleft">
                <select>
                    <option value="">
                        Упаковка 1
                    </option>
                    <option value="">
                        Упаковка 2
                    </option>
                    <option value="">
                        Упаковка 3
                    </option>
                </select>
            </div>
            <div class="weight fleft">
                <div class="spinner">
                    <p>
                        Масса упаковки нетто
                    </p>
                    <div class="slider filter-weight">
                        <ul>
                            <li>
                                0
                            </li>
                            <li>
                                175
                            </li>
                            <li class="active">
                                350
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="b-cataloge-content">
        <div class="inner">
            <div class="b-product-list">
                <h3>
                    Рассыпной чай
                </h3>
                <ul>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                </ul>
            </div>
            <div class="b-product-list">
                <h3>
                    Рассыпной чай
                </h3>
                <ul>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                </ul>
            </div>
            <div class="b-product-list">
                <h3>
                    Рассыпной чай
                </h3>
                <ul>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                </ul>
            </div>
            <div class="b-product-list">
                <h3>
                    Рассыпной чай
                </h3>
                <ul>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                </ul>
            </div>
            <div class="b-product-list">
                <h3>
                    Рассыпной чай
                </h3>
                <ul>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                    <li>
                        <a href="/product.html"><img src="/images/cataloge-product.png" alt="">Ромашка и шиповник</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>