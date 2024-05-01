<?php

/* 
  Write you php code here

   */
  $name = "Mikko";
  $favCandy = "Salmiakki"
?>
<!DOCTYPE html>
<html>

<head>
  <title>Echo Shorthand</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <?=$name,"<br>" . $favCandy;?>
</body>

</html>