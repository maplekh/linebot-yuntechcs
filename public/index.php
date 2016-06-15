<?php 

try {
    define('CONPOZ_PATH', realpath(__DIR__ . '/..'));
    define('APP_PATH', realpath(__DIR__ . '/../app'));
    define('CORE_PATH', realpath(__DIR__ . '/../core'));

    $config = require(APP_PATH . '/conf/config.php');
    require(CORE_PATH . '/include/envInit.php');
    require(CORE_PATH . '/include/autoLoader.php');
    require(CONPOZ_PATH . '/vendor/autoload.php');
    $bag = require(APP_PATH . '/conf/service.php');
    $app = new \Conpoz\Lib\Mvc\App($bag);
    $app->run($config);
} catch (\Exception $e) {
    die($e->getMessage());
}