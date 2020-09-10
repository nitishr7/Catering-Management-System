<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memids'];
$mm = $_POST['name'];
$ss = $_POST['leader'];
// query
$sql = "UPDATE catering_team 
        SET ct_name=?, ct_leader=?
		WHERE ct_id=?";
$q = $db->prepare($sql);
$q->execute(array($mm,$ss,$id));
header("location: team.php");

?>