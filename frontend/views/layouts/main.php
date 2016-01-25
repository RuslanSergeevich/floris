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
            <?= strip_tags(\common\models\Boxes::getBox('header_phone'))?>
            <?= Html::a('Перезвоните мне', '#backcall',['class' => 'fancybox'])?>
        </div>
        <?= Html::a('Сотрудничество', '#sotrudnichestvo',['class' => 'deal btn fancybox'])?>
    </header>

    <div id="main">
        <?= $content?>
    </div>
    <footer role="contentinfo">
       <?= MenuWidget::widget()?>
        <div class="footer-search mobile">
            <?= $this->render('/partials/_search_form',['model' => new \frontend\models\SearchModel()])?>
        </div>
        <a class="search"></a>
        <div class="b-search">
            <?= $this->render('/partials/_search_form',['model' => new \frontend\models\SearchModel()])?>
        </div>
        <?php if(isset($model->boxes['vacancy'])):?>
                <?= Html::a('Вакансии', Url::to($model->boxes['vacancy']['link']),['class' => 'vacation'])?>
        <?php endif;?>
        <div class="footer-bottom">
            <div class="copy">
                <?= \common\models\Boxes::getBox('footer_address')?>
            </div>
            <div class="info">
                <?= \common\models\Boxes::getBox('footer_phone_email')?>
            </div>
            <div class="sales">
                <?= \common\models\Boxes::getBox('footer_sales')?>
            </div>
            <div class="socials">
                <?= Html::a('<i class="fi fi-footer_social_fb"></i>','https://www.facebook.com/floristea/',['class' => 'fb', 'target' => '_blank'])?>
                <a class="yt" href="#"><i class="fi fi-footer_social_yt"></i></a>
                <?= Html::a('<i class="fi fi-footer_social_vk"></i>','http://vk.com/floristea',['class' => 'vk', 'target' => '_blank'])?>
            </div>
            <div class="design">
                Дизайн шаблонов сайта<br>разработан в
            </div>
        </div>
    </footer>

</div>
<?= $this->render('/partials/_forms', [
    'model' => new \common\models\Orders(),
    'backCall' => new \frontend\models\BackCallForm(),
    'shopAdd' => new \common\models\Geography(),
    'images' => new \common\models\GeographyImages()
])?>
<!-- mailget.net start --><script>var mgv = mgv || [];_mgv["id"] = "8167101587398a64805c0124d5b868c9";(function () {var mg = document.createElement("script");mg.type = "text/javascript";mg.async = true; mg.src = ("https:" == document.location.protocol ? "https://" : "http://") + "mailget.net/mgjs/mg.min.js";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(mg, s);})();</script><!-- mailget.net end -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage()?>