<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
  include('connection.php');
?>

<title>Register</title>


<?php include('../includes/head.inc.php'); ?>

<div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="auth.css">
    <scrip src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></scrip>
    <!------ Include the above in your HEAD tag ---------->

    <div class="sidenav">
        <div class="login-main-text">
            <h2>LingoLand<br> Registration Page</h2>
            <p>Enter information here.</p>
        </div>
    </div>
    <div class="main-auth">
        <div class="col-md-6 col-sm-12">
            <div class="register-form">
                <form action="register.php" method="post">


                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class=" form-control" placeholder="User Name" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="firstname">First Name</label>
                            <input type="firstname" name="firstname" class="form-control" placeholder="First Name"
                                required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastname">Last Name</label>
                            <input type="lastname" name="lastname" class="form-control" placeholder="Last Name"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password1">Confirm Password</label>
                        <input type="password" name="password1" class="form-control" placeholder="Password" required>
                    </div>


                    <select name="language">
                        <option value="" disabled selected>Choose your Language</option>
                        <option value="spanish">Spanish</option>
                        <option value="chinese">Chinese</option>
                        <option value="italian">Italian</option>
                    </select>

                    <div class="form-group">
                        <button type="submit" name="register" class="btn btn-black">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>