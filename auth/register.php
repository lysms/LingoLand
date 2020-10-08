<?php
  include('../includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('../includes/functions.inc.php'); // functions
?>

<title>Register</title>

<?php include('../includes/head.inc.php'); ?>
<?php include('../includes/home_navbar.php'); ?>
  <div>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="auth.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
			<div class="login-main-text">
			<h2>LingoLand<br> Registration Page</h2>
			<p>Enter information here.</p>
			</div>
		</div>
		<div class="main">
			<div class="col-md-6 col-sm-12">
			<div class="login-form">
				<form>
					<div class="form-group">
						<label>User Name</label>
						<input type="text" class="form-control" placeholder="User Name">
					</div>
					<div class="row">
					<div class="col-sm-6">
						<label>First Name</label>
						<input type="firstname" class="form-control" placeholder="First Name">
						</div>
						<div class="col-sm-6">
						<label>Last Name</label>
						<input type="lastname" class="form-control" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
					<label>Retype Password</label>
					<input type="retype" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
					<label>Language</label>
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Choose Language...
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Spanish</a>
							<a class="dropdown-item" href="#">Chinese</a>
							<a class="dropdown-item" href="#">Italian</a>
						</div>
					</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-black">Register</button>
					</div>
				</form>
			</div>
			</div>
		</div>
  <?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>