<?php

/* 
  Write you php code here

   */
  $name = "Mr. James";
  $thankyou = "Thank you," . $name;
  $orderTitle = "$name ’s Order";
?>
<!DOCTYPE html>
<html>

<head>
  <title>String Operator</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <?php echo $orderTitle,   "<br>" . $thankyou ?>
</body>

</html>