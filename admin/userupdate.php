<?php
	session_start();
	if(isset($_SESSION['aid'])){
		//create connection with database
		$conect = mysqli_connect("localhost", "root", "", "aminship");
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}
		if(isset($_GET['pass']) && $_GET['pass'] == 0){
			//local variable
			$name = $_POST['name'];
			$number = $_POST['number'];
			$email = $_POST['email'];

			//sql query
			$sql = "UPDATE user SET name = '$name', mail = '$email', phone = '$number' WHERE user.ID = '$id'";
			
			//method to update data from database
			mysqli_query($conect, $sql);
		}
		if(isset($_GET['pass']) && $_GET['pass'] == 1){
			$password = password_hash($id, PASSWORD_BCRYPT);

			//sql query
			$sql = "UPDATE user SET password = '$password' WHERE user.ID = '$id'";
			
			//method to update data from database
			mysqli_query($conect, $sql);
		}
		//mehtod to redirect this page to another page
		header("location:http://localhost/Aminship/admin/userview.php?key=$id");
		exit;
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/admin/");
		exit;
	}
?>