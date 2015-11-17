<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'Admin LTE',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => require(__DIR__ . '/modules.php'),
    'language' => 'ru-RU',
    'homeUrl' => '/_root/',
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'request' => [
            'baseUrl' => '/_root',
            'cookieValidationKey' => 'Yq8xA_vyc2l3tLS2GfqC61Zo6vY7M0Xr',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '/' => 'site/index',
                '<action:(login|logout|upload-image-ckeditor|profile)>' => 'site/<action>',
                '<module:[\wd-]+>/page/<page:\d+>' => '<module>/default/index',
                '<module:[\wd-]+>' => '<module>/default/index',
                '<module:[\wd-]+>/<action:[\wd-]+>/<id:\d+>' => '<module>/default/<action>',
                '<module:[\wd-]+>/<action:[\wd-]+>' => '<module>/default/<action>',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
