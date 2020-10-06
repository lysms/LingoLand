<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>LingoLand</title>

<?php include('../includes/head.inc.php'); ?>

<?php include('../includes/home_navbar.php'); ?>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand"> <a href="#"> Terms </a> </li>
        <div class="card background-green mb-4" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">Term</h5>
                <p class="card-subtitle mb-2 text-muted">"vediamo!"</p>
                <h5 class="card-title">Translation</h5>
                <p class="card-subtitle mb-2 text-muted">see (in the we conjugate of italian)</p>
                <h5 class="card-title">Context</h5>
                <p class="card-subtitle mb-2 text-muted">"Ciao Silvia, da quanto tempo non ci vediamo!"</p>
                <button type="submit" class="btn btn-secondary mb-2">Make Flashcard</button>
            </div>
        </div>
        <div class="card background-pink mb-4" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">Term</h5>
                <p class="card-subtitle mb-2 text-muted">"vediamo!"</p>
                <h5 class="card-title">Translation</h5>
                <p class="card-subtitle mb-2 text-muted">see (in the we conjugate of italian)</p>
                <h5 class="card-title">Context</h5>
                <p class="card-subtitle mb-2 text-muted">"Ciao Silvia, da quanto tempo non ci vediamo!"</p>
                <button type="submit" class="btn btn-secondary mb-2">Make Flashcard</button>
            </div>
        </div>
        <div class="card background-light-blue mb-4" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">Term</h5>
                <p class="card-subtitle mb-2 text-muted">"vediamo!"</p>
                <h5 class="card-title">Translation</h5>
                <p class="card-subtitle mb-2 text-muted">see (in the we conjugate of italian)</p>
                <h5 class="card-title">Context</h5>
                <p class="card-subtitle mb-2 text-muted">"Ciao Silvia, da quanto tempo non ci vediamo!"</p>
                <button type="submit" class="btn btn-secondary mb-2">Make Flashcard</button>
            </div>
        </div>
    </ul>
</div> <!-- /#sidebar-wrapper -->
<div class="container">
  <div class="row d-flex align-items-center justify-content-center">
    <h2>
      Flashcard Maker 2/2
    </h2>
    <div class="progress w-100 mb-5">
      <div class="progress-bar w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
  <div class="row"> 
    <form class = "parse-text">
      <div class="form-group">
        <p> 
            Marta: Ciao Silvia, da quanto tempo non ci <span class="background-green">vediamo</span>! Come stai? <br>
            Silvia: Bene grazie. Che piacere vederti! Sono <span class="background-pink">appena</span> tornata da Londra. Sono stata lì tre mesi per studiare inglese. <br>
            Marta: E come è andata? <br>
            Silvia: È stata un’esperienza molto interessante. Ho migliorato il mio inglese e ho conosciuto tante persone. A proposito ti presento Beth. Ci siamo conosciute in 
            <span class = "background-light-blue">Inghilterra</span>. Beth è qui per studiare l’italiano. <br>
            Marta: Piacere di conoscerti Beth. Benvenuta in Italia. <br>
            Silvia: Domani sera pensiamo di andare al cinema. Vuoi venire anche tu? <br>
        </p>
      </div>
    </form>
  </div>
</div>
<?php include('../includes/foot.inc.php');?>