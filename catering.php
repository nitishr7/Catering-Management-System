<?php
$resid=$_POST['resid'];
$resdate=date("m/d/Y");
$d=$_POST['d'];
$vn=$_POST['vn'];
$motif=$_POST['motif'];
$toc=$_POST['toc'];
$tre=$_POST['tre'];
$name=$_POST['name'];
$lname=$_POST['lname'];
$cnum=$_POST['cnum'];
$address=$_POST['address'];
$nopax=$_POST['nopax'];
$stat='Pending';
$mcat=$_POST['mcat'];
$time=$_POST['time'].''.$_POST['dws'];
$addd=$_POST['loc'];

function createRandomPassword() {
	$chars = "023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 3) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$tc=createRandomPassword();
if ((($mcat=='merienda')AND($nopax > 99)) OR (($mcat=='lunch_and_dinner')AND($nopax > 49)) OR (($mcat=='specialty') AND ($nopax > 29))) {
	include('connect.php');
	$sql = "INSERT INTO reservation (res_id,firstname,address,motif,type_events,type_res,date,pax,contact,venueaddress,type_catering,lastname,status,time,resdate) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:z)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$resid,':b'=>$name,':c'=>$address,':d'=>$motif,':e'=>$toc,':f'=>$tre,':g'=>$d,':h'=>$nopax,':i'=>$cnum,':j'=>$vn,':k'=>$mcat,':l'=>$lname,':m'=>$stat,':n'=>$time,':z'=>$resdate));
	
	
	$sqls = "INSERT INTO type_of_reservation (tr_description) VALUES (:b)";
	$q = $db->prepare($sqls);
	$q->execute(array(':b'=>$tre));
	
	header("location: portal.php?res=$resid&mcat=$mcat&additional=$addd");
}
echo '<div style="text-align: center; margin-top: 50px; width: 100%;">';
if(($vn=='Function Hall')AND($nopax < 30)) {
echo 'Minimum pax for Function Hall is 30<br>';
}
if(($mcat=='merienda')AND($nopax < 100)) {
echo 'Minimum pax for merienda is 100<br>';
echo '<a href="reservation.php">Back</a>';
}
if(($mcat=='specialty')AND($nopax < 30)) {
echo 'Minimum pax for specialty is 30<br>';
echo '<a href="reservation.php">Back</a>';
}
if(($mcat=='lunch_and_dinner')AND($nopax < 50)) {
echo 'Minimum pax for Lunch and Dinner is 50<br>';
echo '<a href="reservation.php">Back</a>';
}

echo '</div>';
?>