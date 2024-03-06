<?php
	session_start();
	if(isset($_SESSION['id'])){
		header("location:http://localhost/Aminship/profile/");
		exit;
	}
	else if(isset($_SESSION['aid'])){
		header("location:http://localhost/Aminship/admin/");
		exit;
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/auth/log.php");
		exit;
	}
?>