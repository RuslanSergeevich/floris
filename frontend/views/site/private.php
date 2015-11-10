<?php

use yii\helpers\Html;
use yii\helpers\Url;

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
<main class="privat">
    <section class="top b-top-section top-section" style="background-image: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['we_produced_and_packaged_tea']['image']?>');">
        <div class="title">
            <?= $model->boxes['we_produced_and_packaged_tea']['title']?>
            <div class="sub-title">
                <?= strip_tags($model->boxes['we_produced_and_packaged_tea']['text'])?>
            </div>
        </div>
    </section>
    <section class="type-of-tea">
        <div class="inner">
            <div class="title">
                Разновидности чая
            </div>
            <?= Html::ul(\common\models\VarietiesOfTea::getList(), ['item' => function($item, $index) {
                return Html::tag(
                    'li',
                    Html::tag('div',Html::img('@varieties_of_tea/' . $item['image']),['class' => 'img']) . Html::tag('p',$item['name'])
                );
            }])?>
        </div>
    </section>
    <section class="components" style="background-image: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['65_different_components']['image']?>');">
        <div class="inner">
            <?php if(isset($model->boxes['65_different_components'])):?>
            <div class="count">
                <?= $model->boxes['65_different_components']['title']?>
            </div>
            <div class="text">
                <?= $model->boxes['65_different_components']['text']?>
            </div>
            <div class="center">
                <?= Html::a('ПОДРОБНЕЕ', Url::to($model->boxes['65_different_components']['link']),['class' => 'btn'])?>
            </div>
            <?php endif;?>
        </div>
    </section>
    <section class="type-of-product">
        <div class="inner">
            <div class="title">
                Разновидности продукции
            </div>
            <?= Html::ul(\common\models\VarietyOfProducts::getList(), ['item' => function($item, $index) {
                return Html::tag(
                    'li',
                    Html::tag('div',Html::img('@variety_of_products/' . $item['image']),['class' => 'img']) . Html::tag('p',$item['name'])
                );
            }])?>
        </div>
    </section>
    <section class="privat-label" style="background-image: url('<?= Yii::getAlias('@boxes') .'/'. $model->boxes['bg_private_label']['image']?>');">
        <div class="inner">
            <div class="title">
                <?= $model->boxes['bg_private_label']['title']?>
            </div>
            <?= Html::ul(\common\models\CaruselPrivateLabel::getList(), ['item' => function($item, $index) {
                return Html::tag(
                    'li',
                    Html::tag('div', ($index + 1), ['class' => 'count']) . Html::tag('div', $item['name'] . $item['text'], ['class' => 'text'])
                );
            }, 'class' => 'slider'])?>
            <div class="bottom-text">
                <?php if(isset($model->boxes['why_should_you_order'])):?>
                    <div class="title">
                        <?= $model->boxes['why_should_you_order']['title']?>
                    </div>
                <?php endif;?>

                <ul>
                    <li>
                        <div class="sub-title">
                            <?= $model->boxes['full_cycle']['title']?>
                        </div>
                        <?= $model->boxes['full_cycle']['text']?>
                    </li>
                    <li>
                        <div class="sub-title">
                            <?= $model->boxes['free_storage']['title']?>
                        </div>
                        <?= $model->boxes['free_storage']['text']?>
                    </li>
                    <li>
                        <div class="sub-title">
                            <?= $model->boxes['free_storage']['title']?>
                        </div>
                        <?= $model->boxes['free_storage']['text']?>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="tasks">
        <div class="inner">
            <div class="title">
                <?= $model->boxes['tasks_that_we_solve']['title']?>
            </div>
            <?= $model->boxes['tasks_that_we_solve']['text']?>
        </div>
    </section>
    <section class="geography-sale">
        <div class="inner center">
            <div class="text">
                <?= $model->boxes['learn_more_private']['title']?>
            </div>
            <?= Html::a('ПОДРОБНЕЕ', Url::to($model->boxes['learn_more_private']['link']),['class' => 'btn green'])?>
        </div>
    </section>
    <section class="cases">
        <div class="inner">
            <div class="title">
                Наши кейсы
            </div>
            <?= Html::ul(\common\models\OurCase::getList(), ['item' => function($item, $index) {
                return Html::tag(
                    'li',
                    Html::tag('div',Html::img('@our_case/' . $item['image']), ['class' => 'img']) .
                    Html::tag('div', Html::tag('h3',$item['name']) . $item['text'], ['class' => 'desc'])
                );
            }])?>
        </div>
    </section>
</main>