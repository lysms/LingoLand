<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
  if (!isset($_SESSION["firstname"])) {
    header("location: ../homepage/homepage.php");
  }
?>

<title>LingoLand</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>
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
        <form class="parse-text" action="./articleParser2.php" method="post">
            <div class="form-group">
                <label for="text">Copy text into text area for parsing</label>
                <textarea name="text" class="form-control" id="text" rows="15"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Parse Text</button>
        </form>
    </div>
</div>
<?php include('../includes/foot.inc.php');?>
