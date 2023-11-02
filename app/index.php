<!DOCTYPE html>
<?php 
include 'LibraryDB.php';
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
        <tr>
          <td>1</td>
          <td>Book Title 1</td>
          <td>Author 1</td>
          <td>ISBN-123456</td>
          <td>Fiction</td>
          <td>2020</td>
          <td>Available</td>
          <td><a class="btn btn-primary" href="#" role="button">Edit</a></td>
          <td><a class="btn btn-danger" href="#" role="button">Delete</a></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Book Title 2</td>
          <td>Author 2</td>
          <td>ISBN-789012</td>
          <td>Non-Fiction</td>
          <td>2019</td>
          <td>Not Available</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Book Title 3</td>
          <td>Author 3</td>
          <td>ISBN-345678</td>
          <td>Mystery</td>
          <td>2021</td>
          <td>Available</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

