<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Catalog;
use common\models\CatalogItems;
use common\models\PricesValues;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
$this->title = Html::encode($model->title);
$this->registerMetaTag([
    'name' => 'description',
    'content' => Html::encode($model->description),
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => Html::encode($model->keywords)
]);
?>
<div id="wrapper">
    <!-- /.city -->
    <div id="main">
        <section class="price">
            <div class="inner">
                <h1>
                    На этой странице вы можете купить крымский травяной чай оптом
                    <!--  <span>
                         <a href="#">Скачать прайс в .PDF</a>
                     </span> -->
                </h1>

                <h2> ОФОРМИТЕ СВОЮ ЗАЯВКУ
                    <span class="fright">Минимальная сумма заказа составляет 5 000 рублей</span>
                </h2>
                <table>
                    <tbody>
                    <tr class="head">
                        <td class="col-img"></td>
                        <td class="col-name">Наименование</td>
                        <td class="col-massa">Масса гр.</td>
                        <td class="col-up">В упаковке</td>
                        <td class="col-count">Кол-во</td>
                        <td class="col-price">Цена
                            <img src="images/rub.png" alt="">
                        </td>
                        <td class="col-sum">Сумма
                            <img src="images/rub.png" alt="">
                        </td>
                    </tr>
                    <?php if ($catalogs = Catalog::find()->select('id,name')->publish()->orderBy('pos ASC')->asArray()->all()):?>
                        <?php foreach($catalogs as $catalog):?>
                            <tr class="pos-title">
                                <td colspan="7">
                                    <?= $catalog['name']?>
                                </td>
                            </tr>
                            <?php if ($items = CatalogItems::loadItemsOneImage($catalog['id'])): $step = 1;?>
                                <?php foreach($items as $item):?>
                                    <tr class="product<?= $step == 1 ? ' col-with-img' : ''?>">
                                        <?php $path_preview = isset($item['galleryImages'][0]['basename']) ? $item['galleryImages'][0]['basename'].'_thumb.'.$item['galleryImages'][0]['ext'] : '';?>
                                        <?php if($step == 1):?>
                                            <td class="col-img" rowspan="<?= count($items)?>">
                                                <div class="b-img">
                                                    <?= Html::img('@gallery/'.$path_preview)?>
                                                </div>
                                            </td>
                                        <?php endif;?>
                                        <td class="col-name">
                                            <div class="product-name" data-img="<?= Yii::getAlias('@gallery').'/'.$path_preview?>">
                                                <?= $item['name']?>
                                            </div>
                                        </td>
                                        <td class="col-massa">
                                            <?= ($weight = \common\models\Weight::getValueById($item['weight_id'])) ? $weight : '---'?>
                                        </td>
                                        <td class="col-up">
                                            <span><?= ($in_package = $item['in_package']) ? $in_package : '---'?></span>
                                        </td>
                                        <td class="col-count">
                                            <div class="price-count-inp">
                                                <a class="minus fleft"></a><a class="plus fright"></a><input class="count" type="text" name="" value="0">
                                            </div>
                                        </td>
                                        <td class="col-price">
                                            <?= PricesValues::getPriceValue($model->price_id, $item['id'])?>
                                        </td>
                                        <td class="col-sum">
                                            0
                                        </td>
                                    </tr>
                                    <?php $step++; endforeach;?>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
                    </tbody>
                </table>
                <form method="post" id = 'price_form' action="/send-order">
                    <table>
                        <tbody>
                        <tr class="itogo">
                            <td colspan="5">Итого</td>
                            <td class="count-sum">0</td>
                            <td class="sum-rub" colspan="2">
                                <span>0</span>
                                <img src="images/rub.png">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div>
                        <p class="count-description">После заполнения данной формы наши сотрудники свяжутся с вами для согласования способа оплаты, доставки и заключения договора. Поставка товара может быть осуществлена партнером компании в вашем регионе. </p>
                    </div>
                    <div class="price-bottom">
                        <div class="price-form">
                            <span class="form-description">Имя*</span>
                            <input class="uform-name name" type="text" name="name" id="name">
                            <label for="uname"></label>
                            <span class="form-description">Телефон*</span>
                            <input class="uform-phone" type="text" name="uphone" id="phone">
                            <label for="uphone"></label>
                            <input type="hidden" name="email" id = 'email' class="email" value="sfhk@fhsj.ss">
                            <span class="form-description">Ваш комментарий</span>
                            <textarea class="uform-comment" cols="40" rows="5" id="comment" name="comment"></textarea>
                        </div>
                        <div class="price-checks">
                            <div class="form-item">
                                <label>
                                    <input type="checkbox" name="reklama" id="reklama" checked>
                                    <span>Выслать рекламные материалы</span>
                                </label>
                            </div>
                            <div class="form-item">
                                <label>
                                    <input type="checkbox" name="obrazci" id="obrazci">
                                    <span>Выслать образцы</span>
                                </label>
                            </div>
                        </div>
                        <div class="price-submit">
                            <!-- <a href="#order" class="submit-btn">Оформить</a> -->
                            <button type="submit" class="submit-btn sendordform">Оформить</button>
                        </div>
                    </div>
                </form>

                <div class="price-hidden">
                    <table></table>
                </div>

                <div class="order-block">
                    <h4>Ориентировачный обьем заказа:</h4>
                    <div class="order-features">
                        <ul class="features-list">
                            <li class="features-item">
                                <span class="features-description">Минимальный заказ</span>
                                    <span class="features-description"><b>6 000</b>
                                        <img src="images/rub.png">
                                    </span>
                            </li>
                            <li class="features-item">
                                <span class="features-description">Торговая точка</span>
                                    <span class="features-description"><b>15 000</b>
                                        <img src="images/rub.png">
                                    </span>
                            </li>
                            <li class="features-item">
                                <span class="features-description">Оптовик</span>
                                    <span class="features-description"><b>45 000</b>
                                        <img src="images/rub.png">
                                    </span>
                            </li>
                            <li class="features-item">
                                <span class="features-description">Дистрибьютор</span>
                                    <span class="features-description"><b>140 000</b>
                                        <img src="images/rub.png">
                                    </span>
                            </li>
                            <li class="features-item">
                                <span class="features-description">Федеральный дистрибьютор</span>
                                    <span class="features-description"><b>450 000</b>
                                        <img src="images/rub.png">
                                    </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="for-user">
                    <p>Данный прайс-лист является ознакомительным, оплата производится по безналичному расчету после заключения договора. Предложение не является открытой офертой. </p>
                </div>
                <a class="user-connect" href="#">Связаться с отделом продаж для специального предложения</a>
        </section>
    </div>
