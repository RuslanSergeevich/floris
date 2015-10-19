<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\assets\CkEditorAsset;
use common\models\CatalogItems;

/* @var $this yii\web\View */
/* @var $model common\models\News */
CkEditorAsset::register($this);

$this->title = 'Добавление/Редактирование товара';
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
                            <?php if($model->isNewRecord){
                                echo $form->field($model, 'parent_id')->hiddenInput(['value' => Yii::$app->request->get('id')])->label(false);
                            } else {
                                echo $form->field($model, 'parent_id')->hiddenInput()->label(false);
                            }?>
                            <?= $form->field($model, 'gallery_cat_id')->dropDownList(CatalogItems::$galleries, ['class' => 'form-control select2'])?>
                            <?= $form->field($model, 'type_id')->dropDownList(CatalogItems::$types, ['class' => 'form-control select2'])?>
                            <?= $form->field($model, 'name') ?>
                            <?= $form->field($model, 'title') ?>
                            <?= $form->field($model, 'description') ?>
                            <?= $form->field($model, 'keywords') ?>
                            <?= $form->field($model, 'alias') ?>
                            <?= $form->field($model, 'text')->textarea() ?>
                            <?= $form->field($model, 'pos') ?>

                            <?php if(!$model->isNewRecord):?>
                                <?= $form->field($model, 'publish')->checkbox(['class' => 'minimal']) ?>
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
<?php $this->registerJsFile(Url::toRoute('/lte/js/catalog_items_bundle.js'),['depends'=>'yii\web\JqueryAsset']);?>