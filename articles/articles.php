<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand</title>
    <!-- Self-Defined CSS file -->
    <link rel="stylesheet" type="text/css" href="articles.css">


<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>
<div class="Backgroundimg-body">
<!-- Place html here --> 
    <h2 class="BigHead">Suggested Articles</h2>
    <div class="MenuPosition">
        <!-- Dropdown menu for users -->
        <!-- First Menu -->
        <div id="Dropdown1-div" class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="dropdownMenuButtonPri">Article Classes
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a id="Technology" href="#">Technology</a></li>
                <li><a id="Humanity" href="#">Humanity</a></li>
                <li><a id="Politics" href="#">Politics</a></li>
            </ul>
        </div>
        <!-- Second Menu -->
        <div id="Dropdown2-div" class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Language
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a id="English" class="dropdown-item" href="#">English</a>
                <a id="Germany" class="dropdown-item" href="#">Germany</a>
                <a id="Chinese" class="dropdown-item" href="#">Chinese</a>
            </div>
        </div>
    </div>
    <div id="Left-Resources">
        <!-- API for voicespeaker -->
        <textarea id="txt" cols="45" rows="17"></textarea>
        <input onclick="speakText()" type="button" value="submit">
        <input onclick="stopSpeak()" type="button" value="stop">
    </div>
    <div id="Right-Resources">
        We will provide more resources here for any clients who are seeking for more articles in the language they want.
    </div>
    <div id="Output-div">Here will be the output of the articles</div>
    <!-- Self-Defined JavaScript file -->
    <script src="articles.js"></script>
    <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
</div>

  <?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>