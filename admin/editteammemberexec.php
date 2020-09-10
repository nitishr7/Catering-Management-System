<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memids'];
$mm = $_POST['team'];
$ss = $_POST['member'];
// query
$sql = "UPDATE catering_member 
        SET ct_name=?, ctm_member=?
		WHERE ctm_id=?";
$q = $db->prepare($sql);
$q->execute(array($mm,$ss,$id));
header("location: teammember.php");

?>