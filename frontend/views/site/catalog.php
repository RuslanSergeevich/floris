<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use frontend\components\DDWidget;
use common\models\Composition;
use common\models\Packing;
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
            <div id="data-composition_id" class="hidden">0</div>
            <div id="data-packing_id" class="hidden">0</div>
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
                        <?= Html::ul(\common\models\Weight::find()->orderBy('pos ASC')->all(), ['item' => function($item, $index) {
                            return Html::tag(
                                'li',
                                $item['name'],
                                ['class' => $index == 0 ? 'active' : '',
                                'data-weight_id' => $item['name'] == 0 ? 0 : $item['id']]
                            );
                        }]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="b-cataloge-content">
        <div class="inner" id="catalog-box">

            <?php if ($catalogs = Catalog::find()->select('id,name')->publish()->asArray()->all()):?>
                <?php foreach ($catalogs as $catalog): ?>
                    <div class="b-product-list">
                        <h3>
                            <?= $catalog['name']?>
                        </h3>
                        <?php if ($items = CatalogItems::loadItemsOneImage($catalog['id'])): ?>
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
                                        'data-type_id' => $item['type_id']
                                    ]
                                );
                            }]) ?>
                        <?php endif;?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>