<?php
session_start();
include('../connect.php');
$mm = $_POST['username'];
$ss = $_POST['password'];
$a = $_POST['power'];
// query
$sql = "INSERT INTO user (username,password,power) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$mm,':b'=>$ss,':c'=>$a));
header("location: adminaccount.php");


?>