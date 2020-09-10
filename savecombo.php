<?php
// configuration
include('connect.php');

// new data
$mm = $_POST['resres'];
$ss = $_POST['combo'];
$aa = $_POST['asa'];
$aa = $_POST['asa'];
$bnbnb = $_POST['aggfgdg'];
// query
$sql = "UPDATE reservation 
        SET combo=?
		WHERE res_id=?";
$q = $db->prepare($sql);
$q->execute(array($ss,$mm));
header("location: portal.php?res=$mm&mcat=$aa&additional=$bnbnb");

?>