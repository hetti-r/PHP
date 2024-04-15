<?php

/* 
  Write you php code here

   */
$multiArray = array($offers = array("Sweets", "20€", 3));

?>
<!DOCTYPE html>
<html>

<head>
  <title>Multidimensional Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Offers</h2>
  <?php 
  echo $multiArray[0][0]. "<br>";
  echo $multiArray[0][1];
  ?>
</body>

</html>