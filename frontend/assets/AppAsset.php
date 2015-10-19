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
    ];
    public $js = [
        'js/lib/jquery-ui.js',
        'js/lib/jquery.fancybox.js',
        'js/lib/selectbox.js',
        'js/lib/device.js',
        'js/lib/bxslider.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
