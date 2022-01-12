<?php

$path = dirname(__DIR__, 2);
require $path . '/vendor/autoload.php';

$dotEnv = Dotenv\Dotenv::createMutable($path);
$dotEnv->load();

defined('YII_DEBUG') or define('YII_DEBUG', $_ENV['YII_DEBUG']);
defined('YII_ENV') or define('YII_ENV', $_ENV['YII_ENV']);

require $path . '/vendor/yiisoft/yii2/Yii.php';
require $path . '/common/config/bootstrap.php';
require $path . '/admin/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require $path . '/common/config/main.php',
    require $path . '/admin/config/main.php'
);

try {
    (new yii\web\Application($config))->run();
} catch (yii\base\InvalidConfigException $exception) {
    echo $exception->getMessage();
}
