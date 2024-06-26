<?php
	session_start();
	if(isset($_SESSION['aid'])){
		//create connection with database
		$connect = mysqli_connect("localhost","root","","aminship");
		$id = mysqli_real_escape_string($connect, $_GET['key']);
		//sql query to find user information from database
		$sqlquery = "SELECT * FROM user WHERE ID = '$id'";

		//take data from database
		$data = mysqli_query($connect, $sqlquery);

		//convert 2D array to 1D array
		$row = mysqli_fetch_assoc($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> <?php echo $row["name"];?>'s Profile | Aminship (working with your land) </title>
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap-theme.min.css" />
				<style>
					body {padding-top:30px;background-color:darkseagreen;}
				</style>
			</head>
			<body>
				<?php include 'header.php'; ?>
				<div class="container">
					<div class="page-header">
						<h4 style="display:inline-block;" class="col-md-7"> Information of <?php echo $row["name"];?> </h4>
						<a href='<?php echo "./profileupdate.php?id=$id";?>' style="color:brown;" class="btn btn-md bg-warning" onclick="return apermit1()"> Edit profile </a>
						<a href='<?php echo "./userupdate.php?id=$id&pass=1";?>' style="color:darkred;" class="btn btn-md bg-danger" onclick="return apermit1()"> Reset password </a>
						<a href='<?php echo "./delete.php?id=$id";?>' style="color:darkred;" class="btn btn-md bg-danger" onclick="return apermit2()"> Delete ID </a>
						<a href='<?php echo "./view.php?id=$id";?>' style="color:mediumblue;" class="btn btn-md bg-info"> Measurement history </a>
					</div>
					<div class="jumbotron">
						<?php
							echo "<b class='col-sm-3'> User ID </b> <span class='col-sm-9'> : &nbsp", $row["ID"];
							if($row['status'] == 1){
								echo "  (active)";
							}
							echo "</span> </br>";
							echo "<b class='col-sm-3'> Name </b> <span class='col-sm-9'> : &nbsp", $row["name"], "</span> </br>";
							echo "<b class='col-sm-3'> Mobile </b> <span class='col-sm-9'> : &nbsp", $row["phone"], "</span> </br>";
							echo "<b class='col-sm-3'> E-mail </b> <span class='col-sm-9'> : &nbsp", $row["mail"], "</span> </br>";
							echo "<b class='col-sm-3'> Measurement count </b> <span class='col-sm-9'> : &nbsp", round($row["measure"]), "</span> </br>";
							echo "<b class='col-sm-3'> Last log-in </b> <span class='col-sm-9'> : &nbsp";
							if($row['lastlog'] == '0000-00-00'){
								echo "N/A </span> </br>";
							}
							else{
								$date = new DateTime();
								$today = $date -> format('Y-m-j');
								echo round((strtotime($today) - strtotime($row['lastlog']))/60/60/24), " day ago </span> </br>";
							}
						?>
					</div>
				</div>
				<script src="../style/js/jquery.min.js"></script>
				<script src="../style/js/bootstrap.min.js"></script>
				<script src="../style/js/jscript.js"></script>
			</body>
		</html>
<?php
	mysqli_close($connect);
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:./");
		exit;
	}
?>