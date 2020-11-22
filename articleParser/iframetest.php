<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
  $uri = "";
  if(isset($_GET['uri'])){
    $uri = $_GET['uri'];
  } else {
    echo json_encode(array('error' => 'invalid url'));
  }
  

?>
<title>LingoLand</title>
<link rel="stylesheet" type="text/css" href="article.css">
<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>
<?php include('../sidebar/sidebar.php'); ?>

<div id="article-page" class="page-content-wrapper">
<div class="navbar-dark">
<iframe id="article" src="/articleParser/proxy.php?uri=<?= $uri ?>" title="Article Post" width="100%" height="1000px"></iframe>
<?php include('../includes/foot.inc.php');?>
</div>
<!-- /#sidebar-wrapper -->

<script type="text/javascript" src="jquery.highlight.js"></script>
<script type="text/javascript" src="helperFunctions.js"></script>
<script type="text/javascript" src="iframetest.js"></script>