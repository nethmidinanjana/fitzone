<?php

require_once __DIR__ . '/../data/config.php';

class Database
{
    public static $connection;

    public static function setUpConnection()
    {
        global $dbHost, $dbUser, $dbPass, $dbName;

        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

            if (Database::$connection->connect_error) {
                die("Connection failed: " . Database::$connection->connect_error);
            }
        }
    }

    public static function iud($query)
    {
        Database::setUpConnection();
        return Database::$connection->query($query);
    }

    public static function search($query)
    {
        Database::setUpConnection();
        return Database::$connection->query($query);
    }
}
