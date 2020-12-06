<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $db = mysqli_connect('localhost', 'root', '', 'lingoland') or die("could not connect to database");

    $showLoginSignup = true;
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
        $showLoginSignup = false;
    }
?>
