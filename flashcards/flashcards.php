<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand &#8212; Review</title>


<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/regular_nav.php'); ?>


<link rel="stylesheet" href="flashcards.css">
<div>
    <!-- Place html here -->
    <section id="info">
        <h3 id="review_count">999 cards left</h3>
        <h3 id="accuracy">100% correct</h3>
    </section>

    <main>
        <h2 class="flashcard" id="question"></h2>
        <h2 class="flashcard" id="answer"></h2>
    </main>

    <section id="user_input">
        <button type="button" id="show_button" onclick="showAnswer()">Show Answer</button>
        <button type="button" id="edit_button">Edit Card</button>
    </section>

    <script src="flashcards.js"></script>
</div>
<?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>