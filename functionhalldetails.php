<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM functionhall WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<img src="images/FUNC/<?php echo $row['picture']; ?>" width="500"><br><br>
Description : <strong><?php echo $row['description']; ?></strong><br>
<?php
	}
?>