<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
  if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['text']) ){
      $text = $_POST['text'];//assigning your input value
  }

?>
<link href="./articleParser.css" rel="stylesheet" type="text/css" />
<title>LingoLand</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>
<div id="sidebar-wrapper">
    <ul id="terms" class="sidebar-nav">
        <li class="sidebar-brand"> <a href="#"> Terms </a> </li>
    </ul>
</div> <!-- /#sidebar-wrapper -->
<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <h2>
            Flashcard Maker 2/2
        </h2>
        <div class="progress w-100 mb-5">
            <div class="progress-bar w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
    <div class="row d-flex flex-column language-to-translate">
        <h5>Choose Language to Translate</h5>
        <form>
            <select class="form-control form-control-sm">
                <option value="it">Italian</option>
                <option value="zh">Simplified Chinese</option>
                <option value="de">German</option>
                <option value="es">Spanish</option>
            </select>
        </form>
    </div>
    <div class="row">
        <form class="parse-text">
            <div class="form-group">
                <p class="article-text"> <?=$text;?>
                </p>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="jquery.highlight.js"></script>
<script type="text/javascript" src="articleParser.js"></script>
<?php include('../includes/foot.inc.php');?>