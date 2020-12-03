<?php

session_start();

echo "Loggging out...";

session_unset();
session_destroy();

$_SESSION = array();

header("location: ../homepage/homepage.php");
