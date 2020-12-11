<?php

session_start();

echo "Logging out...";
// Destroy the session and logout the users.
session_unset();
session_destroy();

$_SESSION = array();

header("location: ../homepage/homepage.php");