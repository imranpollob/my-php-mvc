<?php

namespace Core;

use PDO;

class Database
{
    public static function connect()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . Config::get('DB_HOST') . ';dbname=' . Config::get('DB_NAME') . ';charset=utf8';
            $db = new PDO($dsn, Config::get('DB_USER'), Config::get('DB_PASSWORD'));

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}