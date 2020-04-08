<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup: Motobase</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="signup.css" rel="stylesheet">
	<!-- <script type="text/javascript" src="signup.js"></script> -->
</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.html"><img src="images/motobaseLogo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle = "collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class ="nav-link" href="index.html">Home</a>
					</li>
					<li class="nav-item active">
						<a class ="nav-link" href="signup.html">Sign Up</a>
					</li>
					<li class="nav-item">
						<a class ="nav-link" href="login.html">Login</a>
					</li>
				</ul>
			</div>
		</div>
</nav>

<div class="sign-up-form">
  <img src ="images/signup.png">
  <h1>Sign Up</h1>
  <form method="post" action="signup.php">
		<?php include('errors.php'); ?>
    <input type="email" class="input-box" placeholder="Your Email" name="email" value="<?php echo $email; ?>">
    <input type="password" class="input-box" placeholder="Your Password" name="password">
    <p><span><input type="checkbox" id ="checkbox"></span>I agree to the Motobase Terms of Services</p>
    <button type="submit" name="reg_user" class="signup-btn">Sign Up</button>
    <hr>
    <p class="or">OR</p>
    <p>Do you have an account? <a href="login.php"</a>Login</p>
  </form>

</div>



		</body>
		</html>
