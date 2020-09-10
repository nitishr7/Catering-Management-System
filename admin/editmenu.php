<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM menu WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
Main Category<br>
<select name="mcat">
	<option value="<?php echo $row['mcat']; ?>"><?php echo $row['mcat']; ?></option>
	<option value="specialty">Specialty</option>
	<option value="merienda">Starters</option>
	<option value="lunch_and_dinner">Lunch and Dinner</option>
</select>
<br>
Sub Category<br>
<select name="scat">
	<option value="<?php echo $row['scat']; ?>"><?php echo $row['scat']; ?></option>
	<option value="soup">Soup</option>
	<option value="salad">Salad</option>
	<option value="dessert">Dessert</option>
	<option value="beef">spicy</option>
	<option value="pork">Pork</option>
	<option value="chicken">Chicken</option>
	<option value="fish">Fish</option>
	<option value="pasta_noddles">Pasta & Noodles</option>
	<option value="vegetables">Vegetables</option>
</select><br>
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
Name<br>
<input type="text" name="name" value="<?php echo $row['name']; ?>" /><br>
Description<br>
<textarea name="description"><?php echo $row['description']; ?></textarea><br>
Price<br>
<input type="text" name="price" value="<?php echo $row['price']; ?>" /><br>
<input type="submit" value="Save" />
</form>
<?php
	}
?>