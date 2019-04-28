<?php 
  session_start(); 

  if (!isset($_SESSION['user_name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['user_name']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['user_name'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['user_name']; ?></strong></p>
      <div class="menu">
        <ul>
          <li><a href="home.php?" style="color: green;">Add Inventory</a></li>
          <li><a href="show.php?" style="color: #76D7C4"> Show Inventory </a></li>
          <li><a href="index.php?logout='1'" style="color: red;">logout</a></li>
        </ul>
      </div>
    <!-- 	<p> <a href="home.php?" style="color: green;">Home Page</a></p>
      <p> <a href="show.php?" style="color: #76D7C4"> Show Inventory </a></p>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p> -->

    <?php endif ?>
</div>
		
</body>
</html>