<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM menu WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<img src="menu/<?php echo $row['image']; ?>" width="500"><br><br>
Name : <strong><?php echo $row['name']; ?></strong><br>
Description : <strong><?php echo $row['description']; ?></strong><br>
price : <strong><?php echo $row['price']; ?></strong><br>
<?php
	}
?>