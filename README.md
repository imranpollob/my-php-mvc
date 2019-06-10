##my-php-mvc

A very simple mvc framework

Adjust database configuration in Config\database.php


**Routing:**

Router::get('test', function () {
    echo "a get request";
});

Router::get('users/@number', [
    'controller' => 'App\Controller\UserController@show'
]);

Available request methods: GET, POST, PUT, PATCH, DELETE

