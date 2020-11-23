<?php
include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
include('../includes/functions.inc.php'); // functions
include('connection.php');
?>

<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php include('../includes/head.inc.php'); ?>


<div class="container">
    <div class="myCard">
        <div class="row">
            <div class="col-md-6">
                <div class="myLeftCtn">
                    <form class="myForm text-center" action="auth.php" method="post">
                        <header>Log in</header>
                        <div class="form-group">
                            <i class="fas fa-user"></i>
                            <input class="myInput" type="text" name="username" placeholder="Username" id="username" required>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>



                        <div class="form-group">
                            <i class="fas fa-lock"></i>
                            <input class="myInput" placeholder="Password" type="password" name="password" id="password" required>
                        </div>

                        <input type="submit" class="butt" value="LOGIN" name="login">
                        <p class="need">Need an account? <i class="fa fa-arrow-circle-right"></i><a class="regi" href="register.php">CREATE ACCOUNT</a></p>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="myRightCtn">
                    <div class="box">
                        <header>Welcome to LingoLand!</header>

                        <p>Create a account to start having fun in LingoLand! </p>
                        <p>Read More, Study Less.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div>
    <!-- <div class="sidenav">
        <div class="login-main-text">
            <h2>LingoLand<br> Login Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div> -->
    <!-- <div class="main-auth">
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
                    <input type="submit" value="Login" name="login" class="btn btn-black" />
                    <a href="register.php" class="btn btn-secondary">Register</a>
                </form>
            </div>
        </div>
        <div class="whitespace"></div>
    </div> -->
    <?php include('../includes/foot.inc.php');
    // footer info and closing tags
    ?>