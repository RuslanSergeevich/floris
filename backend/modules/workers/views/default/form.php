<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\CkEditorAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Composition */
CkEditorAsset::register($this);

$this->title = 'Добавление/Редактирование информации о сотруднике компании';
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
                            <?= $form->field($model, 'appointment') ?>
                            <?= $form->field($model, 'file')->fileInput() ?>
                            <?php if($model->image){?>
                                <div class="image-box">
                                    <?= Html::img('@workers/'.$model->image, [
                                        'alt' => $model->name,
                                        'width' => '100',
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