<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
<section class="content">

  <aside class="col-xs-4">
    <?php Navigation();?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">


    <?php 


/* Step1: Use a pre-built math function here and echo it */

echo exp(10);

	/* Step 2:  Use a pre-built string function here and echo it */

  echo substr("Bye World", 2, 8);

	/* Step 3:  Use a pre-built Array function here and echo it

 */
$array = array_fill(1, 6, 'apple ');
echo "<br>".implode($array);
	
?>





  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php"; ?>