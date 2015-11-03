<?php
/**
 * block frontend/views/blocks/_form_cooperation
 * Made for Floris
 * @author Alexandr Krasnopyorov <sanya-sliver@yandex.ru>
 */

use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $model frontend\models\CooperationForm */
/* @var $backCall frontend\models\BackCallForm */
/* @var $shopAdd common\models\Geography */
/* @var $images common\models\GeographyImages */
?>
<div class="popups" style="display: none;">
    <div id="sotrudnichestvo" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                МЫ ВСЕГДА ОТКРЫТЫ ДЛЯ СОТРУДНИЧЕСТВА<br>С НОВЫМИ ПАРТНЁРАМИ
            </div>
            <?php $form = ActiveForm::begin([
                'action' => \yii\helpers\Url::toRoute('site/send'),
            ])?>
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите имя', 'class' => 'name'])->label(false)->error(false)?>
            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Номер телефона', 'class' => 'phone'])->label(false)->error(false)?>
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Электронный адрес', 'class' => 'email'])->label(false)->error(false)?>
            <?= $form->field($model, 'body')->textarea(['placeholder' => 'Укажите пожалуйста вкратце тему сотрудничества'])->label(false)->error(false)?>
            <input class="btn border" type="submit" value="ОТПРАВИТЬ">
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div id="backcall" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                ЗАПОЛНИТЕ СВОИ ДАННЫЕ<br>И МЫ СКОРО СВЯЖЕМСЯ С ВАМИ
            </div>
            <?php $form = ActiveForm::begin([
                'action' => \yii\helpers\Url::toRoute('site/backcall'),
            ])?>
            <?= $form->field($backCall, 'name')->textInput(['placeholder' => 'Введите имя', 'class' => 'name'])->label(false)->error(false)?>
            <?= $form->field($backCall, 'phone')->textInput(['placeholder' => 'Номер телефона', 'class' => 'phone'])->label(false)->error(false)?>
            <input class="btn border" type="submit" value="ОТПРАВИТЬ">
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div id="search-shop" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                ЗАПОЛНИТЕ ВСЕ ПОЛЯ ДЛЯ ЭФФЕКТИВНОГО ПОИСКА<br>ВАШЕГО МАГАЗИНА
            </div>
            <?php $form = ActiveForm::begin([
                'action' => \yii\helpers\Url::toRoute('site/shopadd'),
                'options' => ['enctype' => 'multipart/form-data']
            ])?>
            <?= $form->field($shopAdd, 'country')->textInput(['placeholder' => 'Страна', 'class' => 'contry'])->label(false)->error(false)?>
            <?= $form->field($shopAdd, 'shop_name')->textInput(['placeholder' => 'Название магазина', 'class' => 'shop-name'])->label(false)->error(false)?>
            <?= $form->field($shopAdd, 'city')->textInput(['placeholder' => 'Город', 'class' => 'city'])->label(false)->error(false)?>
            <?= $form->field($shopAdd, 'fio')->textInput(['placeholder' => 'ФИО', 'class' => 'name'])->label(false)->error(false)?>
            <?= $form->field($shopAdd, 'address')->textInput(['placeholder' => 'Адрес', 'class' => 'adress'])->label(false)->error(false)?>
            <?= $form->field($shopAdd, 'phone')->textInput(['placeholder' => 'Номер телефона', 'class' => 'phone'])->label(false)->error(false)?>
            <?= $form->field($shopAdd, 'mode')->textInput(['placeholder' => 'Режим работы', 'class' => 'work-time'])->label(false)->error(false)?>
            <?= $form->field($shopAdd, 'email')->textInput(['placeholder' => 'Электронный адрес', 'class' => 'email'])->label(false)->error(false)?>
            <?= $form->field($images, 'files[]')->fileInput(['class' => 'hidden', 'multiple' => true, 'accept' => 'image/*'])->label(false)->error(false)?>
            <div class="clear"></div>
            <div class="added-imgs">
                <img src="/images/popups/added-img.png" alt=""><img src="/images/popups/added-img.png" alt=""><img src="/images/popups/added-img.png" alt="">
            </div>
            <p>
                <a href="#" id="fileInputTrigger">Загрузите</a> три фотографии: общий вид магазина<br>и наша продукция на полке
            </p>
            <input class="btn border" type="submit" value="ДОБАВИТЬ">
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>