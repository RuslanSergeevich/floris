<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\CkEditorAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Types */
CkEditorAsset::register($this);

$this->title = 'Добавление/Редактирование типа';
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
                            <?= $form->field($model, 'text_under_name') ?>
                            <?= $form->field($model, 'title') ?>
                            <?= $form->field($model, 'description') ?>
                            <?= $form->field($model, 'keywords') ?>
                            <?= $form->field($model, 'alias') ?>
                            <?= $form->field($model, 'pos') ?>
                            <?= $form->field($model, 'text')->textarea() ?>
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
<?php $this->registerJs('(function(){$("input[type=\'checkbox\'].minimal, input[type=\'radio\'].minimal").iCheck({
    checkboxClass: "icheckbox_minimal-blue",
    radioClass: "iradio_minimal-blue"
}); jQuery("textarea").ckeditor();})();');?>