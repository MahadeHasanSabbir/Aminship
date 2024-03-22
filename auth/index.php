<?php
	session_start();
	if(isset($_SESSION['id'])){
		header("location:../profile");
		exit;
	}
	else if(isset($_SESSION['aid'])){
		header("location:../admin");
		exit;
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:./log.php");
		exit;
	}
?>