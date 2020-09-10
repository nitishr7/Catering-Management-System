<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memids'];
$mm = $_POST['username'];
$ss = $_POST['password'];
$a = $_POST['power'];
// query
$sql = "UPDATE user 
        SET username=?, password=?, power=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($mm,$ss,$a,$id));
header("location: adminaccount.php");

?>