<?php
$path = 'img/logo.png';
?>
<?php include 'includes/header.php';?>

<?php
print_r(pathinfo($path));
print_r(filesize($path));
print_r(mime_content_type($path))
?>
<?php include 'includes/footer.php';?>