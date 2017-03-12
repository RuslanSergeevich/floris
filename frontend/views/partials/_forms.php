<?php
/**
 * block frontend/views/blocks/_form_cooperation
 * Made for Floris
 * @author Alexandr Krasnopyorov <sanya-sliver@yandex.ru>
 */

use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $model common\models\Orders */
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
            <?= $form->field($model, 'message')->textarea(['placeholder' => 'Укажите пожалуйста вкратце тему сотрудничества'])->label(false)->error(false)?>
            <input class="btn border" type="submit" onclick="yaCounter34978440.reachGoal('cooperation'); return true;" value="ОТПРАВИТЬ">
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
            <input class="btn border" onclick="yaCounter34978440.reachGoal('callback'); return true;" type="submit" value="ОТПРАВИТЬ">
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
            <input class="btn border" onclick="yaCounter34978440.reachGoal('addshop'); return true;" type="submit" value="ДОБАВИТЬ">
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<div id="feedback-popup" class="popup">
    <div class="popup-head"></div>
    <div class="popup-content">
        <div class="title">
            На ваш контактный e-mail было отправленно письмо, перейдите по ссылке для просмотра оптовых цен.
        </div>
        <div class="feedback-popup-link">
            <button class="btn feedback-popup-btn">ОК</button>
        </div>
    </div>
</div>
<div id="get-price" class="popup">
    <div class="popup-close"></div>
    <div class="popup-head"></div>
    <div class="popup-content">
        <div class="title">
            Введите ваши данные и прайс-лист откроется автоматически
        </div>
        <form id="w33" action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
            <div class="get-price-input">
                <input type="text" id="orders-email2" class="email" name="email" placeholder="Ваш e-mail" required>
            </div>
            <div class="confident">
                <input type="checkbox" class="confirm" name="confirm" checked>
                <span>Я даю свою согласие на обработку персональный данных и соглашаюсь с условиями и политикой конфидециальности</span>
            </div>
            <input type="hidden" name="campaign_token" value="pEIMz" />
        </form>
        <input class="send_form_ajax btn modal-button" type="submit" value="ОК">
    </div>
</div>