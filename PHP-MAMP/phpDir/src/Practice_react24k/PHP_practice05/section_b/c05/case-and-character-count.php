<?php
$text = 'Home sweet home';
?>
<?php include 'includes/header.php';?>

<p>
<?=strtolower($text);?>
<?=strtoupper($text);?>
<?=strlen($text);?>
<?=str_word_count($text);?>
</p>

<?php include 'includes/footer.php';?>