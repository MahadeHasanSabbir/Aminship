<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//sql query
		$sql1 = "DELETE FROM user WHERE ID = '$_SESSION[id]'";
		$sql2 = "DROP TABLE aminship.'$_SESSION[id]'";

		//take data from database
		mysqli_query($conect, $sql1);
		mysqli_query($conect, $sql2);

		//mehtod to redirect this page to another page
		header("location:http://localhost/Aminship/auth/logout.php");
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/auth/log.php");
		exit;
	}
?>
