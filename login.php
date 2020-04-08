<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login: Motobase</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="login.css" rel="stylesheet">
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
					<li class="nav-item">
						<a class ="nav-link" href="signup.html">Sign Up</a>
					</li>
					<li class="nav-item active">
						<a class ="nav-link" href="login.html">Login</a>
					</li>
				</ul>
			</div>
		</div>
</nav>

<div class="login-form">
  <h1>Member Login</h1>

  <form method="post" action="login.php">
		<?php include('errors.php'); ?>
    <input type="email" name="email" class="input-box" placeholder="Your Email">
    <input type="password" name="password" class="input-box" placeholder="Your Password">
    <button type="submit" name="login_user" class="login-btn">Login</button>
  </form>

</div>



		</body>
		</html>
