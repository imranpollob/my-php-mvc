<?php

namespace Core;

use Config\database as DB;
use PDO;

class Database
{
    public static function connect()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . DB::DB_HOST . ';dbname=' . DB::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, DB::DB_USER, DB::DB_PASSWORD);

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}