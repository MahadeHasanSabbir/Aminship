<?php
	session_start();
	$conect = mysqli_connect("localhost", "root", "", "aminship");
	
	$date = new DateTime();
	$time = $date -> format('Y-m-j');
	
	$sql = "UPDATE admin SET lastlog = '$time' WHERE admin.ID = '$_SESSION[id]';";
	
	mysqli_query($conect, $sql);

	$_SESSION['success'] = "Log out successfull";
	
	header("location:http://localhost/Aminship/admin");
	exit;
?>
