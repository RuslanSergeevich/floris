<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;
use frontend\components\MenuWidget;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);?>
<?php $this->beginPage()?>
<!DOCTYPE html lang="<?= Yii::$app->language ?>">
<!--[if lte IE 8 ]> <html class='ie ie8' lang='<?= Yii::$app->language ?>'> <![endif]-->
<!--[if IE 9 ]> <html class='ie ie9' lang='<?= Yii::$app->language ?>'> <![endif]-->
<!--[if gt IE 9]> <!--><html lang='<?= Yii::$app->language ?>'><!-- <![endif]-->
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
        <a class="logo" href="/"></a>
        <?= MenuWidget::widget([
            'attach_icon' => true
        ])?>
        <div class="phone">
            0 800 1111-00-00<a class="fancybox" href="#call-me">Перезвоните мне</a>
        </div>
        <a class="btn" href="#">Сотрудничество</a>
    </header>

    <div id="main">
        <?= $content?>
    </div>
    <footer>
       <?= MenuWidget::widget()?>
        <a class="search" href="#"></a><a class="vacation" href="#">Вакансии</a>
        <div class="footer-bottom">
            <div class="copy">
                © 2011–<?= date('Y')?>. Флорис.<br>Крым, г. Симферополь, ул. Данилова, 43
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