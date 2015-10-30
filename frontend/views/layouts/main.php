<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use frontend\components\MenuWidget;
use yii\helpers\Url;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' href='favicon.ico'>
    <!--[if lt IE 9]>
    <script src="/js/ie9.js"></script>
    <![endif]-->
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody()?>
<div id="wrapper">
    <a class="go-top"></a>
    <header role="banner">
        <a class="mobile-menu mobile"></a>
        <?= Html::a('','tel:+79780499611', ['class' => 'mobile-phone mobile'])?>
        <?= Html::a('', Url::home(),['class' => 'logo'])?>
        <?= MenuWidget::widget([
            'attach_icon' => true,
            'class_name' => 'screen'
        ])?>
        <div class="phone screen">
            0 800 1111-00-00<?= Html::a('Перезвоните мне', '#backcall',['class' => 'fancybox'])?>
        </div>
        <?= Html::a('Сотрудничество', '#sotrudnichestvo',['class' => 'deal btn fancybox'])?>
    </header>

    <div id="main">
        <?= $content?>
    </div>
    <footer role="contentinfo">
       <?= MenuWidget::widget()?>
        <div class="footer-search mobile">
            <form role="search">
                <input type="text" name=""><input type="submit" value="">
            </form>
        </div>
        <a class="search screen" href="#"></a><a class="vacation" href="#">Вакансии</a>
        <div class="footer-bottom">
            <div class="copy">
                © 2011–<?= date('Y')?>. Флорис.<br>Крым, г. Симферополь, ул. Данилова, 43
            </div>
            <div class="info">
                +7 978 049-96-11<br><?= Yii::$app->formatter->asEmail('info@floristea.com')?>
            </div>
            <div class="sales">
                Отдел продаж:<br>+7 3652 583-577
            </div>
            <div class="socials">
                <?= Html::a('','https://www.facebook.com/floristea/',['class' => 'fb', 'target' => '_blank'])?>
                <a class="yt" href="#"></a>
                <?= Html::a('','http://vk.com/floristea',['class' => 'vk', 'target' => '_blank'])?>
            </div>
            <div class="design">
                Дизайн шаблонов сайта<br>разработан в
            </div>
        </div>
    </footer>

</div>
<div class="popups" style="display: none;">
    <div id="backcall" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                ЗАПОЛНИТЕ СВОИ ДАННЫЕ<br>И МЫ СКОРО СВЯЖЕМСЯ С ВАМИ
            </div>
            <form>
                <input class="name" type="text" placeholder="Введите имя"><input class="phone" type="text" placeholder="Номер телефона"><input class="btn border" type="submit" value="ОТПРАВИТЬ">
            </form>
        </div>
    </div>
    <div id="sotrudnichestvo" class="popup">
        <div class="popup-head"></div>
        <div class="popup-content">
            <div class="title">
                МЫ ВСЕГДА ОТКРЫТЫ ДЛЯ СОТРУДНИЧЕСТВА<br>С НОВЫМИ ПАРТНЁРАМИ
            </div>
            <form>
                <input class="name" type="text" placeholder="Введите имя"><input class="phone" type="text" placeholder="Номер телефона"><input class="email" type="text" placeholder="Электронный адрес"><textarea placeholder="Укажите пожалуйста вкратце тему сотрудничества"></textarea><input class="btn border" type="submit" value="ОТПРАВИТЬ">
            </form>
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage()?>