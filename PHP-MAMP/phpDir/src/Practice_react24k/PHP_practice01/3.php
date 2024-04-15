<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP */

if (1 > 0) {
	echo "I love PHP<br>";
}

else {
	echo "I love PHP<br>";
}

	/* Step 2: Make a forloop  that displays 10 numbers*/
	for ($x = 0; $x <= 10; $x++) {
		echo "$x <br>";
	  }
	  


	/* Step 3 : Make a switch Statement that test againts one condition with 5 cases */
$expression = "label1";

switch ($expression) {
	case "label1":
		echo 1;
	  break;
	case "label2":
		echo 2;
	  break;
	case "label3":
		echo 3;
	  break;
	case "label4":
		echo 4;
	  break;
	  case "label5":
		echo 5;
	  break;	

	default:
		echo 0;
  }
  
  
?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>