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
    <div class="cataloge-header"></div>
    <?= $this->render('/partials/_catalog_menu')?>
    <?= $this->render('/partials/_catalog_filter')?>
    <div class="b-cataloge-content">
        <div class="inner" id="catalog-box">

            <?php if ($items = CatalogItems::loadItemsOneImage($model['id'])): ?>
                <div class="b-product-list">
                    <h3><?= $model['name']?></h3>
                    <?= Html::ul($items, ['item' => function($item, $index) {
                        $img = isset($item['galleryImages'][0]['basename']) ? Html::img('@gallery/'.$item['galleryImages'][0]['basename'].'.'.$item['galleryImages'][0]['ext']) : '';
                        return Html::tag(
                            'li',
                            Html::a($img . $item['name'],
                                Url::toRoute(['product/view', 'alias' => $item['alias']])),
                            [
                                'data-composition_id' => $item['composition_id'],
                                'data-packing_id' => $item['packing_id'],
                                'data-weight_id' => $item['weight_id'],
                                //'data-type_id' => $item['type_id']
                            ]
                        );
                    }]) ?>
                </div>
            <?php endif;?>

        </div>
    </div>
</section>