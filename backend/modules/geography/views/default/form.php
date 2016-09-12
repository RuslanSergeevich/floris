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
                    <?php $form = ActiveForm::begin(['method' => 'post', 'options' => ['role' => 'form', 'enctype' => 'multipart/form-data', 'id' => 'geography__form']]); ?>
                        <div class="box-body">
                            <?= $form->field($model, 'country') ?>
                            <?= $form->field($model, 'city') ?>
                            <?= $form->field($model, 'address') ?>
                            <?= $form->field($model, 'mode') ?>
                            <?= $form->field($model, 'shop_name') ?>
                            <?= $form->field($model, 'fio') ?>
                            <?= $form->field($model, 'phone') ?>
                            <?= $form->field($model, 'email') ?>
                            <?= $form->field($model, 'publish')->checkbox(['class' => 'minimal']) ?>
                            <?php if ($images = \common\models\GeographyImages::getImages($model->id)): ?>
                                <hr />
                                <?php foreach ($images as $img): ?>
                                    <div class="box-i">
                                    <?= Html::img('@geography/' . $img['basename'] . '.' . $img['ext'], ['class' => 'geography_images'])?>
                                    <?= Html::a('<i class="fa fa-fw fa-remove"></i>',\yii\helpers\Url::toRoute(['delete-img', 'id' => $img['id']]), ['class' => 'delete-img'])?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="clear"></div>
                                <hr />
                            <?php endif; ?>
                            <div class="form-group">
                                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->registerJs('$(".delete-img").click(function(e){e.preventDefault(); var _this = $(this); $.post(_this.attr("href"), function(){_this.closest("div.box-i").fadeOut();});});$(\'input[type="checkbox"].minimal, input[type="radio"].minimal\').iCheck({
        checkboxClass: "icheckbox_minimal-blue",
        radioClass: "iradio_minimal-blue"
    });');?>