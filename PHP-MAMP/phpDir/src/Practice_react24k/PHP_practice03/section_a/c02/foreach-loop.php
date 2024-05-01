<?php
/*
Write your code here
 */
$candies = array("Toffee" => 2.99, "Mints" => 1.99, "Fudge" => 3.49);

?>
<!DOCTYPE html>
<html>

<head>
  <title>foreach Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Price List</h2>
  <table>
    <tr>
      <th>Item</th>
      <th>Price</th>
    </tr>
    <?php
/*
Write your code here
 */
foreach ($candies as $key => $value) {
    echo "<td>" . $key;
    echo "<td>" . $value, "<tr>";
}
?>
  </table>
</body>

</html>