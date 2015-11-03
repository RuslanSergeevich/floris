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
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Номер телефона', 'class' => 'phone'])->label(false)->error(false)?>
            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Электронный адрес', 'class' => 'email'])->label(false)->error(false)?>
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
            <form>
                <input class="contry" type="text" placeholder="Страна"><input class="shop-name" type="text" placeholder="Название магазина"><input class="city" type="text" placeholder="Город"><input class="name" type="text" placeholder="ФИО"><input class="adress" type="text" placeholder="Адрес"><input class="phone" type="text" placeholder="Номер телефона"><input class="work-time" type="text" placeholder="Режим работы"><input class="email" type="text" placeholder="Электронный адрес">
                <div class="added-imgs">
                    <img src="/images/popups/added-img.png" alt=""><img src="/images/popups/added-img.png" alt=""><img src="/images/popups/added-img.png" alt="">
                </div>
                <p>
                    <a href="#">Загрузите</a> три фотографии: общий вид магазина<br>и наша продукция на полке
                </p>
                <input class="btn border" type="submit" value="ДОБАВИТЬ">
            </form>
        </div>
    </div>
</div>