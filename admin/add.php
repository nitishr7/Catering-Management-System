<?php
session_start();
include('../connect.php');

// new data
$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
		move_uploaded_file($_FILES["image"]["tmp_name"],"../menu/" . $_FILES["image"]["name"]);
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$location=$_FILES["image"]["name"];
$mcat = $_POST['mcat'];
$scat = $_POST['scat'];




// query
$sql = "INSERT INTO menu (name,description,price,image,mcat,scat) VALUES (:sas,:asas,:asafs,:iii,:mc,:sc)";
$q = $db->prepare($sql);
$q->execute(array(':sas'=>$name,':asas'=>$description,':asafs'=>$price,':iii'=>$location,':sc'=>$scat,':mc'=>$mcat));
header("location: menu.php");
}


?>