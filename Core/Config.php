<?php

namespace Core;

class Config
{
    public static function get($key)
    {
        return array_key_exists($key, self::configurations()) ? self::configurations()[$key] : null;
    }

    private static function configurations()
    {
        return [
            'DB_HOST' => isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : 'localhost',
            'DB_NAME' => isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : 'my-php-mvc',
            'DB_USER' => isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : 'root',
            'DB_PASSWORD' => isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : 'root',
        ];
    }
}