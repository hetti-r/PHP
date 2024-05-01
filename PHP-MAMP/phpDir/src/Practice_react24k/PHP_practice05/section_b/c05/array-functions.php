<?php
// Write PHP code here

$greetings = array("Hi ", "Howdy ", "Hello ", "Hola ", "Cia ", "Moi", "Namaste ", "Welcome ");

$randomGreeting = array_rand($greetings);

$greetings = $greetings[$randomGreeting];

$bestsellers = array("notebook", "ink", "pencil");

$bestsellersCount = count($bestsellers);
$bestsellersText = implode(', ', $bestsellers);

$customer = ["forename" => "James", "surname" => "Bond", "email" => "hhh@shshsh.fi"];

if (array_key_exists("forename", $customer)) {
    $greetings .= $customer["forename"];
}

?>
<?php include 'includes/header.php';?>

<h1>Best Sellers</h1>

<p><?=$greetings?></p>
<p>Our top <?=$bestsellersCount?> items today are:
  <b><?=$bestsellersText?> </b>
</p>

<?php include 'includes/footer.php';?>