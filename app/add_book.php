<?php
require_once 'LibraryDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $ISBN = $_POST['ISBN'];
    $publication_year = $_POST['publication_year'];
    $is_available = isset($_POST['is_available']) ? true : false; 

    $libraryDB = new LibraryDB();

    $libraryDB->save($title, $author, $ISBN, $genre, $publication_year, $is_available);
    
    header("Location: localhost");
    exit();
}
?>
