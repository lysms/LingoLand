<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>myTrips</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/home_navbar.php'); ?>
<div id="headerImg">
      <div id="welcomeText">
        <h1 style="font-size:50px">Welcome</h1>
        <h1 style="font-size:50px">to myTrips</h1>
        <form action="/action_page.php" method="get" id="form1">
          <a href="../Auth/login.php" id="login_btn">Login</a>
          <a href="../Auth/signup.php" id="signup_btn">Signup</a>
        </form>
      </div>
      <img src="header.jpg" id="headImg" alt="Wing of a plane">
    </div>


    <div id="main">
      <!-- welcome -->
      <!-- two buttons -->

  </div>
  <?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>