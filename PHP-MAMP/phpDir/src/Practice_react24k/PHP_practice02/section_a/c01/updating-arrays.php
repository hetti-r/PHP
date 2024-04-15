<?php

/* 
  Write you php code here

   */
  $nutrition = array("fat" => "50%", "sugar" => "20%", "salt" => "5%");

  $nutrition["fiber"] = "2%";
  $nutrition["fat"] = "22%";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Updating Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Nutrition (per 100g)</h2>
  <p><?php echo "Fat:" . $nutrition["fat"] ?></p>
<p><?php echo "Sugar:" . $nutrition["sugar"] ?></p>
<p><?php echo "Salt:" . $nutrition["salt"] ?></p>
<p><?php echo "Fiber:" . $nutrition["fiber"] ?></p>
</body>

</html>