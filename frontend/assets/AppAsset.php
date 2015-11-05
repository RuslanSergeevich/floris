<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/override.css',
        'css/jquery.kladr.min.css',
    ];
    public $js = [
        'js/lib/jquery-ui.js',
        'js/lib/jquery.fancybox.js',
        'js/lib/selectbox.js',
        'js/lib/bxslider.js',
        'js/script.js',
        //'js/jquery.kladr.min.js',
        'js/app_bundle.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
