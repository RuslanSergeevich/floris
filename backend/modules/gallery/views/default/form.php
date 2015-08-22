<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\assets\CkEditorAsset;
use common\models\Gallery;

CkEditorAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $images common\models\GalleryImages */

$this->title = 'Добавление/Редактирование галереи';
?>
<div class="row">
    <div class="col-md-8">

        <div class="box">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode($this->title)?></h3>
                </div><!-- /.box-header -->

                <?php $form = ActiveForm::begin(['method' => 'post', 'options' => ['role' => 'form']]); ?>
                    <div class="box-body">
                        <?= $form->field($model, 'parent_id')->dropDownList(Gallery::getListGallery($model->id), ['class' => 'form-control select2']) ?>
                        <?= $form->field($model, 'name') ?>
                        <?php if(!$model->isNewRecord):?>
                            <?= $form->field($model, 'publish')->checkbox(['class' => 'minimal']) ?>
                        <?php endif;?>
                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>


                <?php $formImage = ActiveForm::begin(['action' => Url::toRoute('multiupload'), 'id' => 'upload', 'options' => [
                            'enctype' => 'multipart/form-data',
                            'class' => 'dropzone dz-clickable'
                        ]]); ?>

                        <div class="form-group">
                            <div class="dz-message">
                                Перетащите сюда файлы или щелкните для загрузки изображений.<br><span class="fa fa-fw fa-cloud-upload icon-2x"></span>
                                <?= $formImage->field($images, 'file')->fileInput(['multiple' => true, 'class' => 'hidden'])->label(false) ?>
                                <?= Html::input('hidden', 'id', $model->id, ['id' => 'gallery_cat_id']) ?>
                            </div>
                        </div>

                <?php ActiveForm::end(); ?>

                <div class="box">
                    <div class="box-header">
                        <div class="title">Photo Gallery</div>
                    </div>
                    <div id="image_box">
                        <?= $this->render('blocks/_image_box', ['model' => $model])?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= Html::tag('div', '', ['id' => 'edit-image', 'class' => 'modal fade'])?>
<!-- /.modal -->
<?php $this->registerJsFile(Url::toRoute('/lte/plugins/select2/select2.full.min.js'),['depends'=>'backend\assets\AppAsset']);?>
<?php $this->registerJsFile(Url::toRoute('/lte/js/dropzone.js'),['depends'=>'yii\web\JqueryAsset']);?>
<?php $this->registerCssFile(Url::toRoute('/lte/css/dropzone.min.css'));?>
<?php $this->registerCssFile(Url::toRoute('/lte/css/jquery.jgrowl.min.css'));?>
<?php $this->registerJsFile(Url::toRoute('/lte/js/jquery.jgrowl.min.js'),['depends'=>'yii\web\JqueryAsset']);?>
<?php $this->registerJsFile(Url::toRoute('/lte/js/gallery_bundle.js'),['depends'=>'yii\web\JqueryAsset']);?>