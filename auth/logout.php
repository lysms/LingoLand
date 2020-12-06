<?php

session_start();

echo "Logging out...";

session_unset();
session_destroy();

$_SESSION = array();

header("location: ../homepage/homepage.php");
