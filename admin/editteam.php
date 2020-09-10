<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM catering_team WHERE ct_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="editteamexec.php" method="POST">
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
Team Name<br>
<input type="text" name="name" value="<?php echo $row['ct_name']; ?>" /><br>
Team Leader<br>
<input type="text" name="leader" value="<?php echo $row['ct_leader']; ?>" /><br>
<input type="submit" value="Save" />
</form>
<?php
	}
?>