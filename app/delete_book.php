<?php
require_once 'LibraryDB.php'; 

if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    $libraryDB = new LibraryDB();

    $book = $libraryDB->delete($bookId);
} else {
    echo "Book ID is missing.";
}

header("Location: /");
exit();
?>
