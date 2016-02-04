<?php

use yii\helpers\Html;
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
<section class="price">
    <div class="inner">
        <h1>
            <span class="fright">Ваш менеджер: <i><?= strip_tags(\common\models\Boxes::getBox('header_phone'))?></i></span><?= $model['name']?>
        </h1>
        <table>
            <tbody>
            <tr class="head">
                <td class="col-img"></td>
                <td class="col-name">
                    Наименование
                </td>
                <td class="col-massa">
                    Масса гр.
                </td>
                <td class="col-up">
                    В упаковке
                </td>
                <td class="col-count">
                    Кол-во
                </td>
                <td class="col-price">
                    Цена <img src="/images/rub.png" alt="">
                </td>
                <td class="col-sum">
                    Сумма <img src="/images/rub.png" alt="">
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
        <form>
            <table>
                <tbody>
                <tr class="itogo">
                    <td colspan="5">
                        Итого:
                    </td>
                    <td class="count-sum">
                        0
                    </td>
                    <td class="sum-rub" colspan="2">
                        <span>0 </span> <img src="/images/rub.png" alt="">
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="price-bottom">
                <div class="price-loginfo">
                    <b>Логистическая информация: </b>1 пак = 12 SKU;  Размер: 57 х 41 х 16 см;<br>Брутто: 3,5 кг: 1 пал (120 x 80 x 170) = 40 паков;  ШК = 4665272421487
                </div>
                <div class="price-checks">
                    <div class="form-item">
                        <label><input type="checkbox" name="reklama" id="reklama" checked><span>Выслать рекламные материалы</span></label>
                    </div>
                    <div class="form-item">
                        <label><input type="checkbox" name="obrazci" id="obrazci"><span>Выслать образцы</span></label>
                    </div>
                </div>
                <div class="price-submit">
                    <a href="#order" class="form-submit fancybox">Оформить</a>
                </div>
            </div>
            <div class="price-hidden">
                <table></table>
            </div>
        </form>
    </div>
</section>

<div id="order" class="popup">
    <div class="popup-head"></div>
    <div class="popup-content">
        <div class="title">
            ЗАПОЛНИТЕ ЗАЯВКУ
        </div>
        <form>
            <input class="name" type="text" placeholder="Введите имя">
            <input type="hidden" name="email_to" id="email_to" value="<?= \common\models\Prices::getEmail($model->price_id)?>">
            <input class="email" type="email" placeholder="Электронный адрес">
            <input class="btn border" type="submit" value="ОТПРАВИТЬ">
        </form>
    </div>
</div>