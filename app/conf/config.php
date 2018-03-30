<?php 
$config = new \stdClass();
$config->route = array(
    'defaultController' => 'Index',
    'defaultAction' => 'index',
    '404Controller' => 'Error',
    '404Action' => 'http404',
);
$config->autoloadNamespace = array(
    'Conpoz\\App\\' => APP_PATH . '/',
    'Conpoz\\App\\Controller\\' => APP_PATH . '/controller/',
    'Conpoz\\App\\Task\\' => APP_PATH . '/task/',
    'Conpoz\\App\\Model\\' => APP_PATH . '/model/',
    'Conpoz\\App\\Lib\\' => APP_PATH . '/lib/',
    'Conpoz\\App\\Middleware\\' => APP_PATH . '/middleware/',
    'Conpoz\\Core\\Lib\\' => CORE_PATH . '/lib/',
);
$config->db = array(
    'master' => array(
        'adapter' => 'mysql',
        'dbname' => 'maple',
        'host' => '127.0.0.1',
        'port' => '3306',
        'username' => 'root',
        'password' => ''
    ),
    'slave' => array(
        array(
            'adapter' => 'mysql',
            'dbname' => 'maple',
            'host' => '127.0.0.1',
            'port' => '3306',
            'username' => 'root',
            'password' => ''
        ),
        array(
            'adapter' => 'mysql',
            'dbname' => 'maples',
            'host' => '127.0.0.1',
            'port' => '3306',
            'username' => 'root',
            'password' => ''
        ),
    )
);
$config->mem = array(
    'host' => '127.0.0.1',
    'port' => 11211,
);
$config->ACL = array(
    'publicRole' => 'guest',
    'publicResources' => array(
        array('Index', '*'),
        array('Error', '*'),
    ),
);
$config->linebot = array(
    'channelAccessToken' => '2UIe0hDI6sidbGdb1iI/k4wdgSArOm6T3/YKQqlgX1EyzSA5L5/HZiHsk9MHqDOsr7ETARt5Sd88xKf/PeG91HvsY5eB6+5JbOrejlH5QN9zdivLmT4OVWFy5XnWScnjSXc1CfvDZJWX0wlm6QmeAAdB04t89/1O/w1cDnyilFU=',
    'channelSecret' => '57f630cd8fb7e71a8364bfcba3853118'
);
//$config->middlewareGroup = array(
//    'Cors',
//    'M1',
//    'M2',
//);
//$config->middlewareGroup2 = array(
//    'Cors',
//    'M1',
//    'M4',
//    'M2',
//);
//$config->middlewareBind = array(
//    '*' => 'M4',
//    'Index' => array(
//        '*' => $config->middlewareGroup,
//        'update' => 'M3',
//    ),
//    'Member' => array(
//        '*' => $config->middlewareGroup2,
//        'needLogin' => 'M1',
//    )
//);
return $config;
