<?php

use Core\Router;

Router::get('index.php', function (){
    echo "home ";
});

Router::get('about', function (){
    echo "about";
});

Router::get('another', [
    'controller' => 'AnotherController@index'
]);

Router::get('users/all', function (){
    echo "all users";
});

Router::get('users', [
    'controller' => 'App\Controller\UserController@index'
]);
