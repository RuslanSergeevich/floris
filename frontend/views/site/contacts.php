<?php

use yii\helpers\Html;

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
<section class="contacts">
    <div class="contacts-header">
        <div class="inner">
            <div class="title">
                МЫ ВСЕГДА ОТКРЫТЫ<br>СОТРУДНИЧЕСТВУ
            </div>
        </div>
    </div>
    <div class="geography-sale">
        <div class="inner center">
            <div class="text">
                ОСТАВЬТЕ СВОЮ ЗАЯВКУ
            </div>
            <a class="btn green" href="#">ЗАЯВКА</a>
        </div>
    </div>
    <div class="b-info">
        <div class="inner">
            <ul>
                <li>
                    <h2>
                        Отдел продаж
                    </h2>
                    <p>
                        С удовольствием ответим на все ваши вопросы и вышлем образцы продукции
                    </p>
                    <span class="mobile">+7 3652 583-577</span><span class="mail">sales@floristea.com</span><span class="skype">floistea.com</span><span class="phone">+7 978 049-96-11</span>
                </li>
                <li>
                    <h2>
                        Офис
                    </h2>
                    <p>
                        295021, Крым, г. Симферополь, ул. Данилова, 43
                    </p>
                    <span class="mobile">+7 3652 583-577</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="b-info">
        <div class="inner">
            <ul>
                <li>
                    <h2>
                        Отдел снабжения
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                    </p>
                    <span class="mail">sales@floristea.com</span>
                </li>
                <li>
                    <h2>
                        Для прессы
                    </h2>
                    <p>
                        Дорогие журналисты, мы ответим на Ваши вопросы, вышлем необходимые материалы и поможем в подготовке статьи или сюжета! Мы не готовы платить за статьи, но открыты для новых идей и проектов.
                    </p>
                    <span class="mail">sales@floristea.com</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="b-info">
        <div class="inner">
            <ul>
                <li>
                    <h2>
                        Директор
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                    </p>
                    <span class="mobile">+7 3652 583-577</span>
                </li>
                <li>
                    <h2>
                        Ищем талантливых сотрудников
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                    </p>
                    <span class="mail">sales@floristea.com</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="b-info connect-soc">
        <div class="inner">
            <h2>
                ПРИСОЕДИНЯЙТЕСЬ
            </h2>
            <div class="social">
                <a class="fb" href="#" target="_blank"></a><a class="insta" href="#" target="_blank"></a><a class="vk" href="#" target="_blank"></a>
            </div>
        </div>
    </div>
    <div class="b-info">
        <div class="inner center">
            <h2>
                РЕКЛАМНЫЕ МАТЕРИАЛЫ ДЛЯ ПАРТНЕРОВ
            </h2>
            <p>
                Все фотографии являются интелектуальной собственностью компании,<br>и могут использоваться только в рекламе нашей продукции.
            </p>
            <a class="btn green" href="#">СКАЧАТЬ</a>
        </div>
    </div>
</section>