<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");
		
		//local variable
		$first = $_POST['1st'];
		$second = $_POST['2nd'];
		$third = $_POST['3rd'];
		$fourth = $_POST['4th'];
		$size = $_POST['result'];
		
		//sql query to find user information from database
		$sqlquery = "SELECT measure FROM user WHERE ID = '$_SESSION[id]'";

		//take data from database
		$data = mysqli_query($conect, $sqlquery);
		
		//convert 2D array to 1D array
		$row = mysqli_fetch_assoc($data);
		
		//create a uniqe id for donner
		$id = $row['measure'] + 1;
		if($id < 10){
			$id = "00$id";
		}else if($id < 100){
			$id = "0$id";
		}

		$table = "user"."$_SESSION[id]";

		//sql query for upload data to database
		$sqlquery1 = "INSERT INTO $table (UID, first, second, third, fourth, size) VALUES ('$id', '$first', '$second', '$third', '$fourth', '$size')";
		$sqlquery2 = "UPDATE user SET measure = '$id' WHERE ID = '$_SESSION[id]'";

		//method for upload data to database
		mysqli_query($conect, $sqlquery1);
		mysqli_query($conect, $sqlquery2);
		
		//mehtod to redirect this page to another page
		header("location:http://localhost/aminship/profile/view.php");
		exit;
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/aminship/auth/log.php");
		exit;
	}
?>