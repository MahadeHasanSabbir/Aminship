<?php
	session_start();
	if(isset($_SESSION['aid'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//local variable
		$id = $_POST['name'];
		$password = $_POST['password'];
		
		// Prepare the SQL statement
		$sql = "SELECT * FROM admin WHERE id = '$_SESSION[aid]'";

		// Execute the statement
		$result = mysqli_query($conect, $sql);

		// Get the user data from the database
		$row = mysqli_fetch_assoc($result);

		if(password_verify($password, $row['password'])){
			$sqlquery = "UPDATE admin SET ID = '$id' WHERE admin.ID = '$_SESSION[aid]'";
			
			//method for upload data to database
			mysqli_query($conect, $sqlquery);
			
			$_SESSION['aid'] = $id;
			mysqli_close($conect);
			//mehtod to redirect this page to another page
			header("location:http://localhost/Aminship/admin/adminprofile.php");
		}
		else{
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			//keep treak last password change
			$date = new DateTime();
			$passlast = $date -> format('Y-m-j');
			//sql query for upload data to database
			$sqlquery = "UPDATE admin SET ID = '$id', password = '$password', passlast = '$passlast' WHERE admin.ID = '$_SESSION[aid]'";
			
			//method for upload data to database
			mysqli_query($conect, $sqlquery);
			
			$_SESSION['aid'] = $id;
			mysqli_close($conect);
			//mehtod to redirect this page to another page
			header("location:http://localhost/Aminship/admin/adminprofile.php");
		}
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/admin/");
		exit;
	}
?>