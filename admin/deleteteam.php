<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM catering_team WHERE ct_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>