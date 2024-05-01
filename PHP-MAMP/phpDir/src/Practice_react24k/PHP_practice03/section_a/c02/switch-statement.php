<?php
/* Write your code here */
$day = "monday";



?>
<!DOCTYPE html>
<html>

<head>
  <title>switch Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <?php
  /* Write your code here */

switch ($day) {
  case "monday":
    echo "get 20% off chocolates";
    break;
  case "tuesday":
    echo "20% off mints";
    break;
    
  default:
    echo "Buy three packs, get one free";
}
  ?>
</body>

</html>