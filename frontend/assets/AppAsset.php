<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'min/application.min.css'
    ];
    public $js = [
        'min/application.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
