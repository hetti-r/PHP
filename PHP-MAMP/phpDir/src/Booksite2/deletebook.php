<?php include 'db.php';

$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Query failed');
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    //Delete the records in db
    $query = "DELETE FROM books";
    $query .= "WHERE id = $id";
    //OR
    // $query = "DELETE FROM Users WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Delete query failed" . mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>delete book</title>
</head>

<body>
  <form action="deletebook.php" method="post">

    <select name="id" id="">
      <?php
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    echo "<option value='$id'>$id</option>";
}
?>
    </select>

    <input type="submit" name="submit" value="DELETE">

  </form>

</body>

</html>