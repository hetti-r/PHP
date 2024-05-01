<?php
/* Write your code here */
$stock = 0;
$wanted = 30;
$comingSoon = true;
?>
<!DOCTYPE html>
<html>

<head>
  <title>if else if Statement</title>
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
  elseif ($comingSoon = true){
    echo "Coming soon";
  }
  else {
    echo "Sold out";
  }
  ?>
</body>

</html>