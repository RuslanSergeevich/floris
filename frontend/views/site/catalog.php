<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\components\DDWidget;
use common\models\Composition;
use common\models\Packing;

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
            <?php if ($model = \common\models\Types::getList()):
                ArrayHelper::remove($model, 0);?>
                <?php foreach ($model as $key => $value): ?>
                    <?= Html::tag('li', Html::tag('a', $value, ['href' => '#', 'data-type_id' => $key]))?>
                <?php endforeach; ?>
            <?php endif; ?>
        </menu>
    </div>
    <div class="cataloge-filter">
        <div class="inner">
            <?= DDWidget::widget([
                'model' => Composition::getList(),
                'css_class' => 'comp',
                'entity_db' => 'data-composition_id'
            ])?>
            <?= DDWidget::widget([
                'model' => Packing::getList(),
                'css_class' => 'pack',
                'entity_db' => 'data-packing_id'
            ])?>
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
                            <li>
                                525
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