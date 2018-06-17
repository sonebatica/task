<?php

namespace Vendor;

class Database{

    private static $instance;
    public $pdo;

    private function __construct()
    {

    }

    /**
     * @return Database
     */
    public static function getDatabase()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function connect()
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=quantox', 'root', '');

        return $dbh;
    }
}