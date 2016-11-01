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
    <?= $this->render('/partials/_catalog_menu')?>
    <?= $this->render('/partials/_catalog_filter')?>
    <div class="b-cataloge-content">
        <div class="inner" id="catalog-box">

            <?php if ($catalogs = Catalog::find()->select('id,name,alias')->publish()->orderBy('pos ASC')->asArray()->all()):?>
                <?php foreach ($catalogs as $catalog): ?>
                    <div class="b-product-list">
                    <?= Html::a($catalog['name'], Url::toRoute(['catalog/view', 'alias' => $catalog['alias']]), ['class' => 'cat__name'])?>
                        <ul>
                        <?php if ($items = CatalogItems::loadItemsOneImage($catalog['id'])): ?>
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
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>