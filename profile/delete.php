<?php
	session_start();
	if(isset($_SESSION['id'])){
		if(!isset($_GET['key'])){
			//create connection with database
			$conect = mysqli_connect("localhost","root","","aminship");
			
			$table = "user"."$_SESSION[id]";
			
			//sql query
			$sql1 = "DELETE FROM user WHERE ID = '$_SESSION[id]'";
			$sql2 = "DROP TABLE $table";

			//take data from database
			mysqli_query($conect, $sql1);
			mysqli_query($conect, $sql2);

			//mehtod to redirect this page to another page
			$_SESSION['error'] = "Your ID deleted!";
			header("location:http://localhost/Aminship/auth/log.php");
			exit;
		}
		else{
			//create connection with database
			$conect = mysqli_connect("localhost","root","","aminship");
			
			$table = "user"."$_SESSION[id]";
			
			//sql query
			$sql = "DELETE FROM $table WHERE UID = '$_GET[key]'";

			//take data from database
			mysqli_query($conect, $sql);
			
			header("location:http://localhost/aminship/profile/view.php");
			exit;
		}
	}
	else{
		header("location:http://localhost/Aminship/auth");
		exit;
	}
?>