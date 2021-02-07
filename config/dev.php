<?php

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'App\\Controllers',
    'language' => 'en-US',
    'aliases' => [
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'db' => require __DIR__ . '/test_db.php',
        'request' => [
            'cookieValidationKey' => 'key',
            'enableCsrfValidation' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
    ],
    'container' => require __DIR__ . '/container.php',
];

return $config;
