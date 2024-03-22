<?php
	session_start();
	if(isset($_SESSION['aid'])){
		//create connection with database
		$connect = mysqli_connect("localhost","root","","aminship");
		if(isset($_GET['id']) && !isset($_GET['key'])){

			$table = "user"."$_GET[id]";

			//sql query
			$sql1 = "DELETE FROM user WHERE ID = '$_GET[id]'";
			$sql2 = "DROP TABLE $table";

			//take data from database
			mysqli_query($connect, $sql1);
			mysqli_query($connect, $sql2);

			//method to redirect this page to another page
			header("location:./users.php");
			exit;
		}
		else if(isset($_GET['id']) && isset($_GET['key'])){
			$table = "user"."$_GET[id]";

			//sql query
			$sql = "DELETE FROM $table WHERE UID = '$_GET[key]'";

			//take data from database
			mysqli_query($connect, $sql);

			header("location:./view.php?id=$_GET[id]");
			exit;
		}
		else if(isset($_GET['dd']) && $_GET['dd'] == 0){
			$date = new DateTime();
			$today = $date -> format('Y-m-j');
			
			$dquery = "DELETE FROM visitors WHERE time LIKE '$today%'";
			mysqli_query($connect, $dquery);
			
			header("location:./adminprofile.php");
			exit;
		}
		else if(isset($_GET['dd']) && $_GET['dd'] == 1){
			$dquery = "DELETE FROM visitors";
			mysqli_query($connect, $dquery);
			header("location:./adminprofile.php");
			exit;
		}
		else if(isset($_GET['dm'])){
			$dquery = "DELETE FROM massage WHERE massage.time = '$_GET[dm]'";
			mysqli_query($connect, $dquery);
			echo $dquery;
			header("location:./massage.php");
			exit;
		}
		else{
			header("location:./users.php");
			exit;
		}
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:./");
		exit;
	}
?>