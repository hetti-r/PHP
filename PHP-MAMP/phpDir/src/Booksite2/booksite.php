<?php
require_once 'login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favorite Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="booksite.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Your Favorite Books</h1>
        </header>
        <nav id="main-navi">
            <ul>
                <li><a href="booksite.php">Home</a></li>

            </ul>
        </nav>
<main>
    <form action="booksite.php" method="post">
      <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
      </div>
      <div>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author">
      </div>

      <input type="submit" name="submit" value="Submit">
    </form>

    <table class="default-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Author</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
        <?php foreach ($result as $row): ?>
        <tr data-id="<?=$row['id']?>">
          <td><?=$row["id"]?></td>
          <td><?=htmlspecialchars($row["title"])?></td>
          <td><?=htmlspecialchars($row["author"])?></td>
          <td class='actions'>
            <!-- Buttons for editing and deleting -->
            <button onclick="toggleEditMode(this.parentNode.parentNode, true)">Edit</button>
            <button onclick="deleteRow(<?=$row['id']?>)">Delete</button>
          </td>
        </tr>
        <?php endforeach;?>
        <?php else: ?>
        <tr>
          <td colspan='4'>No results</td>
        </tr>
        <?php endif;?>
      </tbody>
    </table>
  </div>

</body>

</html>

<?php
$conn->close();
?>