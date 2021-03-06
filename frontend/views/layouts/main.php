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
    <meta name = "format-detection" content = "telephone=no" />
    <!--<meta property="fb:app_id" content="267024307026803"/>-->
    <meta property="fb:admins" content="100001623475851" />
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' href='favicon.ico'>
<!--[if lt IE 9]>
<script src="/js/ie9.js"></script>
<![endif]-->
<title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?135"></script>
</head>

<body>
    <?php $this->beginBody()?>
    <div id="wrapper">
        <div id='order-fld-2'>

        </div>
        <div class="city">
            <div class="city__position">
                Регион:
                <div class="city__menu" >
                    <a class="city__link" id="city" href="#"></a>
<!--<div class="city__items">
<ul>
<li><a href="#">Севастополь</a></li>
<li><a href="#">Москва</a></li>
<li><a href="#">Краснодар</a></li>
<li><a href="#">Петербуг</a></li>
<li><a href="#">Киев</a></li>
</ul>
</div>-->
<!-- /.city__items -->
</div>
<!-- /.city__menu -->
</div>
<!-- /.city__position -->
</div>
<!-- /.city -->
<header role="banner">
    <a class="go-top"></a>
    <a class="mobile-menu mobile" href="#backcall"></a>
    <?= Html::a('','#backcall', ['class' => 'mobile-phone mobile fancybox'])?>
    <?= Html::a('<span>'.strip_tags(\common\models\Boxes::getBox('header_logo_text')).'</span>', Url::home(),['class' => 'logo'])?>
    <?= MenuWidget::widget([
        'attach_icon' => true,
        'class_name' => ''
        ])?>
        <div class="phone">
            <?= strip_tags(\common\models\Boxes::getBox('header_phone'))?><br>
            <?= Html::a('Перезвоните мне', '#backcall',['class' => 'fancybox'])?>
            <div class="phone-time">с 9:00  до 18:00</div>
            <!-- /.phone-time -->
        </div>
        <?= Html::a('Сотрудничество', '#sotrudnichestvo',['class' => 'deal btn fancybox'])?>
    </header>
    <div id="main">
        <?= $content?>
    </div>

    <footer role="contentinfo">
        <menu class="" role="navigation">
            <?php if(\common\models\BottomMenu::getBottomFirstLevelMenu()):?>
                <?php foreach(\common\models\BottomMenu::getBottomFirstLevelMenu() as $fItem):?>
                    <li class=""><a href="/<?php echo $fItem->alias=='index'?'':$fItem->alias?>"><?php echo $fItem->bottom_menu_name?></a>
                        <?php if($fItem->id == 3 && \common\models\BottomMenu::getBottomSecondLevelMenu()):?>

                            <?php foreach(\common\models\BottomMenu::getBottomSecondLevelMenu() as $sItem):?>
                                <ul>
                                    <li><a href="/<?php echo $sItem['alias']?>"><?php echo $sItem['bottom_menu_name']?></a></li>
                                </ul>
                            <?php endforeach;?>

                        <?php endif;?>
                    </li>
                <?php endforeach;?>
            <?php endif;?>
            <li><a href="#">ВАКАНСИИ</a></li>
        </menu>

        <div class="footer-search mobile">
            <?= $this->render('/partials/_search_form',['model' => new \frontend\models\SearchModel()])?>
        </div>
        <a class="search"></a>
        <div class="b-search">
            <?= $this->render('/partials/_search_form',['model' => new \frontend\models\SearchModel()])?>
        </div>

        <div class="f-call-me">
            <div class="f-call-me__phone"><?= strip_tags(\common\models\Boxes::getBox('header_phone'))?></div>
            <!-- /.f-call-me__phone -->
            <div class="f-call-me__text"><?= Html::a('Перезвоните мне', '#backcall',['class' => 'fancybox'])?></div>
            <!-- /.f-call-me__text -->
            <div class="phone-time">с 9:00  до 18:00</div>
            <!-- /.f-call-me__time -->
        </div>
        <!-- /.f-call-me -->

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

            <div class="f-phone-box">
                <a href="skype:floristea?call" class="f-phone-001">floristea</a>
                <!-- /.f-phone-001 -->
                <a href="tel:floristea" class="f-phone-002">floristea</a>
                <!-- /.f-phone-002 -->
                <a href="tel:floristea" class="f-phone-003">floristea</a>
                <!-- /.f-phone-003 -->
            </div>
            <!-- /.f-phone-box -->
            <div class="socials">
                <a class="fb" href="https://www.facebook.com/floristea/" target="_blank"><i class="fi fi-footer_social_fb"></i></a>
                <a class="yt" href="#"><i class="fi fi-footer_social_yt"></i></a>
                <a class="vk" href="http://vk.com/floristea" target="_blank"><i class="fi fi-footer_social_vk"></i></a>
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
    <!-- mailget.net start --><script>var mgv = mgv || [];_mgv["id"] = "c3a7cd794da3aaec137f3f4bf35857ea";(function () {var mg = document.createElement("script");mg.type = "text/javascript";mg.async = true; mg.src = ("https:" == document.location.protocol ? "https://" : "http://") + "mailget.net/mgjs/mg.min.js";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(mg, s);})();</script><!-- mailget.net end -->
    <?php $this->endBody() ?>
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter34978440 = new Ya.Metrika({ id:34978440, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/34978440" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<?php $this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');?>
<?php $this->registerJsFile('js/_yandex_map.js',['depends'=>'yii\web\JqueryAsset']);?>
<script type="text/javascript">
    $('.lock').on('click', function(){
        $('#get-price').fadeIn(300);
        $('#get-price').addClass('popup-active');
    });
    $('.popup-close').on('click', function(){
        $('#get-price').fadeOut(300);
        $('#get-price').removeClass('popup-active');
    });

    $('.feedback-popup-btn').on('click', function(){
        $('#feedback-popup').fadeOut(300);
        $('#feedback-popup').removeClass('popup-active');
    });
    $('.send_form_ajax').on('click', function(e){
        e.preventDefault();
        if($('input.confirm').prop('checked') == false){
            alert('Необходимо ваше согласие на обработку персональных данных.');
            return false;
        }
        $.ajax({
            url: '/add-user-lk',
            data: {phone:$('#orders-phone2').val(), email: $('#orders-email2').val(), url:location.href},
            dataType: 'json',
            type: 'post',
            success:function(response){
                console.log(response);
                if(response.is_new == true){
                    $('#w33').submit();
                }else{
                    //alert('Необходимо в .');
                    $('#get-price').removeClass('popup-active').css('display', 'none');
                    $.fancybox.close();
                    //$('#unlock').removeClass('popup-active').css('display', 'none');
                    $('#feedback-popup').fadeIn(500).addClass('popup-active').css('display', 'block');
                }
            }
        })
    });
    $(function(){
        ymaps.ready(init);
        function init() {
            ymaps.geolocation.get({provider:"yandex"})
            .then(function (res)  {
                var g = res.geoObjects.get(0);
                $("#city")
                .html(g.getCountry() + ', ' + g.getAdministrativeAreas()[0] + ', ' + g.getLocalities()[0]);
                //.html(g.getLocalities()[0]);
            })
            .catch(function (err) {
                console.log('Не удалось установить местоположение', err);
            });
        }
    });
</script>
<script src="/js/lib/_order.js"></script>
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '371909936520331'); // Insert your pixel ID here.
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=371909936520331&ev=PageView&noscript=1"
    /></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
</body>
</html>
<?php $this->endPage()?>