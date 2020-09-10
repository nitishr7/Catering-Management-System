<?php
session_start();
include('../connect.php');
$mm = $_POST['team'];
$ss = $_POST['member'];
// query
$sql = "INSERT INTO catering_member (ct_name,ctm_member) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$mm,':b'=>$ss));
header("location: teammember.php");


?>