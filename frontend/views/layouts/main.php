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
        <a class="mobile-menu mobile" href="#backcall"></a>
        <?= Html::a('','#backcall', ['class' => 'mobile-phone mobile fancybox'])?>
        <?= Html::a('', Url::home(),['class' => 'logo'])?>
        <?= MenuWidget::widget([
            'attach_icon' => true,
            'class_name' => ''
        ])?>
        <div class="phone">
            0 800 1111-00-00<?= Html::a('Перезвоните мне', '#backcall',['class' => 'fancybox'])?>
        </div>
        <?= Html::a('Сотрудничество', '#sotrudnichestvo',['class' => 'deal btn fancybox'])?>
    </header>

    <div id="main">
        <?= Yii::$app->session->hasFlash('message') ? Html::tag('legend', Yii::$app->session->getFlash('message'), ['class' => 'flash_message']) : ''?>
        <?= $content?>
    </div>
    <footer role="contentinfo">
       <?= MenuWidget::widget()?>
        <div class="footer-search mobile">
            <form role="search">
                <input type="text" name="" placeholder="Поиск..."><input type="submit" value="">
            </form>
        </div>
        <a class="search"></a>
        <div class="b-search">
            <form>
                <input type="text" name="" placeholder="Поиск..."><input type="submit" value="">
            </form>
        </div>
        <a class="vacation" href="#">Вакансии</a>
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
                <?= Html::a('','https://www.facebook.com/floristea/',['class' => 'fb', 'target' => '_blank'])?><a class="yt" href="#"></a><?= Html::a('','http://vk.com/floristea',['class' => 'vk', 'target' => '_blank'])?>
            </div>
            <div class="design">
                Дизайн шаблонов сайта<br>разработан в
            </div>
        </div>
    </footer>

</div>
<?= $this->render('/partials/_forms', [
    'model' => new \frontend\models\CooperationForm(),
    'backCall' => new \frontend\models\BackCallForm(),
    'shopAdd' => new \common\models\Geography(),
    'images' => new \common\models\GeographyImages()
])?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage()?>