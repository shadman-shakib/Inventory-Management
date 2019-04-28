<?php
session_start();

// initializing variables
$user_name = "";
$full_name = "";
$email    = "";
$errors = array(); 
$item_id = "";
$item_name = "";
$quantity = "";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventory');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
  $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user_name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user_in WHERE user_name='$user_name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $user_name) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
echo "<script>window.alert('$password')</script>";
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    echo "<script>window.alert('$password')</script>";

  	$query = "INSERT INTO user_in (user_name, full_name, email, password) 
  			  VALUES('$user_name','$full_name' ,'$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['user_name'] = $user_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($user_name)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM user_in WHERE user_name='$user_name' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['user_name'] = $user_name;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>