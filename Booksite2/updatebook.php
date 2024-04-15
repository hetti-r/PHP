<?php include 'db.php';

$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
if (!$result) {
  die('Query failed');
}
?>

<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['year'];
  $genre = $_POST['genre'];
  $description = $_POST['description'];

  //Update the records in db
  $query = "UPDATE books SET ";
  $query .= "title = '$title', ";
  $query .= "author= '$author' ";
  $query .= "year= '$year' ";
  $query .= "genre= '$genre' ";
  $query .= "description= '$description ";
  $query .= "WHERE id = $id";

  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Update query failed" . mysqli_error($conn));
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favorite Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="booksite.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Your Favorite Books</h1>
        </header>
        <nav id="main-navi">
        <ul>
                <li><a href="addbook.php">Add a New Book</a></li>
                <li><a href="booksite.php">Book List</a></li>
            </ul>
        </nav>
        <main>
            <h2>Edit Book</h2>

  <form action="update.php" method="post">

  <p>
      <label for="title">Title:</label>
      <input type="text" id="title" name="title">
  </p>
  <p>
      <label for="author">Author:</label>
      <input type="text" id="author" name="author">
  </p>
  <p>
      <label for="year">Year:</label>
      <input type="number" id="year" name="year">
  </p>
  <p>
      <label for="genre">Genre:</label>
      <select id="genre" name="genre">
          <option value="Adventure">Adventure</option>
          <option value="Classic Literature">Classic Literature</option>
          <option value="Coming-of-age">Coming-of-age</option>
          <option value="Fantasy">Fantasy</option>
          <option value="Historical Fiction">Historical Fiction</option>
          <option value="Horror">Horror</option>
          <option value="Mystery">Mystery</option>
          <option value="Romance">Romance</option>
          <option value="Science Fiction">Science Fiction</option>
      </select>
  </p>
  <p>
      <label for="description">Description:</label><br>
      <textarea rows="5" cols="100" id="description" name="description"></textarea>
  </p>
    <select name="id" id="">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
      }
      ?>
    </select>
    <input type="submit" name="submit" value="UPDATE">

  </form>
</body>
</html>