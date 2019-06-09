<?php

require_once './Core/Router.php';

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
    'controller' => 'UserController@index'
]);
