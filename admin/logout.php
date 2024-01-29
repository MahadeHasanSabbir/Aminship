<?php
	session_start();
	if(isset($_SESSION['aid'])){
		$conect = mysqli_connect("localhost", "root", "", "aminship");
	
		$date = new DateTime();
		$time = $date -> format('Y-m-j');
	
		$sql = "UPDATE admin SET lastlog = '$time' WHERE admin.ID = '$_SESSION[aid]';";
	
		mysqli_query($conect, $sql);

		$_SESSION['success'] = "Log out successfull";
		mysqli_close($conect);
		header("location:http://localhost/Aminship/admin");
		exit;
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/admin/");
		exit;
	}
?>