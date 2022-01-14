<?php
return [
    'id' => 'app-site-tests',
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'site\models\User',
        ],
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
    ],
];
