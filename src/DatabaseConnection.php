<?php


final class DatabaseConnection
{
    private static $instance = null;
    private static $connction;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function getInstance(): DatabaseConnection
    {

        if (is_null(self::$instance)) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public static function connect($host, $dbName, $user, $password): void
    {
        self::$connction = new PDO("mysql:dbname={$dbName};host={$host};charset=utf8", $user, $password);
    }

    public static function getConnection()
    {
        return self::$connction;
    }

}