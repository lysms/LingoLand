<?php 

session_start();

$username = "";
$password = "";


$errors = array();

//connect to db

$db = mysqli_connect('localhost', 'root', '', 'auth') or die("could not connect to database");

// register users. 



if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

if (isset($_POST['password1'])) {
    $password1 = $_POST['password1'];
}

if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
}

if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
}



//form validation
if(empty($username)){
    array_push($errors, "Username is required");
}

if(empty($password)){
    array_push($errors, "Password is required");
}
if(empty($password1)){
    array_push($errors, "Confirmed Password is required");
}
if(empty($firstname)){
    array_push($errors, "FirstName is required");
}

if(empty($lastname)){
    array_push($errors, "Last name is required");
}



// check db for existing user with the same username

$user_check = "SELECT * FROM auth WHERE username = '$username' LIMIT 1";

$result = mysqli_query($db, $user_check);
$user = mysqli_fetch_assoc($result);

if($user){
    if($user['username'] === $username){
        array_push($errors, "Username already exists");
    }
}

// Process the Registeration. 
if(count($errors) == 0){
    $password = md5($password); // encrypt the password. 
    $query = "INSERT INTO auth (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";
    mysqli_query($db, $query);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    header("localhost: ../../dashboard/dashboard.php");
}










?>