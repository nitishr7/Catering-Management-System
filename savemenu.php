<?php
include('connect.php');
$resres=$_POST['resres'];
$asa=$_POST['asa'];
$dsdd=$_POST['price'];
$edittable=$_POST['menu'];
$bbbb=$_POST['asssss'];
$N = count($edittable);

for($i=0; $i < $N; $i++)
{
	if($asa=='specialty'){
	if ($N<15) {
	echo 'Minimum menu order for specialty 15<br>';
	?>
	<a href="portal.php?res=<?php echo $resres ?>&mcat=<?php echo $asa ?>&additional=<?php echo $bbbb ?>">back</a>
	<?php
	exit();
	}
	if ($N>15) {
	$sql = "INSERT INTO menu_res (res_id,menu,price) VALUES (:a,:b,:c)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$resres,':b'=>$edittable[$i],':c'=>$dsdd[$i]));
	}
	
	}
	if($asa!='specialty'){
	$sql = "INSERT INTO menu_res (res_id,menu) VALUES (:a,:b)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$resres,':b'=>$edittable[$i]));
	}
}
header("location: portal.php?res=$resres&mcat=$asa&additional=$bbbb");
mysql_close($con);
?>