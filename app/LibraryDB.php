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
        $this->initializeTable();
    }

    private function initializeDatabase() {
        // MySQL specific syntax, will not work with other DBMS
        $this->pdo->exec("CREATE DATABASE IF NOT EXISTS`" . self::DB_NAME . "`");

        $this->pdo->exec("USE `" . self::DB_NAME . "`");
    }

    private function initializeTable() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS Books (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            author VARCHAR(100) NOT NULL,
            ISBN VARCHAR(30) NOT NULL UNIQUE,
            genre VARCHAR(20),
            publication_year INT NOT NULL,
            is_available BOOLEAN NOT NULL,
        );");
    }

    public function get_all_books() {
        $query = "SELECT * FROM Books";

        $statement = $this->pdo->query($query);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
