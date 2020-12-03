<?php

if(!isset($_SESSION)) {
    session_start();
}

$username = "";
$password = "";
$firstname = "";
$lastname = "";
$language = "";

//connect to db

$db = mysqli_connect('localhost', 'root', '', 'lingoland') or die("could not connect to database");



// register users. 
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $user_check = "SELECT * FROM auth WHERE username = '$username' LIMIT 1";

    $result = mysqli_query($db, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            echo '<script>alert("Username is exist, please try a new one.");</script>';
        }
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT); // encrypt the password. 
        $query = "INSERT INTO auth (username, password, firstname, lastname, language) VALUES ('$username', '$password', '$firstname', '$lastname', '$language')";
        mysqli_query($db, $query);
        header("location: auth.php");
    }
}



//LOGIN user

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!empty($username)) {
        // $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT * FROM auth WHERE username = '$username'";
        $result = $db->query($query);

        $record = $result->fetch_assoc();
        // echo '<script>alert("' . $record['username'] . '");</script>';
	if (!isset($record['password'])) {
            echo '<script>alert("Wrong username or password.");</script>';
	}
	else if (password_verify($password, $record['password'])) {
            $_SESSION["firstname"] = $record['firstname'];
            $_SESSION["lastname"] = $record['lastname'];
            $_SESSION["id"] = $record['id'];
        } else {
            echo '<script>alert("Wrong username or password.");</script>';
        }
        // if (!isset($record['username']) || !isset($record['password'])) {
        //     echo '<script>alert("Wrong username or password.");</script>';
        // } else if ($username == $record['username'] && $password == $record['password']) {
        //     $_SESSION["firstname"] = $record['firstname'];
        //     $_SESSION["lastname"] = $record['lastname'];
        //     $_SESSION["id"] = $record['id'];
        // }
        if (isset($_SESSION["firstname"])) {
            header("location: ../dashboard/dashboard.php");
        }
    }
}
