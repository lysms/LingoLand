<?php

if (!isset($_SESSION)) {
    session_start();
}

// Create the variable.
$username = "";
$password = "";
$firstname = "";
$lastname = "";
$language = "";

//connect to db

$db = mysqli_connect('localhost', 'root', '', 'lingoland') or die("could not connect to database");


// This section is for new sign up users. 
// register users. 
if (isset($_POST['register'])) {
    // Get the data from the input value.
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    // Check the users name is duplicates or not. 
    $user_check = "SELECT * FROM auth WHERE username = '$username' LIMIT 1";

    $result = mysqli_query($db, $user_check);
    $user = mysqli_fetch_assoc($result);
    // If there is a duplicates usersname, it will pop us an error.
    if ($user) {
        if ($user['username'] === $username) {
            echo '<script>alert("Username is exist, please try a new one.");</script>';
        }
    } else {
        // If not, process the user information into our database, and grant a permission for the user to log in our platform.
        $password = password_hash($password, PASSWORD_DEFAULT); // encrypt the password. 
        $query = "INSERT INTO auth (username, password, firstname, lastname, language) VALUES ('$username', '$password', '$firstname', '$lastname', '$language')";
        mysqli_query($db, $query);
        header("location: auth.php");
    }
}


// This session is for Login users. 
//LOGIN user

if (isset($_POST['login'])) {
    // Get the user input and assign into our local variable
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // If the variable is not empty. Process the selection in database. and compare the password with the password in database.
    if (!empty($username)) {
        $query = "SELECT * FROM auth WHERE username = '$username'";
        $result = $db->query($query);

        $record = $result->fetch_assoc();
        // echo '<script>alert("' . $record['username'] . '");</script>';
        if (!isset($record['password'])) {
            echo '<script>alert("Wrong username or password.");</script>';
        } else if (password_verify($password, $record['password'])) {
            // Also create a session for this user. 
            $_SESSION["firstname"] = $record['firstname'];
            $_SESSION["lastname"] = $record['lastname'];
            $_SESSION["id"] = $record['id'];
            $_SESSION['logged_in'] = 1;
        } else {
            echo '<script>alert("Wrong username or password.");</script>';
        }
        if (isset($_SESSION["firstname"])) {
            header("location: ../dashboard/dashboard.php");
        }
    }
}