<?php
/*Write your code here*/
$stock = 199;
$wanted = 30;
?>
<!DOCTYPE html>
<html>

<head>
  <title>Ternary Operator</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate</h2>
  <?php
  /* Write your code here */
  $ifInStock = ($wanted < $stock) ?  "In Stock" : "Sold out";

  print($ifInStock)
  ?>
</body>

</html>