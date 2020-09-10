<?php
function formatMoney($number, $fractional=false) {
		if ($fractional) {
			$number = sprintf('%.2f', $number);
		}
		while (true) {
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
			if ($replaced != $number) {
				$number = $replaced;
			} else {
				break;
			}
		}
		return $number;
	}
?>
<script type="text/javascript">
function checkAll(checkEm) {
    var cbs = document.getElementsByTagName('input');
    for (var i = 0; i < cbs.length; i++) {
        if (cbs[i].type == 'checkbox') {
            if (cbs[i].name == 'menu[]') {
                cbs[i].checked = checkEm;
            }
        }
    }
}
</script>
<div style="width:800px;"
MENU<br>
<?php
include('connect.php');
$res=$_GET['res'];
$result = $db->prepare("SELECT * FROM reservation WHERE res_id= :userid");
	$result->bindParam(':userid', $res);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<?php
}
?>
<br><br>
<?php
$maincontrol=$_GET['id'];
if ($maincontrol=='merienda') {

?>
Combo:
<?php
$asa=$row['combo'];
$resulta = $db->prepare("SELECT * FROM combo WHERE id= :userid");
	$resulta->bindParam(':userid', $asa);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
		echo $rowa['combolist'];
	}
?>
<form action="savemenu.php" method="post">
<input type="hidden" name="resres" value="<?php echo $_GET['res'];?>">
<input type="hidden" name="asssss" value="<?php echo $_GET['gfgfgfgfgfgf'];?>">
<input type="hidden" name="asa" value="<?php echo $_GET['id'];?>"> 
<div style="float:left; width: 395px; margin-right:10px;">
<fieldset>
  <legend>PASTA</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='pasta_noddles';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
<fieldset>
<legend>BREAD</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='bread';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
</div>
<div style="float:right; width: 395px;">
<fieldset>
<legend>MEAT</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='meat';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
<fieldset>
<legend>DESSERTS</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='dessert';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
<fieldset>
<legend>DRINKS</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='drinks';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
<input type="submit" value="Order">
</fieldset>
</div>
</form>
<?php
}
if ($maincontrol=='lunch_and_dinner') {
?>

Combo:
<?php
$asa=$row['combo'];
$resulta = $db->prepare("SELECT * FROM combo WHERE id= :userid");
	$resulta->bindParam(':userid', $asa);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
		echo $rowa['combolist'];
	}
?>
<form action="savemenu.php" method="post">
<input type="hidden" name="resres" value="<?php echo $_GET['res'];?>">
<input type="hidden" name="asssss" value="<?php echo $_GET['gfgfgfgfgfgf'];?>">
<input type="hidden" name="asa" value="<?php echo $_GET['id'];?>">
<div style="float:left; width: 395px; margin-right:10px;">
<fieldset>
<legend>SOUP</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='soup';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
<fieldset>
<legend>SALAD</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='salad';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
<fieldset>
<legend>DESSERTS</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='dessert';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
<fieldset>
<legend>DRINKS</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='drinks';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>


</fieldset>
</div>
<div style="float:right; width: 395px;">
<fieldset>
<legend>MAIN COURSE meat</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='beef';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>

<fieldset>
<legend>MAIN COURSE Pork</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='pork';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
<fieldset>
<legend>MAIN COURSE Chicken</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='chicken';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a><br>
	<?php
	}
?>
</fieldset>
<fieldset>
<legend>MAIN COURSE Fish</legend>
<?php
include('connect.php');
$asas=$_GET['id'];
$cffcf='fish';
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a AND scat= :b");
	$result->bindParam(':a', $asas);
	$result->bindParam(':b', $cffcf);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;">
	<a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a>
	<br>
	<?php
	}
?>
<input type="submit" value="Order">
</fieldset>
</div>

</form>

<?php
}
if ($maincontrol=='specialty') {
?>
<form action="savemenu.php" method="post">
<input type="hidden" name="resres" value="<?php echo $_GET['res'];?>">
<input type="hidden" name="asssss" value="<?php echo $_GET['gfgfgfgfgfgf'];?>">
<input type="hidden" name="asa" value="<?php echo $_GET['id'];?>">

<fieldset>
<legend>Specialty</legend>
<span style="display: inline-block; width: 244px;"><strong>Name</strong></span><span><strong>Price</strong></span><br>
<?php
include('connect.php');
$asas=$_GET['id'];
$result = $db->prepare("SELECT * FROM menu WHERE mcat= :a");
	$result->bindParam(':a', $asas);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	?>
	<input type="hidden" name="price[]" value="<?php echo $rows['price'];?>">
	<input type="checkbox" name="menu[]" value="<?php echo $rows['id'] ?>" style="width: 16px;"><span style="display: inline-block; width: 200px;">
	
	<a style="text-decoration: none; color: #000000;" href="#" onClick="MyWindow=window.open('details.php?id=<?php echo $rows['id']?>','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=500'); return false;"><?php echo $rows['name'] ?></a>
	</span> ---- Php <?php $fgbfgfg=$rows['price'];
	echo formatMoney($fgbfgfg, true);
	?><br>
	<?php
	}
?>
<input type="button" class="my_form-check-button" onClick="checkAll(true);" value="Check All"/>
<input type="button" class="my_form-check-button" onClick="checkAll(false);" value="Clear All"/>
<input type="submit" value="Order">
</fieldset>
</form>


<?php
}
?>
</div>