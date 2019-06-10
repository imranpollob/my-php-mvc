<?php

namespace Core;

/**
 * @method static get(string $string, mixed $array)
 * @method static post(string $string, mixed $array)
 * @method static put(string $string, mixed $array)
 * @method static patch(string $string, mixed $array)
 * @method static delete(string $string, mixed $array)
 */
class Router
{
    /**
     * Handle requests
     *
     * @param string $name
     * @param array $params
     */
    public static function __callStatic($name, $params)
    {
        if (strtolower($_SERVER['REQUEST_METHOD']) == $name) {
            (new Router)->match($params[0], $params[1]);
        }

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

        exit();
    }

}
