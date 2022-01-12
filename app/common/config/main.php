<?php

$config = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=' . $_ENV['DB_HOST'] .';dbname=' . $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWD'],
            'charset' => $_ENV['DB_CHARSET'],
            'attributes' => [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""));'
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];

if (YII_ENV_DEV) {
    // send all mails to a file by default. You have to set
    // 'useFileTransport' to false and configure a transport
    // for the mailer to send real emails.
    $config['components']['mailer']['useFileTransport'] = true;
}

return $config;