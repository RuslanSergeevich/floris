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
<div id="video">
    <a class="close"></a>
    <video id="video-frame" autostart loop>
        <source src="/video/tea.mp4" type="video/mp4; codecs="avc1.42E01E, mp4a.40.2"">
        <source src="/video/tea.webm" type="video/webm">
        <source src="/video/tea.ogv" type="video/ogg">
    </video>
</div>
<main>
    <section class="b1 top-section" style="background-image: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['we_produce']['image']?>')">
        <div class="title">
            <?= $model->boxes['we_produce']['title']?>
            <?= Html::a('ПОДРОБНО О КОМПАНИИ', Url::to($model->boxes['we_produce']['link']),['class' => 'btn'])?>
            <a class="play-video" href="#video"></a>
        </div>
    </section>
    <section class="b2">
        <div class="b-list-product">
            <?= Html::ul(\common\models\Packing::getListMain(), ['item' => function($item, $index) {
                return Html::tag(
                    'li',
                    Html::img('@packing/' . $item['image']),
                    [
                        'data-product' => 'product-' . $index,
                        'class'        => $index == 0 ? 'active' : ''
                    ]
                );
            }]) ?>
        </div>
        <?php if ($models = \common\models\Packing::getListMain()): ?>
            <?php foreach ($models as $key => $value): ?>
                <div class="choise-product b-left product-<?= $key?> <?= $key == 0 ? 'active' : ''?>">
                    <div class="title">
                        <?= $value['title_main']?>
                    </div>
                    <div class="b-text">
                        <div class="sub-title">
                            <?= $value['declination']?>
                        </div>
                        <?= $value['text']?>
                        <?= Html::a('В КАТАЛОГ', Url::to('cataloge'),['class' => 'btn'])?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
    <?php if(isset($model->boxes['tea_production'])):?>
    <section class="b3" style="background-image: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['tea_production']['image']?>')">
        <div class="title">
            <?= $model->boxes['tea_production']['title']?>
        </div>
        <div class="btns">
            <?= Html::a('ПОДРОБНЕЕ', Url::to($model->boxes['tea_production']['link']),['class' => 'btn btn-ico'])?>
        </div>
    </section>
    <?php endif;?>
    <?php if(isset($model->boxes['interesting_article'])):?>
    <section class="b4" style="background-image: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['interesting_article']['image']?>')">
        <div class="b-left">
            <div class="title left">
                <?= $model->boxes['interesting_article']['title']?>
                <div class="btns">
                    <?= Html::a('ЧИТАТЬ БЛОГ', Url::to($model->boxes['interesting_article']['link']),['class' => 'btn blog btn-ico'])?>
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
    <?php endif;?>
    <section class="b5" style="background-image: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['geography']['image']?>')">
        <div class="title">
            ГЕОГРАФИЯ ТОЧЕК ПРОДАЖ
        </div>
        <ul>
            <?php if(isset($model->boxes['geography'])):?>
            <li>
                <div class="title">
                    <?= $model->boxes['geography']['title']?>
                </div>
                <?= $model->boxes['geography']['text']?>
                <?= Html::a('Найти', Url::to($model->boxes['geography']['link']),['class' => 'btn'])?>
            </li>
            <?php endif;?>
            <?php if(isset($model->boxes['geography_02'])):?>
            <li>
                <div class="title">
                    <?= $model->boxes['geography_02']['title']?>
                </div>
                <?= $model->boxes['geography_02']['text']?>
                <?= Html::a('ДОБАВИТЬ МАГАЗИН', Url::to($model->boxes['geography_02']['link']),['class' => 'btn fancybox'])?>
            </li>
            <?php endif;?>
        </ul>
    </section>
</main>