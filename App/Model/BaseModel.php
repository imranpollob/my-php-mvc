<?php

namespace App\Model;

use Core\Database;
use PDO;

class BaseModel extends Database
{
    /**
     * Execute query and return result
     *
     * @param string $query
     * @return array
     */
    protected static function execute($query)
    {
        $db = static::connect();

        return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all result from a table
     *
     * @param string $tableName
     * @return array
     */
    public static function all($tableName)
    {
        return self::execute("SELECT * FROM $tableName");
    }

    /**
     * Get the first result from a table
     *
     * @param string $tableName
     * @return array
     */
    public static function first($tableName)
    {
        return self::execute("SELECT * FROM $tableName LIMIT 1");
    }

    /**
     * Find an id from a table
     *
     * @param string $tableName
     * @param integer $id
     * @return array
     */
    public static function find($tableName, $id)
    {
        return self::execute("SELECT * FROM $tableName WHERE id = $id");
    }

}
