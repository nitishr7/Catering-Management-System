<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM menu_res WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>