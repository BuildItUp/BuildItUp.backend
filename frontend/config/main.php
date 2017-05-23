<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'api' => [
            'class' => 'frontend\modules\api\Api',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
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
                [ //Route untuk user
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'api/user',
                    'extraPatterns' => [
                        'POST login' => 'login',
                        'GET logout' => 'logout',
                        'POST register' => 'register',
                    ]
                ],
                [ //Route untuk customer
                    'class' => 'yii\rest\urlRule',
                    'controller' => 'api/customer',
                    'extraPatterns' => [
                        'POST register' => 'register',
                        'GET get-user/<id:\d+>' => 'getUser'
                    ],
                ],
                [ //Route untuk worker
                    'class' => 'yii\rest\urlRule',
                    'controller' => 'api/worker',
                    'extraPatterns' => [
                        'POST register' => 'register',
                    ],
                ],
                [ //Route untuk project
                    'class' => 'yii\rest\urlRule',
                    'controller' => 'api/project',
                    'extraPatterns' => [
                        'POST create' => 'çreate',
                    ],
                ],
                [ //Route untuk province
                    'class' => 'yii\rest\urlRule',
                    'controller' => 'api/province',
                    'extraPatterns' => [
                        'GET get-all' => 'getAll',
                    ],
                ],
                [ //Route untuk city
                    'class' => 'yii\rest\urlRule',
                    'controller' => 'api/city',
                    'extraPatterns' => [
                        'GET get-all' => 'getAll',
                    ],
                ],
            ],
        ],
        
    ],
    'params' => $params,
];
