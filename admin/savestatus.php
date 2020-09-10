<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memids'];
$mm = $_POST['stat'];
echo $id;
// query
$sql = "UPDATE reservation 
        SET status=?
		WHERE res_id=?";
$q = $db->prepare($sql);
$q->execute(array($mm,$id));
header("location: index.php");

?>