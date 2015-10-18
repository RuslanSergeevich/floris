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
        'js/script.js',
        'js/lib/jquery.fancybox.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
