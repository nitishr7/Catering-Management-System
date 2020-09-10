<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM catering_member WHERE ctm_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>