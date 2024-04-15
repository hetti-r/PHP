<?php
// Write your code here
$items = array("pencil", "ink", "eraser");
array_unshift($items, "scissors");
array_pop($items);
?>
<?php include 'includes/header.php';?>

<h1>Order</h1>

// Write your code here
<?php print_r($items);?>

<?php include 'includes/footer.php';?>