<?php
	//srart session and create connection with mysql
	session_start();
	$conect = mysqli_connect("localhost", "root", "", "aminship");
	//took logout time
	$date = new DateTime();
	$time = $date -> format('Y-m-j');
	//sql for update logout time
	$sql = "UPDATE user SET lastlog = '$time' WHERE user.ID = '$_SESSION[id]';";
	//execute sql command
	mysqli_query($conect, $sql);
	//log out massage
	$_SESSION['success'] = "Log out successfull";
	//redirect to login page
	header("location:http://localhost/Aminship/auth/log.php");
	exit;
?>