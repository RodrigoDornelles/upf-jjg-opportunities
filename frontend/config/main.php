<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['assistant', 'log', 'curriculum', 'classroom', 'jobs'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => 'booster_job_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => 'booster_job_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'booster_job_advanced-frontend',
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
                'home' => '/site/index',
                'login' => 'site/login',
                'logout' => 'site/logout',
                'curriculum/<controller:[-\w]+>/<action:[-\w]+>' => 'curriculum/<controller:[-\w]+>/<action:[-\w]+>', 
                'curriculum/<controller:[-\w]+>' => 'curriculum/<controller:[-\w]+>/index', 
                'classroom/<controller:[-\w]+>/<action:[-\w]+>' => 'classroom/<controller:[-\w]+>/<action:[-\w]+>', 
                'classroom/<controller:[-\w]+>' => 'classroom/<controller:[-\w]+>/index', 
                'jobs/<controller:[-\w]+>/<action:[-\w]+>' => 'jobs/<controller:[-\w]+>/<action:[-\w]+>', 
                'jobs/<controller:[-\w]+>' => 'jobs/<controller:[-\w]+>/index', 
                'curriculum' => 'curriculum/site/index',
                'classroom' => 'classroom/site/index',
                'jobs' => 'jobs/site/index',
                '<controller:[-\w]+>/<action:[-\w]+>' => '<controller>/<action>',
                '<controller:[-\w]+>' => '<controller>/index',
            ],
        ],
    ],
    'modules' => [
        'assistant' => [
            'class' => 'frontend\modules\assistant\Module'
        ],
        'curriculum' => [
            'class' => 'frontend\modules\curriculum\Module'
        ],
        'classroom' => [
            'class' => 'frontend\modules\classroom\Module'
        ],
        'jobs' => [
            'class' => 'frontend\modules\jobs\Module'
        ]
    ],
    'params' => $params,
];
