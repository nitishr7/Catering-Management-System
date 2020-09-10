<form action="saveteammember.php" method="post">
Team Name<br>
<select name="team">
<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM catering_team");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<option><?php echo $row['ct_name']; ?></option>
<?php
}
?>
</select><br>
Team<br>
<textarea name="member"></textarea><br>
<input type="submit" value="Save">
</form>