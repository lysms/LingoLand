<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand</title>
    <!-- Self-Defined CSS file -->
    <link rel="stylesheet" type="text/css" href="articles.css">


<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/home_navbar.php'); ?>
<div class="Backgroundimg-body">
<!-- Place html here --> 
    <h2 class="BigHead">Suggested Articles</h2>
    <div class="MenuPosition">
        <!-- Dropdown menu for users -->
        <div>
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
    </div>
    <div id="Output-div"></div>
    <div>
        <!-- API for searching text by different languages -->
        <iframe src="https://api.gdeltproject.org/api/v1/search_ftxtsearch/search_ftxtsearch?query=sourcecountry:nigeria&output=wordcloud&sort=desc" height="500" scrolling="no" width=500></iframe>
        <!-- API for voicespeaker -->
        <textarea id="txt" cols="50" rows="10"></textarea>
        <input onclick="speakText()" type="button" value="submit">
        <input onclick="stopSpeak()" type="button" value="stop">
    </div>
    <!-- Self-Defined JavaScript file -->
    <script src="articles.js"></script>
    <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
</div>

  <?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>