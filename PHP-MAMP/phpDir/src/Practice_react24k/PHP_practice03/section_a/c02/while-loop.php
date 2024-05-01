<?php
/* Write your code here */
$candyCost = 1.99;
$candyAmount = 5;
$candyTotal = 0;
$i = 0;

while ($i < $candyAmount) {
  $i++;
  $candyTotal+=$candyCost;
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>while Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Prices for Multiple Packs</h2>
  <p>
    <?php
    /* Write your code here */
    echo $candyTotal
    ?>
  </p>
</body>

</html>