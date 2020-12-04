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
      <div id="card_area" class="flashcard">
        <div class="card_content">
        <div class="front">
            <h5 id = "question" class="flashcard-content card-title"></h5>
          </div>
          <div class="back">
            <h5 id = "answer" class="flashcard-content card-title"></h5>
          </div>
        </div>
  </div>
    <!-- <main id="card_area">
        <h2 class="flashcard" id="answer"></h2>
    </main> -->

    <section id="user_input">
        <button type="button" class="btn btn-secondary" id="show_button" onclick="showAnswer()">Show Answer</button>
        <button type="button" class="btn btn-outline-danger" id="edit_button" onclick="enterEditMode()">Edit Card</button>
    </section>

    <script src="flashcards.js"></script>
</div>
<?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>