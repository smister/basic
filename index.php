<?php
error_reporting(E_ALL & ~(E_STRICT | E_NOTICE));
// change the following paths if necessary
$yii = dirname(__FILE__) . '/../../yii/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);
$config = require('./protected/config/main.php');
$local = './protected/config/main-local.php';
$env = './protected/config/main-env.php';
if (file_exists($env)) {
    $env = require($env);
    $config = CMap::mergeArray($config, $env);
}
if (file_exists($local)) {
    $local = require($local);
    $config = CMap::mergeArray($config, $local);
}
Yii::createWebApplication($config)->run();