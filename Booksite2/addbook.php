<?php
if (isset($_POST['submit'])) {
  //echo "yes received the data";
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['year'];
  $genre = $_POST['genre'];
  $description = $_POST['description'];
  echo $title . " " . $author;

  //Validate the form
  if ($title && $author) {
    echo $user . " " . $pass;
  } else {
    echo "title and author fields cannot be blank";
  }

  $host = 'db';
  // Database user name
  $dbname = 'booksite';
  $dbuser = 'root';
  //database user password
  $dbpass = 'lionPass';

  // Check the MySQL connection status
  $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    echo "Connected to MySQL server successfully!";
  }

  // Create the records inside db
  $query = "INSERT INTO books(title,author,year,genre,description)";
  $query .= "VALUES ('$title','$author','$year','$genre','$description')";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    die('Query insertion failed');
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
            <h2>Add a New Book</h2>
            <form action="addbook.php" method="post">
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
                <p><input type="submit" name="submit" value="Add Book"></p>
            </form>
        </main>
    </div>    
</body>
</html>