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
        $this->initializeTables();
    }

    private function initializeDatabase() {
        // MySQL specific syntax, will not work with other DBMS
        $this->pdo->exec("CREATE DATABASE IF NOT EXISTS`" . self::DB_NAME . "`");

        $this->pdo->exec("USE `" . self::DB_NAME . "`");
    }

    private function initializeTables() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS Users (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL,
            email VARCHAR(30) NOT NULL UNIQUE
        );");

        $this->pdo->exec("CREATE TABLE IF NOT EXISTS Books (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            author VARCHAR(100) NOT NULL,
            ISBN VARCHAR(30) NOT NULL UNIQUE,
            genre VARCHAR(20),
            publication_year INT NOT NULL,
            is_available BOOLEAN NOT NULL,
            user_id INT,
            FOREIGN KEY (user_id) REFERENCES Users(id)
        );");
    }

    public function get_all_books() {
        $query = "SELECT * FROM Books";

        $statement = $this->pdo->query($query);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
