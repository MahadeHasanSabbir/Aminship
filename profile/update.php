<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$connect = mysqli_connect("localhost", "root", "", "aminship");

		//local variable
		$name = $_POST['name'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

		//sql query
		$sql = "UPDATE user SET name = '$name', password = '$password', mail = '$email', phone = '$number' WHERE user.ID = '$_SESSION[id]';";
		
		//method to update data from database
		mysqli_query($connect, $sql);
		
		//method to redirect this page to another page
		mysqli_close($connect);
		header("location:./about.php");
		exit;
	}
	else{
		header("location:../auth");
		exit;
	}
?>