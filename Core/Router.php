<?php

namespace Core;

class Router
{

    protected $routes = [];

    protected $params = [];

    public static function get($route, $arg)
    {
        (new Router)->add($route, $arg);
    }


    private function add($route, $arg)
    {
        $this->routes[] = $route;

        if ($_GET['url'] == $route) {
            if (is_callable($arg)) {
                $arg->__invoke();
            } else if (is_array($arg)) {
                list($controller, $method) = explode('@', $arg['controller']);

                //require_once './App/Controller/' . $controller . '.php';

                (new $controller)->{$method}();
            }
        }
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}
