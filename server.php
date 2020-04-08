<?php
session_start();

// initializing variables
$email    = "";
$errors = array();
$exercises = array();

// connect to the database be sure to update with your database info!
$db = mysqli_connect('localhost', 'root', '', 'motobase');

// REGISTER USER
if (isset($_POST['reg_user'])) {

  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }


  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;

  	$query = "INSERT INTO Users (email, password)
  			  VALUES('$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: mainPage.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {

  	$query = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $email;
  	  $_SESSION['success'] = "You are now logged in";

      // direct user to next page upon successful login
  	  header('location: mainPage.php');
  	}else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}


?>
