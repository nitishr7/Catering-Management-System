<?php
session_start();
include('../connect.php');
$mm = $_POST['name'];
$ss = $_POST['leader'];
// query
$sql = "INSERT INTO catering_team (ct_name,ct_leader) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$mm,':b'=>$ss));
header("location: team.php");


?>