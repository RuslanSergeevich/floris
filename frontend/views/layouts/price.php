<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Floris: Крымский чай и сладости</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:image" content="assets_price/path/to/image.jpg">
    <link rel="shortcut icon" href="assets_price/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets_price/img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets_price/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets_price/img/favicon/apple-touch-icon-114x114.png">

    <link rel="stylesheet" href="assets_price/css/main.min.css">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

</head>

<body>
    <header class="main_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 flex_mod">
                    <a href="/" class="logo">
                        <span>Крымский чай и сладости</span>
                    </a>
                    <div class="phone">
                        0 800 1111-00-00<br>
                        <div class="phone-time">с 9:00  до 18:00</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main">
       <?=$content; ?>
        <footer class="main_footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <p>© 2011–2016. Флорис.<br>
                            Крым, г. Симферополь, ул. Данилова, 43. </p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p>
                                <span class="footer_phone">+7 978 049-96-11</span>
                                <a href="mailto:info@floristea.com">info@floristea.com</a>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p class="footer_sales">Отдел продаж:<br>           
                                +7 3652 583-577
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="phone_box">
                                <a class="phone_001" href="skype:floristea?call">floristea</a>
                                <a class="phone_002" href="tel:floristea">floristea</a>
                                <a class="phone_003" href="tel:floristea">floristea</a>
                            </div>
                        </div>
                    </div>
                </div>

            </footer>
        </div>
        <div class="overlay">
            <div id="get-price" class="popup">
                <div class="popup-close"></div>
                <div class="popup-head"></div>
                <div class="popup-content">
                    <div class="title">
                        Получите оптовый<br>прайс-лист на e-mail
                    </div>
                    <form id="w2" action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
                        <input type="text" id="orders-phone" class="phone" name="custom_phone" placeholder="Номер телефона" value="">
                        <input type="text" id="orders-email" class="email" name="email" placeholder="Электронный адрес *" required>
                        <input type="hidden" name="campaign_token" value="pEIMz" />
                        <input type="submit" value="ПОЛУЧИТЬ"/>
                    </form>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=B1Wg1&webforms_id=4690406"></script>
    <script src="assets_price/js/scripts.min.js"></script>

</body>
</html>
<?php $this->endPage()?>
