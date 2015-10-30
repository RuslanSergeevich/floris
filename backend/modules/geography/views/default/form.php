<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\CkEditorAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Geography */
CkEditorAsset::register($this);

$this->title = 'Добавление/Редактирование географии точек продаж';
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
                            <?= $form->field($model, 'address') ?>
                            <?= $form->field($model, 'file')->fileInput() ?>
                            <?php if($model->image){?>
                                <div class="image-box">
                                    <?= Html::img('@geography/'.$model->image, [
                                        'alt' => $model->name,
                                        'width' => '150',
                                        'data-blog_id' => $model->id
                                    ]) ?>
                                </div>
                                <hr />
                            <?php } ?>
                            <div class="form-group">
                                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>