<?php

namespace Core;

use Config\database;
use PDO;

class BaseModel
{
    public static function connect()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . database::DB_HOST . ';dbname=' . database::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, database::DB_USER, database::DB_PASSWORD);

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }

}
