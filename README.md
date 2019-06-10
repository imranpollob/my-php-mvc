## my-php-mvc

A very simple mvc framework.

run 
```bash
composer install
```
Copy and modify contents from .env.example to a new .env file.

**Routing:**
```php
Router::put('test/@string', function ($var) {
    echo "a put request with parameter $var";
});

Router::get('users/@number', [
    'controller' => 'App\Controller\UserController@show'
]);
```

Available request methods: GET, POST, PUT, PATCH, DELETE

