<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost", "root", "", "aminship");

		//local variable
		$id = $_GET['id'];
		$name = $_POST['name'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		//$password = password_hash($_POST['password'], PASSWORD_BCRYPT) password = '$password',;

		//sql query
		$sql = "UPDATE user SET name = '$name', mail = '$email', phone = '$number' WHERE user.ID = '$id'";
		
		//method to update data from database
		mysqli_query($conect, $sql);
		
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