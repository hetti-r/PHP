<?php

/* 
  Write you php code here

   */
  $best_sellers = array("Chocolate", "Mints", "Fudge", "Bubble gum", "Toffee", "Jelly Beans")
?>
<!DOCTYPE html>
<html>

<head>
  <title>Indexed Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Best Sellers</h2>
<?php echo "$best_sellers[0] \n" , "$best_sellers[1]\n", "$best_sellers[2]\n"; ?>
</body>

</html>