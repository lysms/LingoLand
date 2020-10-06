<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand &#8212; Review</title>
<link rel="stylesheet" href="flashcards.css">

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/home_navbar.php'); ?>
<div>
<!-- Place html here --> 

  <section id="info">
    <h3 id="review_count">999 cards left</h3>
    <h3 id="accuracy">100% correct</h3>
  </section>
  
  <main>
    <h2 class="card" id="question">This is an example question in the english language. It is here in order to test text alignment of the CSS.</h2>
    <h2 class="card" id="answer">example: [definition of example in NL]</h2>
  </main>

  <button type="button" id="show_button" onclick="showAnswer()">Show Answer</button>
  <section id="answer_box">
  	<button type="button" class="answer_button" onclick="answer()">Again</button>
 		<button type="button" class="answer_button" onclick="answer()">Correct</button>
  </section>
  

  <button type="button" id="edit_button">Edit Card</button>


  <!-- basic temp functionality -->
  <script>
    function showAnswer() {
      document.getElementById("answer").style.visibility = "visible";
      document.getElementById("show_button").style.visibility = "hidden";
      document.getElementById("answer_box").style.visibility = "visible";
    }
    function answer() {
      document.getElementById("answer").style.visibility = "hidden";
      document.getElementById("show_button").style.visibility = "visible";
      document.getElementById("answer_box").style.visibility = "hidden";
    }
  </script>
</div>
  <?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>