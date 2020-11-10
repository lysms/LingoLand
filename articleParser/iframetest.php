<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>
<title>LingoLand</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>
<div id="sidebar-wrapper">
    <ul id="terms" class="sidebar-nav">
        <li class="sidebar-brand"> <a href="#"> Terms </a> </li>
    </ul>
</div> <!-- /#sidebar-wrapper -->

<iframe id="article" src="http://lingoland/articleParser/proxy.php" title="Article Post" width="70%" height="1000px"></iframe>
<script type="text/javascript" src="jquery.highlight.js"></script>
<script type="text/javascript" src="helperFunctions.js"></script>
<script type="text/javascript" src="iframetest.js"></script>
<?php include('../includes/foot.inc.php');?>