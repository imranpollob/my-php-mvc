<?php

use Core\Router;

Router::get('test', function () {
    echo "a get request";
});

Router::post('test', function () {
    echo "a post request";
});

Router::put('test', function () {
    echo "a put request";
});

Router::patch('test', function () {
    echo "a patch request";
});

Router::delete('test', function () {
    echo "a delete request";
});

Router::get('users/all', function () {
    echo "all users";
});

Router::get('users', [
    'controller' => 'App\Controller\UserController@index'
]);

Router::get('users/@number/edit/@string', function ($a, $b) {
    echo "$a  $b";
});

Router::get('users/@number', [
    'controller' => 'App\Controller\UserController@show'
]);

die("Not found");