</div>
<div class="popups" style="display: none;">
    <div id="order" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                ЗАПОЛНИТЕ ЗАЯВКУ
            </div>
            <form id="price_form" action="#" method="post">
                <input type="hidden" name="_csrf" value="">
                <input type="hidden" class="email_to" name="email_to" value="">
                <div class="form-group field-ordersend-name required">
                    <input type="text" id="ordersend-name" class="name" name="OrderSend[name]" placeholder="Введите имя">
                </div>
                <div class="form-group field-ordersend-email required">
                    <input type="text" id="ordersend-email" class="email" name="OrderSend[email]" placeholder="Электронный адрес">
                </div>
                <input type="submit" class="btn border" value="ОТПРАВИТЬ">
            </form>
        </div>
    </div>
    <div id="sotrudnichestvo" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                МЫ ВСЕГДА ОТКРЫТЫ ДЛЯ СОТРУДНИЧЕСТВА<br>С НОВЫМИ ПАРТНЁРАМИ
            </div>
            <form id="w2" action="/send" method="post">
                <input type="hidden" name="_csrf" value="RTBVY1p0M2UDWmMxIBNKHyZpABIzHnIid3IjJwJFYDRwXzI7NRhpLg==">
                <div class="form-group field-orders-name required">
                    <input type="text" id="orders-name" class="name" name="Orders[name]" placeholder="Введите имя">
                </div>
                <div class="form-group field-orders-phone">
                    <input type="text" id="orders-phone" class="phone" name="Orders[phone]" placeholder="Номер телефона">
                </div>
                <div class="form-group field-orders-email">
                    <input type="text" id="orders-email" class="email" name="Orders[email]" placeholder="Электронный адрес">
                </div>
                <div class="form-group field-orders-message required">
                    <textarea id="orders-message" class="form-control" name="Orders[message]" placeholder="Укажите пожалуйста вкратце тему сотрудничества"></textarea>
                </div>
                <input class="btn border" type="submit" onclick="yaCounter34978440.reachGoal('cooperation'); return true;" value="ОТПРАВИТЬ">
            </form>
        </div>
    </div>
    <div id="backcall" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                ЗАПОЛНИТЕ СВОИ ДАННЫЕ<br>И МЫ СКОРО СВЯЖЕМСЯ С ВАМИ
            </div>
            <form id="w3" action="/back-call" method="post">
                <input type="hidden" name="_csrf" value="RTBVY1p0M2UDWmMxIBNKHyZpABIzHnIid3IjJwJFYDRwXzI7NRhpLg==">
                <div class="form-group field-backcallform-name required">
                    <input type="text" id="backcallform-name" class="name" name="BackCallForm[name]" placeholder="Введите имя">
                </div>
                <div class="form-group field-backcallform-phone required">
                    <input type="text" id="backcallform-phone" class="phone" name="BackCallForm[phone]" placeholder="Номер телефона">
                </div>
                <input class="btn border" onclick="yaCounter34978440.reachGoal('callback'); return true;" type="submit" value="ОТПРАВИТЬ">
            </form>
        </div>
    </div>
    <div id="search-shop" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                ЗАПОЛНИТЕ ВСЕ ПОЛЯ ДЛЯ ЭФФЕКТИВНОГО ПОИСКА<br>ВАШЕГО МАГАЗИНА
            </div>
            <form id="w4" action="/shop-add" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_csrf" value="RTBVY1p0M2UDWmMxIBNKHyZpABIzHnIid3IjJwJFYDRwXzI7NRhpLg==">
                <div class="form-group field-geography-country required">
                    <input type="text" id="geography-country" class="contry" name="Geography[country]" placeholder="Страна">
                </div>
                <div class="form-group field-geography-shop_name required">
                    <input type="text" id="geography-shop_name" class="shop-name" name="Geography[shop_name]" placeholder="Название магазина">
                </div>
                <div class="form-group field-geography-city required">
                    <input type="text" id="geography-city" class="city" name="Geography[city]" placeholder="Город">
                </div>
                <div class="form-group field-geography-fio">
                    <input type="text" id="geography-fio" class="name" name="Geography[fio]" placeholder="ФИО">
                </div>
                <div class="form-group field-geography-address required">
                    <input type="text" id="geography-address" class="adress" name="Geography[address]" placeholder="Адрес">
                </div>
                <div class="form-group field-geography-phone">
                    <input type="text" id="geography-phone" class="phone" name="Geography[phone]" placeholder="Номер телефона">
                </div>
                <div class="form-group field-geography-mode">
                    <input type="text" id="geography-mode" class="work-time" name="Geography[mode]" placeholder="Режим работы">
                </div>
                <div class="form-group field-geography-email">
                    <input type="text" id="geography-email" class="email" name="Geography[email]" placeholder="Электронный адрес">
                </div>
                <div class="form-group field-geographyimages-files">
                    <input type="hidden" name="GeographyImages[files][]" value="">
                    <input type="file" id="geographyimages-files" class="hidden" name="GeographyImages[files][]" multiple accept="image/*">
                </div>
                <div class="clear"></div>
                <div class="added-imgs">
                    <img src="/images/popups/added-img.png" alt=""><img src="/images/popups/added-img.png" alt=""><img src="/images/popups/added-img.png" alt="">
                </div>
                <p>
                    <a href="#" id="fileInputTrigger">Загрузите</a> три фотографии: общий вид магазина<br>и наша продукция на полке
                </p>
                <input class="btn border" onclick="yaCounter34978440.reachGoal('addshop'); return true;" type="submit" value="ДОБАВИТЬ">
            </form>
        </div>
    </div>


    <!--<script src="/assets/f12f254f/yii.js?v=1447873110"></script>
    <script src="/assets/f12f254f/yii.validation.js?v=1447873110"></script>
    <script src="/assets/f12f254f/yii.activeForm.js?v=1447873110"></script>-->