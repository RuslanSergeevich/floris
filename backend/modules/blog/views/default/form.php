<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\assets\CkEditorAsset;

/* @var $this yii\web\View */
/* @var $model common\models\News */
CkEditorAsset::register($this);

$this->title = 'Добавление/Редактирование статьи блога';
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
                            <?= $form->field($model, 'title') ?>
                            <?= $form->field($model, 'description') ?>
                            <?= $form->field($model, 'keywords') ?>
                            <?= $form->field($model, 'alias') ?>
                            <?php if($model->image){?>
                                <div class="image-box">
                                    <?= Html::img('@blog/'.$model->image, [
                                        'alt' => $model->name,
                                        'width' => '150',
                                        'data-blog_id' => $model->id
                                    ]) ?>
                                    <i class="fa fa-fw fa-close delete-image"></i>
                                </div>
                            <?php } ?>
                            <?= $form->field($model, 'file')->fileInput() ?>
                            <?= $form->field($model, 'text')->textarea() ?>
                            <?php if(!$model->isNewRecord):?>
                                <?= $form->field($model, 'publish')->checkbox(['class' => 'minimal']) ?>
                            <?php endif;?>
                            <?= $form->field($model, 'show_main')->checkbox(['class' => 'minimal']) ?>
                            <?= $form->field($model, 'pos')->hiddenInput() ?>
                            <div class="form-group">
                                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->registerJsFile(Url::toRoute('/lte/js/blog_bundle.js'),['depends'=>'yii\web\JqueryAsset']);?>