<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$connect = mysqli_connect("localhost","root","","aminship");
		
		//local variable
		$first = $_POST['1st'];
		$second = $_POST['2nd'];
		$third = $_POST['3rd'];
		$fourth = $_POST['4th'];
		$size = $_POST['result'];
		
		//sql query to find user information from database
		$sqlquery = "SELECT measure FROM user WHERE ID = '$_SESSION[id]'";

		//take data from database
		$data = mysqli_query($connect, $sqlquery);
		
		//convert 2D array to 1D array
		$row = mysqli_fetch_assoc($data);
		
		//create a unique id for measurement
		$id = $row['measure'] + 1;
		if($id < 10){
			$id = "000$id";
		}else if($id < 100){
			$id = "00$id";
		}else if($id < 1000){
			$id = "0$id";
		}

		$table = "user"."$_SESSION[id]";

		//sql query for upload data to database
		$sqlquery1 = "INSERT INTO $table (UID, first, second, third, fourth, size) VALUES ('$id', '$first', '$second', '$third', '$fourth', '$size')";
		$sqlquery2 = "UPDATE user SET measure = '$id' WHERE ID = '$_SESSION[id]'";

		//method for upload data to database
		mysqli_query($connect, $sqlquery1);
		mysqli_query($connect, $sqlquery2);
		
		//method to redirect this page to another page
		mysqli_close($connect);
		header("location:./view.php");
		exit;
	}
	else{
		header("location:../auth");
		exit;
	}
?>