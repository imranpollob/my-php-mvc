<?php

namespace Core;

class Router
{
    /**
     * Handle GET request
     *
     * @param string $route
     * @param mixed $arg
     */
    public static function get($route, $arg)
    {
        (new Router)->match($route, $arg);
    }

    /**
     * Match route
     *
     * @param string $route
     * @param mixed $arg
     */
    private function match($route, $arg)
    {
        if ($_GET['url'] == $route) {
            $this->execute($arg);
        } else {
            $explodedUrl = explode('/', $_GET['url']);
            $explodedRoute = explode('/', $route);

            if (count($explodedUrl) == count($explodedRoute)) {
                $flag = 1;
                $params = [];

                for ($i = 0; $i < count($explodedRoute); $i++) {
                    if (in_array($explodedRoute[$i], ['@string', '@number'])) {
                        if ($explodedRoute[$i] == '@number' && preg_match('/^[0-9]+$/', $explodedUrl[$i])) {
                            $params[] = $explodedUrl[$i];
                            continue;
                        } else if ($explodedRoute[$i] == '@string' && preg_match('/^[a-zA-Z0-9]+$/', $explodedUrl[$i])) {
                            $params[] = $explodedUrl[$i];
                            continue;
                        }
                    } else if ($explodedRoute[$i] == $explodedUrl[$i]) {
                        continue;
                    }

                    $flag = 0;
                    break;
                }

                if ($flag == 1) {
                    $this->execute($arg, $params);
                }
            }
        }
    }

    /**
     * Invoke anonymous function or execute controller method
     *
     * @param mixed $arg
     * @param null|array $params
     */
    private function execute($arg, $params = [])
    {
        if (is_callable($arg)) {
            $arg->__invoke();
        } else if (is_array($arg)) {
            list($controller, $method) = explode('@', $arg['controller']);

            call_user_func_array([new $controller, $method], $params);
        }
    }

}
