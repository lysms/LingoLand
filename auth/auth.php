<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
  include('connection.php');
?>

<title>Login</title>

<?php include('../includes/head.inc.php'); ?>


<div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="auth.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="sidenav">
        <div class="login-main-text">
            <h2>LingoLand<br> Login Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main-auth">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form action="auth.php" method="post">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" name="username" class="form-control" placeholder="User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="submit" value="Login" name="login" class="btn btn-black"/>
                    <a href="register.php" class="btn btn-secondary">Register</a>
                </form>
            </div>
        </div>
        <div class="whitespace"></div>
    </div>
    <?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>
