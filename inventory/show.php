<!-- <?php 
include_once('server.php');
$query="SELECT * FROM item";
$result=mysqli_query($query);
?> -->
<!DOCTYPE html>
<html>
<head>
	<title>Show Inventory</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
  	<h2>Show Inventory</h2>
  </div>
 <!--  <form action="show.php" method="post"> -->
  	 <li><a href="index.php" style="color: red;">HOME</a></li>
  <table align="center" border="1px" style="width: 700px; line-height: 40px">
  	<tr>
  		<th colspan="4">Inventory</th>
  	</tr>
  	<t>
  		<th> Item ID </th>
  		<th> Item name </th>
  		<th> Quantity </th>
  		<th> Add </th>
  		<th> Delete </th>
  	</t>
  	<?php
  	$db = mysqli_connect('localhost', 'root', '', 'inventory');
  	$query_chk="SELECT * FROM item";
  	$result=mysqli_query($db,$query_chk);
  	$add_item = "";
	  $delete_item = "";
  	//$rows=mysqli_fatch_assoc($results);
  	//if (mysqli_num_rows($result) > 0){
  	while ($rows=mysqli_fetch_assoc($result)) {
  		?>
  		<!-- <?php 
  			if (isset($_POST['add'])){
  				$add =$_POST['add'];
  				//$delete = mysqli_real_escape_string($db, $_POST['delete']);
  				$q= "UPDATE item SET quantity='$add'";
  				 if(mysqli_query( $db, $q )){
        			header('location:show.php');
        		}

  			}

  		?> -->
  		<tr>
  			<td><?php echo $rows['item_id']; ?></td>
  			<td><?php echo $rows['item_name']; ?></td>
  			<td><?php echo $rows['quantity']; ?></td>

  			 <td><?php echo $rows['add_item']; ?> <input type="text" name="add"><br> <button type="submit" name="add" class="btn btn-outline-secondary btn-sm" value="<?php echo $row['item_id']; ?>">Add </button></td>
  			
  			<td><?php echo $rows['delete_item']; ?> <input type="text" name="delete"><br> <button type="submit" name="delete" class="btn btn-outline-secondary btn-sm" value="">Delete </button></td>
			  		 
  		</tr>

  		<?php
  		}
  	//	}	
  		?>
  </table>


</body>
</html>