<?php
return [
    'id' => 'app-common-tests',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=' . $_ENV['DB_TEST_HOST'] .';dbname=' . $_ENV['DB_TEST_NAME'],
            'username' => $_ENV['DB_TEST_USER'],
            'password' => $_ENV['DB_TEST_PASSWD'],
            'charset' => $_ENV['DB_TEST_CHARSET'],
            'attributes' => [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""));'
            ]
        ],
    ],
];
