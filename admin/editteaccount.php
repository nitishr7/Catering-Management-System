<?php
	include('../connect.php');
	$id=$_GET['id'];
	$results = $db->prepare("SELECT * FROM user WHERE id= :userid");
	$results->bindParam(':userid', $id);
	$results->execute();
	for($i=0; $rows = $results->fetch(); $i++){
?>
<form action="saveeditaccount.php" method="post">
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
Username<br>
<input type="text" name="username" value="<?php echo $rows['username']; ?>" /><br>
Password<br>
<input type="text" name="password" value="<?php echo $rows['password']; ?>" /><br>
Power<br>
<input type="text" name="power" value="<?php echo $rows['power']; ?>" /><br>
<input type="submit" value="Save">
</form>
<?php
}
?>