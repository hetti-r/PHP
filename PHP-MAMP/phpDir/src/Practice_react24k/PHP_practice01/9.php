<?php session_start();
$cookieValue = "Hello!";
setcookie("Keksi", $cookieValue, time() + (86400 * 7));
?>

<?php include "functions.php";?>
<?php include "includes/header.php";?>



<section class="content">

  <aside class="col-xs-4">

    <?php Navigation();?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">



    <?php

/*  Create a link saying Click Here, and set
the link href to pass some parameters and use the GET super global to see it

Step 2 - Set a cookie that expires in one week

Step 3 - Start a session and set it to value, any value you want.
 */
$_SESSION["favouriteColor"] = "green";

?>

<link rel="stylesheet" href="">

<p><a href="9.php?source=3443">Click here</a></P>

<?php
if (isset($_GET['source'])) {
    echo $_GET['source'];
}
?>
  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php";?>