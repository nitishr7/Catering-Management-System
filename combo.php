<form action="savecombo.php" method="post">
<input type="hidden" name="resres" value="<?php echo $_GET['res'];?>">
<input type="hidden" name="asa" value="<?php echo $_GET['id'];?>">
<input type="hidden" name="aggfgdg" value="<?php echo $_GET['addddd'];?>">
Pls. Select a Combo here:<br><select name="combo">
<?php
include('connect.php');
$asasa=$_GET['id'];
$result = $db->prepare("SELECT * FROM combo WHERE mcat= :userid");
$result->bindParam(':userid', $asasa);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['comboname']; ?>-<?php echo $row['combolist']; ?></option>
<?php
}
?>
</select><br>
<input type="submit" value="save">
</form>