<form action="add.php" method="POST" enctype="multipart/form-data">
Main Category<br>
<select name="mcat">
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM maincategory");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select>
<br>
Sub Category<br>
<select name="scat">
	<?php
	$result = $db->prepare("SELECT * FROM subcategory");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select><br>
Name<br>
<input type="text" name="name" value="" /><br>
Description<br>
<textarea name="description"></textarea><br>
Price<br>
<input type="text" name="price" value="" /><br>
Menu Image: <br />
<input type="file" name="image" class="ed"><br />
<input type="submit" value="Save" />
</form>