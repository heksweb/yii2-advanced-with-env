<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

$path = dirname(__DIR__, 2);
require $path . '/vendor/autoload.php';

$dotEnv = Dotenv\Dotenv::createMutable($path);
$dotEnv->load();

defined('YII_DEBUG') or define('YII_DEBUG', $_ENV['YII_DEBUG']);
defined('YII_ENV') or define('YII_ENV', 'test');

require $path . '/vendor/yiisoft/yii2/Yii.php';
require $path . '/common/config/bootstrap.php';
require $path . '/site/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require $path . '/common/config/main.php',
    require $path . '/common/config/test.php',
    require $path . '/site/config/main.php',
    require $path . '/site/config/test.php'
);

try {
    (new yii\web\Application($config))->run();
} catch (yii\base\InvalidConfigException $exception) {
    echo $exception->getMessage();
}

