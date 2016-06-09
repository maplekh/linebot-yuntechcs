<?php 

namespace Conpoz\Lib\Mvc;

class App extends \stdClass
{
    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    public function run(&$config = null)
    {
        $configRouteDefault = array(
            'defaultController' => 'Index',
            'defaultAction' => 'index',
            '404Controller' => 'Error',
            '404Action' => 'http404',
            );

        /**
         * get controller, get action 
         */
        $config['route'] = array_merge($configRouteDefault, $config['route']);
        $uri = isset($_GET['_url']) ? $_GET['_url'] : '';
        $uriAry = explode('/', $uri);
        $controller = ucfirst(isset($uriAry[0]) && !empty($uriAry[0]) ? $uriAry[0] : $config['route']['defaultController']);
        $action = isset($uriAry[1]) && !empty($uriAry[1]) ? $uriAry[1] : $config['route']['defaultAction'];
        if (!class_exists('Conpoz\\Controller\\' . $controller)) {
            $controller = $config['route']['404Controller'];
            $action = $config['route']['404Action'];
            $controllerClass = '\\Conpoz\\Controller\\' . $controller;
            $controllerObject = new $controllerClass();
        } else {
            $controllerClass = '\\Conpoz\\Controller\\' . $controller;
            $controllerObject = new $controllerClass();
            if (!method_exists($controllerObject, $action . 'Action')) {
                $controller = $config['route']['404Controller'];
                $action = $config['route']['404Action'];
                $controllerClass = '\\Conpoz\\Controller\\' . $controller;
                $controllerObject = new $controllerClass();
            }
        }
        $controllerObject->app = $this;
        $controllerObject->bag = $this->bag;
        $controllerObject->{$action . 'Action'}();
    }
}