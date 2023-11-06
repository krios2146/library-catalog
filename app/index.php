<!DOCTYPE html>
<?php 
include 'LibraryDB.php';
$library_db = new LibraryDB();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Book Table</title>
    </head>
    <body>
        <div class="container mt-4">
            <div class="container">
                <h1>Add Book</h1>
                <form method="POST" action="add_book.php" class="row align-items-center my-3">
                    <div class="col">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="author" class="form-label">Author:</label>
                        <input type="text" name="author" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="ISBN" class="form-label">ISBN:</label>
                        <input type="text" name="ISBN" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="genre" class="form-label">Genre:</label>
                        <input type="text" name="genre" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="publication_year" class="form-label">Publication Year:</label>
                        <input type="text" name="publication_year" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="is_available" class="form-label">Is Available:</label>
                        <input type="checkbox" name="is_available" class="form-check-input">
                    </div>
                    <div class="col">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Add Book</button>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Genre</th>
                        <th>Publication Year</th>
                        <th>Availability</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $books = $library_db->get_all();

                    if(!empty($books)) {
                        foreach($books as $book) {
                            echo '<tr>';
                            echo '<td>' . $book['id'] . '</td>';
                            echo '<td>' . $book['title'] . '</td>';
                            echo '<td>' . $book['author'] . '</td>';
                            echo '<td>' . $book['ISBN'] . '</td>';
                            echo '<td>' . $book['genre'] . '</td>';
                            echo '<td>' . $book['publication_year'] . '</td>';
                            echo '<td>' . (($book['is_available'] == 1) ? 'available' : 'not available') . '</td>';
                            echo '<td><a class="btn btn-primary" href="edit_book.php/?id=' . $book['id'] . '" role="button">Edit</a></td>';
                            echo '<td><a class="btn btn-danger" href="delete_book.php/?id=' . $book['id'] . '" role="button">Delete</a></td>';
                            echo '<tr>';
                        }
                    } else {
                        echo '<p>No books found</p>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

