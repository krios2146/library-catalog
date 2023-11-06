<?php
require_once 'LibraryDB.php'; 

if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    $libraryDB = new LibraryDB();

    $book = $libraryDB->get($bookId);

    if ($book) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $editedTitle = $_POST['title'];
            $editedAuthor = $_POST['author'];
            $editedISBN = $_POST['ISBN'];
            $editedGenre = $_POST['genre'];
            $editedPublicationYear = $_POST['publication_year'];
            $editedIsAvailable = isset($_POST['is_available']) ? true : false;

            $libraryDB->update($bookId, $editedTitle, $editedAuthor, $editedISBN, $editedGenre, $editedPublicationYear, $editedIsAvailable);

            header("Location: /");
            exit();
        }
    } else {
        echo "Book not found."; 
    }
} else {
    echo "Book ID is missing.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Book</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="<?php echo $book['title']; ?>" >
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" class="form-control" value="<?php echo $book['author']; ?>" >
            </div>
            <div class="form-group">
                <label for="ISBN">ISBN:</label>
                <input type="text" name="ISBN" class="form-control" value="<?php echo $book['ISBN']; ?>" >
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" name="genre" class="form-control" value="<?php echo $book['genre']; ?>" >
            </div>
            <div class="form-group">
                <label for="publication_year">Publication Year:</label>
                <input type="text" name="publication_year" class="form-control" value="<?php echo $book['publication_year']; ?>" >
            </div>
            <div class="form-check">
                <input type="checkbox" name="is_available" class="form-check-input" <?php if ($book['is_available']) echo 'checked'; ?>>
                <label class="form-check-label" for="is_available">Available</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

