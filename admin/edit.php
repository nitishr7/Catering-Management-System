<?php
// configuration
include('../connect.php');

// new data
$description = $_POST['description'];
$name = $_POST['name'];
$price = $_POST['price'];
$id = $_POST['memids'];
$mm = $_POST['mcat'];
$ss = $_POST['scat'];
// query
$sql = "UPDATE menu 
        SET name=?, description=?, price=?, mcat=?, scat=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($name,$description,$price,$mm,$ss,$id));
header("location: menu.php");

?>