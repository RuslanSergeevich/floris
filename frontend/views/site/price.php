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
                    <?=$model->name?>
                </h1>
                <h2>ОФОРМИТЕ СВОЮ ЗАЯВКУ
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
                <form method="post" id ='price_form' action="/send-order">
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
                <a class="user-connect deal fancybox" href="#sotrudnichestvo">Связаться с отделом продаж для специального предложения</a>
        </section>
    </div>
</div>