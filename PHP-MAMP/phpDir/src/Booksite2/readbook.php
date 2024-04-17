<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $publishing_year = $_POST['publishing_year'];
  $genre = $_POST['genre'];
  $description = $_POST['description'];
}
$host = 'db';
// Database user name
$dbname = 'booksite';
$dbuser = 'root';
//database user password
$dbpass = 'lionPass';

// check the MySQL connection status
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// else {
//   echo "Connected to MySQL server successfully!";
// }

//Read the records from db
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
if (!$result) {
  die('Reading db records failed');
}
?>
<?php

while ($row = mysqli_fetch_assoc($result)) {
?>
<pre>
    <?php
    print_r($row);
    ?>
    </pre>
<?php
}
?>