<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

//spl_autoload_register(function ($class) {
//    $file = str_replace('\\', '/', $class);
//    var_dump($file);
//    require_once $file . '.php';
//});

Dotenv\Dotenv::create(__DIR__)->load();

require_once './route.php';
// Don't put anything below this line