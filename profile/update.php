<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost", "root", "", "aminship");

		//local variable
		$name = $_POST['name'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

		//sql query
		$sql = "UPDATE user SET name = '$name', password = '$password', mail = '$email', phone = '$number' WHERE user.ID = '$_SESSION[id]';";
		
		//method to update data from database
		mysqli_query($conect, $sql);
		
		//mehtod to redirect this page to another page
		header("location:http://localhost/Aminship/profile/about.php");
		exit;
	}
	else{
		header("location:http://localhost/Aminship/auth");
		exit;
	}
?>