<?php
/*
Write your code here
*/
$stock = 199;
$wanted = 30;
?>
<!DOCTYPE html>
<html>

<head>
  <title>if else Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate</h2>
  <?php
  /* Write your code here */
  if ($wanted < $stock) {
    echo "In Stock";
  }
  else {
    echo "Sold out";
  }
  ?>
</body>

</html>