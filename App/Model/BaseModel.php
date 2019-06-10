<?php

namespace App\Model;

use Core\Database;
use PDO;

class BaseModel extends Database
{
    public static function all($tableName)
    {
        $db = static::connect();

        $stmt = $db->query("SELECT * FROM $tableName");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
