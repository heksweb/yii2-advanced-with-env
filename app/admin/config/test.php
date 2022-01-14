<?php
return [
    'id' => 'app-admin-tests',
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'admin\models\Admin',
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
