<?php

class Database
{
    private static $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null)
        {
            self::$connection = new PDO(
                "mysql:host=localhost;dbname=biblioteca;charset=utf8",
                "dog",
                "123456"
            );

            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$connection;
    }
}