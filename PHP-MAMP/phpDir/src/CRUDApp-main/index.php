<?php
require_once 'login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles.css">

  <script src="script.js"></script>
  <title>User Management</title>
</head>

<body>
  <div class="container">
    <header>
      <h1>User Management</h1>
    </header>

    <form action="index.php" method="post">
      <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>
      <input type="submit" name="submit" value="Submit">
    </form>

    <table class="default-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0) : ?>
        <?php foreach ($result as $row) : ?>
        <tr data-id="<?= $row['id'] ?>">
          <td><?= $row["id"] ?></td>
          <td><?= htmlspecialchars($row["username"]) ?></td>
          <td>••••••••</td>
          <td class='actions'>
            <!-- Buttons for editing and deleting -->
            <button onclick="toggleEditMode(this.parentNode.parentNode, true)">Edit</button>
            <button onclick="deleteRow(<?= $row['id'] ?>)">Delete</button>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
          <td colspan='4'>No results</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</body>

</html>

<?php
$conn->close();
?>