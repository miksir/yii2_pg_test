<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'yii2-pg-test',
    'basePath' => dirname(__DIR__),
    'vendorPath' => __DIR__ . '/../../vendor/',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'wqo8ty139gyhEIUUHGuhre89her9eigqe90tyiIFYGEowy4t981234hgfviuarsr082',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                '/videos/<page:\d+>' => 'site/videos',
                '/videos' => 'site/videos',
            ],
        ],
        'formatter' => [
            'class' => \app\helpers\Formatter::class,
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
