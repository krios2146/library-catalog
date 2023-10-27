<?php

class LibraryDB {
    
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    private const DB_NAME = 'digital-library';
    
    private $pdo;

    public function __construct() {
        $db_host = 'mysql:host=' . self::DB_HOST;

        $this->pdo = new PDO(
            $db_host, 
            self::DB_USER, 
            self::DB_PASSWORD
        );

        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        // MySQL specific syntax, will not work with other DBMS
        $this->pdo->exec("CREATE DATABASE IF NOT EXIST`" . self::DB_NAME . "`");

        $this->pdo->exec("USE `" . self::DB_NAME . "`");
    }

    public function get_all_books() {
        $query = "SELECT * FROM Books";

        $statement = $this->pdo->query($query);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>