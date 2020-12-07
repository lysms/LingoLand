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
include('../auth/connection.php');
?>

<title>LingoLand &#8212; Dashboard</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>


<?php

$userID = $_SESSION["id"];
$query = 'select * from flashcards where userID = ' . $userID . ' order by duedate';
$reviewQuery = 'select * from flashcards where duedate <= "' .
    (new DateTime('now'))->format('Y-m-d H:i:s') . '" and userID = ' . $userID;

$reviewCount = 0;
$cardCount = 0;

$dbOk = false;
@$db = new mysqli('localhost', 'root', '', 'lingoland');
if ($db->connect_error) {
    echo "Database Error";
} else {
    $dbOk = true;
    $cardCount = $db->query($query)->num_rows;
    $reviewCount = $db->query($reviewQuery)->num_rows;
}
?>
<link rel="stylesheet" type="text/css" href="dashboard.css">
<div id="headerImg">
    <div id="main" class="background-light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img id="profile-img" src="../resources/images/Lion.png" width="250"
                        alt="profile image" />
                </div>
                <div class="col-md-6">
                    <h2 class="profile-name">Welcome <?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?>
                    </h2>
                    <p class="lead">Look below to find some flashcards to review!</p>
                </div>
            </div>
        </div>
    </div>
    <div id="main" class="flashcard-sections">
        <div class="container">
            <div class="row experience-item">
                <h3 class="header col-12">Study</h3>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <select name="deck" id="deckSelect" class="form-control" oninput="getData()">
                    </select>
                </div>
                <div class="col-md-3">
                    <button onclick="doReviews()" id="reviewButton" class="btn btn-secondary activity">Review Daily
                        Flashcards (0) <i class="far fa-lightbulb"></i></button>
                </div>
                <div class="col-md-2">

                    <a href="../articles/articles.php" class="d-flex flex-column align-items-center justify-content-center btn btn-success activity">Find New Articles <i class="fas fa-newspaper"></i> </a>
                </div>
            </div>
        </div>
    </div>
    <div id="main" class="flashcard-sections">
        <div class="container">
            <div class="row experience-item">
                <h3 class="header col-12">Terms</h3>
            </div>
            <div class="row">
                <div class="col-12 flashcard-table">
                    <table class="table table-striped">
                        <thead class='thead-dark'>
                            <tr class="d-flex">
                                <th class="col-2">Deck</th>
                                <th class="col-3">Front</th>
                                <th class="col-3">Back</th>
                                <th class="col-3">Due Date</th>
                                <th class="col-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if ($dbOk) {

                                $result = $db->query($query);

                                for ($i = 0; $i < $cardCount; $i++) {
                                    $card = $result->fetch_assoc();
                                    echo "<tr class=\"d-flex\">";
                                    echo "<th class=\"col-2\">" . $card["deck"] . "</th>";
                                    echo "<th class=\"col-3\">" . $card["front"] . "</th>";
                                    echo "<th class=\"col-3\">" . $card["back"] . "</th>";
                                    echo "<th class=\"col-3\">" . $card["duedate"] . "</th>";
                                    echo "<th class=\"col-1\">" .
                                        "<button onclick=\"deleteCard(" . $card["cardid"] . ")\" role=\"button\" class=\"btn btn-danger\">Delete</button></th>";
                                    echo "</tr>";
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="dashboard.js"></script>
    <?php include('../includes/foot.inc.php'); ?>
