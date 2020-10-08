<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/home_navbar.php'); ?>
<div class="container">
  <div class="row d-flex align-items-center justify-content-center">
    <h2>
      Flashcard Maker 1/2
    </h2>
    <div class="progress w-100 mb-5">
      <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
  <div class="row"> 
    <form class = "parse-text">
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Copy text into text area for parsing</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="15"></textarea>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Parse Text</button>
    </form>
  </div>
</div>
<?php include('../includes/foot.inc.php');?>