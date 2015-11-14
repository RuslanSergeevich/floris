<?php
use yii\widgets\ActiveForm;

/* @var $model frontend\models\SearchModel */

$form = ActiveForm::begin([
    'action' => '/search',
    'method' => 'post'
]);?>
<?= $form->field($model, 'keywords')->textInput(['placeholder' => 'Поиск...'])->label(false)->error(false)?>
    <input type="submit" value="">
<?php ActiveForm::end()?>