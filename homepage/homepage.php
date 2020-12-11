<?php
include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
include('../includes/functions.inc.php'); // functions
?>
<?php include('../includes/head.inc.php'); ?>

<link rel="stylesheet" type="text/css" href="homepage.css">
<?php include('../includes/home_navbar.php'); ?>
<div id=index>
    <div id="top" class="jumbotron" data-position="center right">
        <!--Our slogn and header about LingoLand -->
        <div class="container-fluid">
            <div class="row">
                <div id="lingoland-title" class="col-md-6">
                    <img alt="LingoLand" src="../resources/images/LLL.png" width="150px">
                    <h3 id="slogan">Read more. Study less.</h3>
                    <a type="button" id="learn-more" class="btn btn-info" href="../auth/auth.php">Get Started</a>
                </div>
                <div class="col-md-6">
                    <img class="home-image" src="../resources/images/foreign-language.jpg" alt="flashcards" />
                </div>
            </div>
        </div>
    </div>
    <div class="background-yellow">
        <div id="about-us" class="container">
            <h2>What is LingoLand?</h2>
            <p class="lead">
                "Language is the road map of a culture. It tells you where its people come from and where they are
                going."
                <br> - Rita Mae Brown
            </p>
            <hr>
            <!-- Description about LingoLand. -->
            <div class="row">
                <div class="col-4">
                    <h3>Language Learning</h3>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lingoland is a language learning platform which at its core, aims
                        to
                        improve reading comprehension proficiency in foreign languages through suggesting articles for
                        users
                        to read and providing a means for them to make flashcards
                        out of those articles.
                    </p>
                </div>
                <div class="col-4">
                    <img class="home-image" src="../resources/images/learning-language.jpg" alt="Language image" />
                </div>
                <div class="col-4">
                    <h3>Spaced Repetition System</h3>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Through our built-in spaced repetition system, we aim to help
                        users
                        learn more efficiently and decrease the amount of information a given user would need to look
                        through day-by-day.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="background-white">
        <div id="feature" class="container">
            <h2>Features</h2>
            <p class="lead">Want to know more about LingoLand? <br> Here are some core features related to LingoLand
            </p>
            <hr>
            <div class="row">
                <div class="col-4">
                    <h4>Flashcard Making System</h4>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You could be highlight terms that they are not familiar with a
                        different language through our flashcard making workflow, and be able to have flashcards
                        auto-filled
                        and generated for the terms in which they highlight (with
                        the term being the highlighted word, with the sentence in which it was parsed from), and the
                        definition being the translation. These cards will be tested based on a SRS algorithm.
                    </p>
                </div>
                <div class="col-8">
                    <img class="index" src="../resources/images/cardMaker.png">
                </div>
            </div>
            <hr>
            <div class="row">

                <div class="col-12">
                    <h3>Flashcard SRS system</h3>
                </div>
            </div>
            <div class="row d-flex flex-row align-items-center justify-content-center">
                <div class="col-6">
                    <figure>
                        <img class="index" src="../resources/images/front.png">
                    </figure>
                </div>
                <div class="col-6">
                    <figure>
                        <img class="index" src="../resources/images/back.png">
                    </figure>
                </div>
            </div>
            <hr>
            <a type="button" id="but" class="btn btn-info" href="../auth/auth.php">Explore More</a>
        </div>
    </div>

    <!-- Our team members session-->
    <div id="meet-the-team">
        <section id="images" class="container">
            <h2 class="index">Meet the Team</h2>
            <div class="row d-flex align-items-center justify-content-center">
                <figure class="col-md-4">
                    <div class="card">
                        <img class="card-img-top profile-image" src="../resources/images/aviss.jpg" alt="aviss">
                        <figcaption class="card-body">
                            <div>Sam Avis</div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="col-md-4">
                    <div class="card">
                        <img class="card-img-top profile-image" src="../resources/images/phil.jpg" alt="changp3">
                        <figcaption class="card-body">
                            <div>Philip Chang</div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="col-md-4">
                    <div class="card">
                        <img class="card-img-top profile-image" src="../resources/images/Profile.jpg" alt="changp3">
                        <figcaption class="card-body">
                            <div>Kristofer Kwan</div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="col-md-4">
                    <div class="card">
                        <img class="card-img-top profile-image" src="../resources/images/liny16.jpg" alt="liny16">
                        <figcaption class="card-body">
                            <div>Yanshen Lin</div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="col-md-4">
                    <div class="card">
                        <img class="card-img-top profile-image" src="../resources/images/Yuhao1.jpg" alt="wangy63">
                        <figcaption class="card-body">
                            <div>Yuhao Wang</div>
                        </figcaption>
                    </div>
                </figure>
            </div>
        </section>
    </div>
</div>
<?php include('../includes/foot.inc.php');
// footer info and closing tags
?>