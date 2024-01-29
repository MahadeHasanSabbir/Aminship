<?php
	session_start();
	if(isset($_SESSION['aid'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");
		if(isset($_GET['id']) && !isset($_GET['key'])){

			$table = "user"."$_GET[id]";

			//sql query
			$sql1 = "DELETE FROM user WHERE ID = '$_GET[id]'";
			$sql2 = "DROP TABLE $table";

			//take data from database
			mysqli_query($conect, $sql1);
			mysqli_query($conect, $sql2);

			//mehtod to redirect this page to another page
			header("location:http://localhost/Aminship/admin/users.php");
			exit;
		}
		else if(isset($_GET['id']) && isset($_GET['key'])){
			$table = "user"."$_GET[id]";

			//sql query
			$sql = "DELETE FROM $table WHERE UID = '$_GET[key]'";

			//take data from database
			mysqli_query($conect, $sql);

			header("location:http://localhost/aminship/admin/view.php?id=$_GET[id]");
			exit;
		}
		else if(isset($_GET['dd']) && $_GET['dd'] == 0){
			$date = new DateTime();
			$today = $date -> format('Y-m-j');
			
			$dquery = "DELETE FROM visitors WHERE time LIKE '$today%'";
			mysqli_query($conect, $dquery);
			
			header("location:http://localhost/aminship/admin/adminprofile.php");
			exit;
		}
		else if(isset($_GET['dd']) && $_GET['dd'] == 1){
			$dquery = "DELETE FROM visitors";
			mysqli_query($conect, $dquery);
			header("location:http://localhost/aminship/admin/adminprofile.php");
			exit;
		}
		else if(isset($_GET['dm'])){
			$dquery = "DELETE FROM massage WHERE massage.time = '$_GET[dm]'";
			mysqli_query($conect, $dquery);
			echo $dquery;
			header("location:http://localhost/aminship/admin/massage.php");
			exit;
		}
		else{
			header("location:http://localhost/aminship/admin/users.php");
			exit;
		}
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/admin/");
		exit;
	}
?>