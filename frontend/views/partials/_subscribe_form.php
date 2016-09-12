<?php
use yii\widgets\ActiveForm;

/* @var $model common\models\Subscribers */

$form = ActiveForm::begin([
    'id' => 'subscribe-form',
    'action' => '/subscribe'
]);?>
<?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите ваш e-mail'])->label(false)?>
    <input class="btn border" type="submit" value="ПОДПИСАТЬСЯ">
<?php ActiveForm::end()?>