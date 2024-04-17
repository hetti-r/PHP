<?php include "functions.php";?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>


		</aside><!--SIDEBAR-->



	<article class="main-content col-xs-8">


	<?php

/*  Step 1 -Make a variable with some text as value

Step 2 - Use crypt() function to encrypt it

Step 3 - Assign the crypt result to a variable

Step 4 - echo the variable

 */

$password = "mypassword";
$hasFormat = "$2y$05$";
$salt = "asedfasefasdfasdfasdfasdfasdf22";
$hashFormatandSalt = $hasFormat . $salt;
$encryped_password = crypt($password, $hashFormatandSalt);
echo $encryped_password;
echo "<br>";

?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php";?>