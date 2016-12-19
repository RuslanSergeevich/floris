<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\CatalogItems;
use common\models\Catalog;

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
        <div class="breadcrumbs">
            <ul>
                <li class="breadcrumbs-item"><a class="breadcrumbs-link" href="/">Главная /</a></li>
                <li class="breadcrumbs-item"><a class="breadcrumbs-link">Каталог</a></li>
            </ul>
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

    <?= $this->render('/partials/_catalog_menu')?>
    <?= $this->render('/partials/_catalog_filter')?>
    <div class="b-cataloge-content">
        <div class="inner" id="catalog-box">

            <?php if ($catalogs = Catalog::find()->select('id,name,alias,text_under_name')->publish()->orderBy('pos ASC')->asArray()->all()):?>
                <?php foreach ($catalogs as $catalog): ?>
                    <div class="b-product-list">
                        <h1 class="title-page title-page2">
                             <a href="/cataloge/<?=$catalog['alias'];?>"><?=$catalog['name'];?></a>
                            <span><?=$catalog['text_under_name'];?></span>
                        </h1>
                        <ul>
                        <?php if ($items = CatalogItems::loadItemsOneImage($catalog['id'])): ?>
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
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>