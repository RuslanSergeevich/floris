<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);?>
<?php $this->beginPage()?>
<!DOCTYPE html lang="<?= Yii::$app->language ?>">
<!--[if lte IE 8 ]> <html class='ie ie8' lang='en'> <![endif]-->
<!--[if IE 9 ]> <html class='ie ie9' lang='en'> <![endif]-->
<!--[if gt IE 9]> <!--><html lang='en'><!-- <![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=1000">
    <link rel='shortcut icon' href='favicon.ico'>
    <!--[if lt IE 9]>
    <script src="/js/ie9.js"></script>
    <![endif]-->
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <header>
        <a class="logo" href="/"></a><menu>
            <li class="about">
                <a href="/about.html">О компании</a>
            </li>
            <li class="cataloge">
                <a href="/cataloge.html">Ассортимент</a>
            </li>
            <li class="privat">
                <a href="/privat.html">Приват Лэйбл</a>
            </li>
            <li class="blog">
                <a href="/blog.html">Блог</a>
            </li>
            <li class="buy">
                <a href="/buy.html">Где купить</a>
            </li>
            <li class="contacts">
                <a href="/contacts.html">Контакты</a>
            </li>
        </menu>
        <div class="phone">
            0 800 1111-00-00<a class="fancybox" href="#call-me">Перезвоните мне</a>
        </div>
        <a class="btn" href="#">Сотрудничество</a>
    </header>

    <div id="main">
        <?= $content?>
    </div>
    <footer>
        <menu>
            <li>
                <a href="#">О КОМПАНИИ</a>
            </li>
            <li>
                <a href="#">АССОРТИМЕНТ</a>
            </li>
            <li>
                <a href="#">ПРИВАТ ЛЭЙБЛ</a>
            </li>
            <li>
                <a href="#">БЛОГ</a>
            </li>
            <li>
                <a href="#">ГДЕ КУПИТЬ</a>
            </li>
            <li>
                <a href="#">КОНТАКТЫ</a>
            </li>
        </menu><a class="search" href="#"></a><a class="vacation" href="#">Вакансии</a>
        <div class="footer-bottom">
            <div class="copy">
                © 2011–2015. Флорис.<br>Крым, г. Симферополь, ул. Данилова, 43
            </div>
            <div class="info">
                +7 978 049-96-11<br>info@floristea.com
            </div>
            <div class="sales">
                Отдел продаж:<br>+7 3652 583-577
            </div>
            <div class="socials">
                <a class="fb" href="#"></a><a class="yt" href="#"></a><a class="vk" href="#"></a>
            </div>
            <div class="design">
                Дизайн шаблонов сайта<br>разработан в
            </div>
        </div>
    </footer>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage()?>