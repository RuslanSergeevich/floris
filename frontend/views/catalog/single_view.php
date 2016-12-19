<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use frontend\components\DDWidget;
use common\models\Composition;
use common\models\Packing;
use common\models\CatalogItems;
use common\models\Catalog;
use common\models\Weight;

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
    <div class="cataloge-header cataloge-header2" <?php if(!empty($model->image)):?> style="background:url(/userfiles/catalog/<?=$model->image;?>) 50% 50% no-repeat; background-size: cover; height: 300px;"<?php endif;?>>
        <div class="cataloge-header__text">
            <div class="cataloge-header__title"><?=$model->title_on_top?></div>
            <!-- /.cataloge-header__title -->
            <?=$model->text_on_top?>
        </div>
    <!-- /.cataloge-header__text -->
    </div>
    <?php if(isset($this->params['bread_type'])):?>
        <div class="breadcrumbs">
        <ul>
        <li class="breadcrumbs-item"><a class="breadcrumbs-link" href="/">Главная /</a></li>
        <li class="breadcrumbs-item"><a class="breadcrumbs-link" href="/cataloge">Каталог /</a></li>
        <?php if($this->params['bread_type'] == 'catalog'):?>
            <li class="breadcrumbs-item"><a class="breadcrumbs-link" style="cursor: default" onclick="return false;"><?php echo $this->params['name']?></a></li>
        <?php else:?>
            <li class="breadcrumbs-item"><a class="breadcrumbs-link" href="/cataloge/<?php echo $this->params['parent']->alias?>"><?php echo $this->params['parent']->name?> /</a></li>
            <li class="breadcrumbs-item"><a class="breadcrumbs-link" style="cursor: default" onclick="return false;"><?php echo $this->params['name']?></a></li>
        <?php endif;?>
        </ul>
        </div>
    <?php endif;?>
    <?//= $this->render('/partials/_catalog_menu')?>
    <?//= $this->render('/partials/_catalog_filter')?>
    <div class="b-cataloge-content">
        <div class="inner" id="catalog-box">
            <?php if ($items = CatalogItems::loadItemsOneImage($model['id'])): ?>
                <div class="b-product-list">
                        <h1 class="title-page title-page2">
                            <?= $model['name']?>
                            <span><?= $model['text_under_name']?></span>
                        </h1>
                        <?php if($items):?>
                            <ul>
                            <?php foreach($items as $item):?>
                                <li data-composition_id="<?=$item['composition_id'];?>" data-packing_id="<?=$item['packing_id'];?>" data-weight_id="<?=$item['weight_id'];?>" class="catd-text-catalog">
                                    <a href="/product/<?=$item['alias']?>"><img src="<?='/userfiles/gallery/'.$item['galleryImages'][0]['basename'].'.'.$item['galleryImages'][0]['ext']?>" alt=""></a>
                                    <div class="additional-price"><b><?php echo \common\models\PricesValues::getPriceValue(2, $item['id'])?></b>цена розничная</div>
                                    <div class="card-text__prise card-text__prise2"><b><?php echo \common\models\PricesValues::getPriceValue(1, $item['id'])?></b> цена оптовая</div>
                                    <!-- /.card-text__prise -->
                                    <div class="card-text__name"><?=$item['name'];?></div>
                                    <!-- /.card-text__name -->
                                    <?php if(!empty($item['short_desc'])): ?>
                                        <div class="card-text__info-card"><span><?=$item['short_desc']?></span></div>
                                        <!-- /.card-text__info-card -->
                                    <?php endif;?>
                                    <div class="card-text__weight">Вес: <?= \common\models\Weight::getValueById($item->weight_id)?> г</div>
                                    <!-- /.card-text__weight -->
                                    <a href="#sotrudnichestvo" class="card-text__button fancybox"><?php echo \common\models\Elements::getValue(1);?></a>
                                    <!-- /.card-text__button -->
                                </li>    
                            <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                </div>
            <?php endif;?>

        </div>
        <div class="seo_text">
            <?= $model->text?>
        </div>
    </div>
</section>