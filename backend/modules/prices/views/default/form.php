<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\CkEditorAsset;
use common\models\Catalog;
use common\models\CatalogItems;
use common\models\PricesValues;

/* @var $this yii\web\View */
/* @var $model common\models\Prices */
CkEditorAsset::register($this);

$this->title = 'Добавление/Редактирование прайса';
?>

<div class="row">
    <div class="col-md-12">

        <div class="box">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode($this->title)?></h3>
                </div><!-- /.box-header -->
                    <?php $form = ActiveForm::begin(['method' => 'post', 'options' => ['role' => 'form', 'enctype' => 'multipart/form-data']]); ?>
                        <div class="box-body">
                            <?= $form->field($model, 'name') ?>

                            <?php if (!$model->isNewRecord && $catalogs = Catalog::find()->select('id,name')->publish()->orderBy('pos ASC')->asArray()->all()):?>
                            <table id="price">
                                <tbody>
                                <tr class="head">
                                    <td class="col-name">
                                        Наименование
                                    </td>
                                    <td class="col-price">
                                        Цена
                                    </td>
                                </tr>
                                    <?php foreach($catalogs as $catalog):?>
                                        <tr class="pos-title">
                                            <td colspan="2">
                                                <?= $catalog['name']?>
                                            </td>
                                        </tr>
                                        <?php if ($items = CatalogItems::getItemsByParentId($catalog['id'])):?>
                                            <?php foreach($items as $item):?>
                                                <tr>
                                                    <td class="col-name">
                                                        <div class="product-name">
                                                            <?= $item['name']?>
                                                        </div>
                                                    </td>
                                                    <td class="col-price">
                                                        <?= Html::input('text', 'Products['.$item['id'].']', PricesValues::getPriceValue($model['id'], $item['id']))?>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <?php endif;?>
                            <div class="form-group">
                                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>