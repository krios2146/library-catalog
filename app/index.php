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
$books = $library_db->get_all_books();

if(!empty($books)) {
    foreach($books as $book) {
        echo '<td>' . $book['id'] . '</td>';
        echo '<td>' . $book['title'] . '</td>';
        echo '<td>' . $book['author'] . '</td>';
        echo '<td>' . $book['ISBN'] . '</td>';
        echo '<td>' . $book['genre'] . '</td>';
        echo '<td>' . $book['publication_year'] . '</td>';
        echo '<td>' . $book['is_available'] . '</td>';
        echo '<td><a class="btn btn-primary" href="edit_book.php/?id=' . $book['id'] . '" role="button">Edit</a></td>';
        echo '<td><a class="btn btn-danger" href="delete_book.php/?id=' . $book['id'] . '" role="button">Delete</a></td>';
    }
} else {
    echo '<p>No books found</p>';
}
?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

