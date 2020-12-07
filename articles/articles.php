<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if (!isset($_SESSION["firstname"])) {
    header("location: ../auth/auth.php");
}

?>

<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand</title>
    <!-- Self-Defined CSS file -->
    <link rel="stylesheet" type="text/css" href="articles.css">


<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>
<div class="Backgroundimg-body page-content">
<!-- Place html here --> 
    <h2 class="header d-flex align-items-center justify-content-center pt-4">Suggested Articles</h2>
    
    <form id="search-articles" class="MenuPosition container">    
        <div class="search-filters row"> 
            <!-- Dropdown menu for users -->
            <!-- First Menu -->
            <div class="form-group col-md-8">
                <input id="search-filter" name="search-filter" type="text" class="form-control" id="topic" placeholder="Choose Topic" required>
            </div>
            <!-- Second Menu -->
            <div id="Dropdown2-div" class="col-md-2 dropdown">
                <select id="language-select" name="language" class="form-control" aria-labelledby="dropdownMenuButton" required>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" id="search" class="btn btn-dark button" placeholder="Search">Search</button>
            </div>    
        </div>
    </form>
    
    <div id="articles-output-section" class="container">
        <ul id="articles" class="list-group">
        </ul>
    </div>
    <script src="articles.js"></script>
</div>

  <?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>
