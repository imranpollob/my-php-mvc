<?php

require_once './Core/BaseModel.php';

class User extends BaseModel
{
    public static function all()
    {
        $db = static::connect();

        $stmt = $db->query('SELECT * FROM users');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}