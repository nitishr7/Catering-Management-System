<?php
	include('../connect.php');
	$id=$_GET['res'];
	$result = $db->prepare("SELECT * FROM reservation WHERE res_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="er.php" method="POST">
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
Team<br>
<select name="wapak">
<option><?php echo $row['team']; ?></option>
	<?php
	$results = $db->prepare("SELECT * FROM catering_team");
	$results->execute();
	for($i=0; $rows = $results->fetch(); $i++){
	?>
	<option><?php echo $rows['ct_name']; ?></option>
	<?php
	}
	?>
</select>
<br>
<input type="submit" value="Save" />
</form>
<?php
	}
?>