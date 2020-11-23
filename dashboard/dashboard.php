<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand &#8212; Dashboard</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>

<?php 
$userID = 1;
$query = 'select * from flashcards where userID = '. $userID .' order by duedate';
$reviewQuery = 'select * from flashcards where duedate <= "' .
    (new DateTime('now'))->format('Y-m-d H:i:s') . '" and userID = '. $userID;

$reviewCount = 0;
$cardCount = 0;

$dbOk = false;
@ $db = new mysqli('localhost', 'root', '', 'lingoland');
if($db->connect_error){
    echo "Database Error";
} 
else{
    $dbOk = true; 
    $cardCount = $db->query($query)->num_rows;
    $reviewCount = $db->query($reviewQuery)->num_rows;
}
 ?>
<div id="headerImg">
    <div id="main" class="background-light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img id="profile-img" src="../resources/images/profile-image.jpeg" width="250"
                        alt="profile image" />
                </div>
                <div class="col-md-6">
                    <h2 class="profile-name">John Stevens</h2>
                    <p>Hi! My name is John, and i'm currently learning italian. Super into soccer, so been reading alot
                        of soccer related news in italian. Va Milano</p>
                    <h3 class="info-item language">Language: Italian</h3>
                    <h3 class="info-item num-cards">Number of cards per day: 10</h3>
                </div>
            </div>
        </div>
    </div>
    <div id="main" class="">
        <div class="container">
            <div class="row experience-item">
                <h3 class="col-12">Study</h3>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <select name="deck" id="deckSelect" oninput="getData()">
                      <option value="english">English</option>
                      <option value="italian">Italian</option>
                      <option value="spanish">Spanish</option>
                      <option value="french">French</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button onclick="doReviews()" id="reviewButton" class="btn btn-secondary activity">Review Daily Flashcards ( 0 )</button>
                </div>
                <div class="col-md-3">
                    <a href="../flashcards/flashcards.php" class="btn btn-secondary activity">Review all Flashcards ( <?php echo $cardCount; ?> )</a>
                </div>
                <div class="col-md-3">
                    <a href="../articles/articles.php" class="btn btn-success activity">Review Article</a>
                </div>
            </div>
        </div>
    </div>
    <div id="main" class="">
        <div class="container">
            <div class="row experience-item">
                <h3 class="col-12">Terms</h3>
            </div>
            <div class="row experience-item">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead class='thead-light'>
                            <tr class="d-flex">
                                <th class="col-2">Deck</th>
                                <th class="col-3">Front</th>
                                <th class="col-3">Back</th>
                                <th class="col-3">Due Date</th>
                                <th class="col-3"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            if($dbOk){

                            $result = $db->query($query);

                            for ($i=0; $i < $cardCount; $i++) {
                                $card = $result->fetch_assoc();
                                echo "<tr class=\"d-flex\">";
                                echo "<th class=\"col-2\">".$card["deck"]."</th>";
                                echo "<th class=\"col-3\">".$card["front"]."</th>";
                                echo "<th class=\"col-3\">".$card["back"]."</th>";
                                echo "<th class=\"col-3\">".$card["duedate"]."</th>";
                                echo "<th class=\"col-3\">".
                                "<button onclick=\"deleteCard(".$card["cardid"].")\" role=\"button\" class=\"btn btn-danger\">Delete</button></th>";
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
    <?php include('../includes/foot.inc.php');?>