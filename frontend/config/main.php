<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'ru',
    'homeUrl' => '/',
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'request' => [
            'baseUrl' => '',
            'cookieValidationKey' => 'wlS7Ipf4HtXoZytJCXxogKNUAA_60dwK',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '/' => 'site',
                'send' => 'site/send',
                'send-order' => 'site/send-order',
                'add-user-lk' => 'site/add-user-lk',
                'user-logout' => 'site/user-logout',
                'user-token-login' => 'site/user-token-login',
                'back-call' => 'site/backcall',
                'shop-add' => 'site/shopadd',
                'subscribe' => 'site/subscribe',
                'api/geocode-tool' => 'site/geocode-tool',
                'search' => 'site/search',
                '<alias[\wd-]+>' => 'site/page',
                'blog/<alias[\wd-]+>' => 'blog/view',
                'product/<alias[\wd-]+>' => 'product/view',
                'cataloge/<alias[\wd-]+>' => 'catalog/view',
                'type/<alias[\wd-]+>' => 'type/view',
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
