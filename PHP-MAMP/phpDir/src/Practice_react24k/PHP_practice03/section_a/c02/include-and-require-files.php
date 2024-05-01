<?php
/* Write your code here */
$candyStock = 25;
?>
<?php

include_once 'includes/header.php';

include_once 'includes/footer.php';
?>

<h2>Chocolate</h2>
<?php
/* Write your code here */
if ($candyStock > 100) {
    echo "Good availability";
} elseif ($candyStock < 100 && $candyStock != 0) {
    echo "low stock";
} else {
    echo "out of stock";
}
?>


