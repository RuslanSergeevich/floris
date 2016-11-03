<?php

use yii\helpers\Html;
use yii\helpers\Url;
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
<section class="cataloge">
    <div class="cataloge-header"></div>
    <?= $this->render('/partials/_catalog_menu',[
        'alias' => $model->alias
    ])?>
    <?= $this->render('/partials/_catalog_filter')?>
    <div class="b-cataloge-content">
        <div class="inner" id="catalog-box">

            <?php if ($items = CatalogItems::loadItemsOneImageByType($model['id'])): ?>
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
                                <div class="card-text__prise card-text__prise2"><b><?php echo \common\models\PricesValues::getPriceValue(1, $item['id'])?></b>ваша цена</div>
                                <!-- /.card-text__prise -->
                                <div class="card-text__name"><?=$item['name'];?></div>
                                <!-- /.card-text__name -->
                                <div class="card-text__info-card"><span><?= \common\models\Packing::getValueById($item->packing_id)?></span></div>
                                <!-- /.card-text__info-card -->
                                <div class="card-text__weight"><?= \common\models\Weight::getValueById($item->weight_id)?> г</div>
                                <!-- /.card-text__weight -->
                                <a href="#sotrudnichestvo" class="card-text__button fancybox">ОПТОМ</a>
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