<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//create connection with database
		$connect = mysqli_connect("localhost","root","","aminship");
		
		//local variable
		$name = mysqli_real_escape_string($connect, $_POST['name']);
		$number = mysqli_real_escape_string($connect, $_POST['number']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$password = password_hash(mysqli_real_escape_string($connect, $_POST['password']), PASSWORD_BCRYPT);
		
		//sql query to find user information from database
		$sqlquery = "SELECT * FROM admin";

		//take data from database
		$data = mysqli_query($connect, $sqlquery);
		
		//convert 2D array to 1D array
		$row = mysqli_fetch_assoc($data);
		
		//create a unique id for user
		$date = new DateTime();
		$id1 = $date -> format('ym');
		$id2 = $date -> format('j');
		if ($id2 < 10){
			$id2 = "0$id2";
		}
		$id3 = $row['users'] + 1;
		if($id3 < 10){
			$id3 = "00$id3";
		}else if($id3 < 100){
			$id3 = "0$id3";
		}
		$id = "$id1$id2$id3";

		$table = "user"."$id";
		
		//sql query for upload data to database
		$sqlquery1 = "INSERT INTO user (ID, name, password, mail, phone, measure) VALUES ('$id', '$name', '$password', '$email', '$number', '000')";
		$sqlquery2 = "UPDATE admin SET users = '$id3' WHERE ID = '$row[ID]'";
		$sqlquery3 = "CREATE TABLE $table ( 
		`UID` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`first` VARCHAR(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`second` VARCHAR(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`third` VARCHAR(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '000' ,
		`fourth` VARCHAR(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '000' ,
		`size` VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		PRIMARY KEY (`UID`)) ENGINE = InnoDB;";

		//method for upload data to database
		mysqli_query($connect, $sqlquery1);
		mysqli_query($connect, $sqlquery2);
		mysqli_query($connect, $sqlquery3);
		
		//mail to donor
		mysqli_close($connect);
		//method to redirect this page to another page
		header("location:./log.php?id=$id");
	}
	else{
		header("location:./");
		exit;
	}
?>