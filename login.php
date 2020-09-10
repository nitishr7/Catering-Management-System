<?php
	//Start session
	session_start();
	
	//Connect to mysql server
	$link = mysql_connect('localhost','root',"");
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db("dng_comedor", $link);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['uname']);
	$password = clean($_POST['pword']);
	
	//Create query
	$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";
	$result=mysql_query($qry);
	//while($row = mysql_fetch_array($result))
//  {
//  $level=$row['position'];
//  }
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['USERNAME'] = $member['username'];
			$_SESSION['POWER'] = $member['power'];
			session_write_close();
			//if ($level="admin"){
			header("location: admin/index.php");
			exit();
		}else {
			//Login failed
			$endTime = date('H:i:s');
			mysql_query("UPDATE falied SET attempt=attempt+1, time='$endTime'");
			header("location: loginform.php");
			
			exit();
		}
	}else {
		die("Query failed");
	}
?>