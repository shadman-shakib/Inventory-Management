<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<div class="header">
  	<h2>Inventory</h2>
  </div>
  <form method="post" action="home.php"> 
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Item Id</label>
  	  <input type="text" name="item_id" value="<?php echo $item_id; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Item Name</label>
  	  <input type="text" name="item_name" value="<?php echo $item_name; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Quantity</label>
  	  <input type="text" name="quantity" value="<?php echo $quantity; ?>">
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_inv">Add to Inventory</button>
  	</div>

  	<?php if (isset($_POST['add_inv'])) {

  		$item_id = mysqli_real_escape_string($db, $_POST['item_id']);
  		$item_name = mysqli_real_escape_string($db, $_POST['item_name']);
  		$quantity = mysqli_real_escape_string($db, $_POST['quantity']);

  		if (count($errors) == 0) {
  		$query = "INSERT INTO item VALUES('$item_id','$item_name' ,'$quantity')";
  		//$query = "INSERT INTO add_delet VALUES('$user_name',$item_id')";
  		mysqli_query($db, $query);
  		//mysqli_query($db, $query);
  		header('location: index.php');
  }
  	}


  	?>




  </form>
<body>


</body>
</html>