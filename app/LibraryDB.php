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
            is_available BOOLEAN NOT NULL
        );");
    }

    public function get_all() {
        $query = "SELECT * FROM Books";

        $statement = $this->pdo->query($query);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $query = "SELECT * FROM Books WHERE id = :id";
        $statement = $this->pdo->prepare($query);

        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $query = "DELETE FROM Books WHERE id = :id";
        $statement = $this->pdo->prepare($query);

        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();
    }

    public function update($id, $title, $author, $ISBN, $genre, $publication_year, $is_available) {
        $query = "UPDATE Books 
            SET title = :title, 
            author = :author, 
            ISBN = :isbn, 
            genre = :genre, 
            publication_year = :year, 
            is_available = :available 
            WHERE id = :id";
        $statement = $this->pdo->prepare($query);

        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':author', $author, PDO::PARAM_STR);
        $statement->bindParam(':isbn', $ISBN, PDO::PARAM_STR);
        $statement->bindParam(':genre', $genre, PDO::PARAM_STR);
        $statement->bindParam(':year', $publication_year, PDO::PARAM_INT);
        $statement->bindParam(':available', $is_available, PDO::PARAM_BOOL);

        $statement->execute();   
    }

    public function save($title, $author, $ISBN, $genre, $publication_year, $is_available) {
        $query = "INSERT INTO Books (title, author, ISBN, genre, publication_year, is_available) 
            VALUES (:title, :author, :isbn, :genre, :year, :available)";
        $statement = $this->pdo->prepare($query);

        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':author', $author, PDO::PARAM_STR);
        $statement->bindParam(':isbn', $ISBN, PDO::PARAM_STR);
        $statement->bindParam(':genre', $genre, PDO::PARAM_STR);
        $statement->bindParam(':year', $publication_year, PDO::PARAM_INT);
        $statement->bindParam(':available', $is_available, PDO::PARAM_BOOL);

        $statement->execute();   
    }
}

?>
