<?php

/**
 * Write your code here
 */

$candies = [
  "Toffee" => ["price" => 3, "stock" => 12], "Mints" => ["price" => 2, "stock" => 26], "Fudge" => ["price" => 8, "stock" => 8]
]

$checkStock = function () {
    $stockedCandies = array("Toffee" => 12, "Mints" => 26, "Fudge" => 8);

    foreach ($candies as $candy) {
        if ($candyStock < 10) {
            echo "Re-Order necessary.";
        } else {
            echo "No Re-Order necessary.";
        }
    }
    ;
};

$totalStockValue = function () {
    $candyPrices = array("Toffee" => 3, "Mints" => 2, "Fudge" => 8);
    $stockedCandies = array("Toffee" => 12, "Mints" => 26, "Fudge" => 8);

    foreach ($candyPrices as $value) {
        echo $value * $stockedCandies[$value];
    }
    ;
};

$totalStockValue();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Basic Functions</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Stock Control</h2>
  <table>
    <tr>
      <th>Product</th>
      <th>Stock</th>
      <th>Re-order</th>
      <th>Total value</th>
      <th>Tax due</th>
    </tr>
    <?php
/**
 * Write your code here
 */
?>
  </table>
</body>

</html>