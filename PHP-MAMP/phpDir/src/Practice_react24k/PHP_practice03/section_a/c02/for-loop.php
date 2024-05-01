<?php
/* Write your code here */
$candyCost = 1.99;
$candyAmount = 10;
$x = 0;
?>
<!DOCTYPE html>
<html>

<head>
  <title>for Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Prices for Multiple Packs</h2>
  <p>
    <?php
    /* Write your code here */

    for ($x = 0; $x <= $candyAmount; $x++) {
      echo "The $x amount of candy costs $" .  $x * $candyCost, "<br>";
    }
    
    ?>
  </p>
</body>

</html>