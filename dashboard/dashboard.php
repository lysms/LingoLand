<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand &#8212; Dashboard</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>
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
                    <a href="../flashcards/flashcards.php" class="btn btn-secondary activity">Review Daily
                        Flashcards</a>
                </div>
                <div class="col-md-3">
                    <a href="../flashcards/flashcards.php" class="btn btn-secondary activity">Review all Flashcards</a>
                </div>
                <div class="col-md-3">
                    <a href="../flashcards/flashcards.php" class="btn btn-secondary activity">Review Random
                        Flashcards</a>
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
                                <th class="col-3">Term</th>
                                <th class="col-3">Definition</th>
                                <th class="col-3">Context</th>
                                <th class="col-3"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-flex">
                                <th class="col-3"> "vediamo!"</th>
                                <th class="col-3"> see(in the we conjugate of italian) </th>
                                <th class="col-3"> Ciao Silvia, da quanto tempo non ci vediamo!</th>
                                <th class="col-3">
                                    <a role="button" class="btn btn-danger" href="#">Delete</a>
                                </th>
                            </tr>
                            <tr class="d-flex">
                                <th class="col-3"> "vediamo!"</th>
                                <th class="col-3"> see(in the we conjugate of italian) </th>
                                <th class="col-3"> Ciao Silvia, da quanto tempo non ci vediamo!</th>
                                <th class="col-3">
                                    <a role="button" class="btn btn-danger" href="#">Delete</a>
                                </th>
                            </tr>
                            <tr class="d-flex">
                                <th class="col-3"> "vediamo!"</th>
                                <th class="col-3"> see(in the we conjugate of italian) </th>
                                <th class="col-3"> Ciao Silvia, da quanto tempo non ci vediamo!</th>
                                <th class="col-3">
                                    <a role="button" class="btn btn-danger" href="#">Delete</a>
                                </th>
                            </tr>
                            <tr class="d-flex">
                                <th class="col-3"> "vediamo!"</th>
                                <th class="col-3"> see(in the we conjugate of italian) </th>
                                <th class="col-3"> Ciao Silvia, da quanto tempo non ci vediamo!</th>
                                <th class="col-3">
                                    <a role="button" class="btn btn-danger" href="#">Delete</a>
                                </th>
                            </tr>
                            <tr class="d-flex">
                                <th class="col-3"> "vediamo!"</th>
                                <th class="col-3"> see(in the we conjugate of italian) </th>
                                <th class="col-3"> Ciao Silvia, da quanto tempo non ci vediamo!</th>
                                <th class="col-3">
                                    <a role="button" class="btn btn-danger" href="#">Delete</a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('../includes/foot.inc.php');?>