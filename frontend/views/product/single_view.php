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
    <div class="product-selecter">
        <div class="b-top">
            <?= \common\models\Packing::getValueById($model->packing_id)?>
        </div>
        <div class="inner">
            <?= Html::ul(\common\models\CatalogItems::getItemsByPacking($model->packing_id,$model->id), ['item' => function($item) {
                $img = isset($item['galleryImages'][0]['basename']) ? Html::img('@gallery/'.$item['galleryImages'][0]['basename'].'.'.$item['galleryImages'][0]['ext']) : '';
                return Html::tag(
                    'li',
                    Html::a($img, \yii\helpers\Url::to(['product/view', 'alias' => $item['alias']]))
                );
            }]) ?>
        </div>
    </div>
    <div class="inner">
        <div class="product-card">
            <div class="img">
                <?= Html::ul($model['galleryImages'], ['item' => function($item) {
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
                        <?= Html::a('','https://www.facebook.com/floristea/',['class' => 'fb', 'target' => '_blank'])?>
                        <?= Html::a('','https://www.instagram.com/floristea/',['class' => 'insta', 'target' => '_blank'])?>
                        <?= Html::a('','http://vk.com/floristea',['class' => 'vk', 'target' => '_blank'])?>
                    </div>
                    <h2>
                        <?= $model->name?><span><?= \common\models\Packing::getValueById($model->packing_id)?></span>
                    </h2>
                </div>
                <div class="b-text">
                    <?= $model->text?>
                    <ul class="logistic-info">
                        <?php if($model->weight_id):?>
                        <li>
                            <img src="/images/icons/kartochka/ves.svg" alt="" height="50">
                            <p>
                                <?= \common\models\Weight::getValueById($model->weight_id)?> г
                            </p>
                        </li>
                        <?php endif;?>
                        <?php if($model->time):?>
                            <li>
                                <img src="/images/icons/kartochka/min.svg" alt="" height="50">
                                <p>
                                    <?= $model->time?>
                                </p>
                            </li>
                        <?php endif;?>
                        <?php if($model->portions):?>
                            <li>
                                <img src="/images/icons/kartochka/porcii.svg" alt="" height="50">
                                <p>
                                    <?= $model->portions?>
                                </p>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
                <a class="btn green fancybox" href="#sotrudnichestvo">КУПИТЬ ОПТОМ</a>
            </div>
        </div>
    </div>
</section>