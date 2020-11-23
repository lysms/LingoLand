<?php

session_start();
unset($_SESSION["firstname"]);
unset($_SESSION["lastname"]);
header("location: ../homepage/homepage.php");