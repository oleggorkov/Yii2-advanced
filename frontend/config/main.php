<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'api',
        'log'
    ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class,
                'charset' => 'UTF-8',
            ]
        ],
        'formatter' => [
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:d.m.Y H:i:s',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'project/index',
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => 'api/user',
                    'pluralize' => true,
                    'extraPatterns' => [
                        // actions
//                        'POST sign-up' => 'sign-up',
//                        'POST sign-in' => 'sign-in',
                        'GET me' => 'me',
                        'GET <id>/tasks' => 'tasks',
                        'GET tasks' => 'tasks',
                        'GET <id>/projects' => 'projects',
                        'GET projects' => 'projects'
                    ],
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => 'api/task',
                    'pluralize' => true,
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => 'api/project',
                    'pluralize' => true,
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => 'api2/user',
                    'pluralize' => true,
                    'extraPatterns' => [
                        // actions
                        'GET me' => 'me',
                        'GET <id>/tasks' => 'tasks',
                        'GET tasks' => 'tasks'
                    ],
                ],
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => 'api2/task',
                    'pluralize' => true,
                ],
            ],
        ],
//        'view' => [
//            'theme' => [
//                'basePath' => '@app/themes/first',
//                'baseUrl' => '@web/themes/first',
//                'pathMap' => [
//                    '@app/views/user' => '@app/themes/first/user',
//                    '@app/modules' => '@app/themes/first/modules',
//                    '@app/widgets' => '@app/themes/basic/widgets',
//                ],
//            ],
//        ],
    ],
    'modules' => [
        'api' => [
            'class' => \frontend\modules\api\Module::class
        ],
        'api2' => [
            'class' => \frontend\modules\api2\Module::class
        ],
    ],
    'params' => $params,
];
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['bootstrap'][] = 'log';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
    $config['components']['assetManager']['forceCopy'] = true;
}
return $config;