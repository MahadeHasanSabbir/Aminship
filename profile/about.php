<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM user WHERE ID = '$_SESSION[id]'";

		//take data from database
		$data = mysqli_query($conect, $sqlquery);

		//convert 2D array to 1D array
		$row = mysqli_fetch_assoc($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> <?php echo $row["name"];?>'s Profile | Aminship (working with your land) </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap-theme.min.css" />
				<style>
					body {padding-top:30px;background-color:darkseagreen;}
					.mb {margin-bottom:10px;}
				</style>
			</head>
			<body>
				<?php include 'header.php'; ?>
				<div class="container-fluid">
					<div class="page-header">
						<h4 style="display:inline-block;" class="col-sm-9 col-xs-6"> Your information </h4>
						<a href='./profileupdate.php' style="color:brown;" class="btn btn-md bg-warning" onclick="return permit1()"> Edit profile </a>
						<a href='./delete.php' style="color:darkred;" class="btn btn-md bg-danger" onclick="return permit2()"> Delete ID </a>
						<a href='./view.php' style="color:mediumblue;" class="btn btn-md bg-info"> Meserment history </a>
					</div>
					<?php
					if(password_verify($_SESSION['id'], $row['password'])){
						echo "<div class='alert alert-danger' style='margin-bottom:10px;'>
								<span class='glyphicon glyphicon-alert'></span>
								Change your password. It is default password!
								<button type='button' class='close' data-dismiss='alert' area-label='close'>
									<span area-hidden='true'> &times; </span>
								</button>
							</div>";
					}
					?>
					<div class="jumbotron" style="display:grid;">
						<div class="col-sm-12 mb">
							<b class="col-sm-3 col-xs-5"> User ID </b>
							<span class="col-sm-9 col-xs-7"> : &nbsp <?php echo $row["ID"];?></span>
						</div>
						<div class="col-sm-12 mb">
							<b class="col-sm-3 col-xs-5"> Name </b>
							<span class="col-sm-9 col-xs-7"> : &nbsp <?php echo $row["name"]; ?></span>
						</div>
						<div class="col-sm-12 mb">
							<b class="col-sm-3 col-xs-5"> Mobile </b>
							<span class="col-sm-9 col-xs-7"> : &nbsp <?php echo $row["phone"]; ?></span>
						</div>
						<div class="col-sm-12 mb">
							<b class="col-sm-3 col-xs-5"> E-mail </b>
							<span class="col-sm-9 col-xs-7"> : &nbsp <?php echo $row["mail"]; ?></span>
						</div>
						<div class="col-sm-12 mb">
							<b class="col-sm-3 col-xs-5"> Available saved measurement </b>
							<span class="col-sm-9 col-xs-7"> : &nbsp
							<?php
								$table = "user"."$_SESSION[id]";
								$sql = "SELECT COUNT(UID) FROM $table";

								$source = mysqli_query($conect, $sql);
								$number = mysqli_fetch_array($source);
											
								echo round($number[0]); 
							?>
							</span>
						</div>
						<div class="col-sm-12 mb">
							<b class="col-sm-3 col-xs-5"> Total saved Measurement </b>
							<span class='col-sm-9'> : &nbsp <?php echo round($row["measure"]); ?></span>
						</div>
						<div class="col-sm-12 mb">
							<b class="col-sm-3 col-xs-5"> Last log-in </b>
							<span class="col-sm-9 col-xs-7"> : &nbsp
							<?php
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
				</div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script src="http://localhost/Aminship/style/js/jscript.js"></script>
			</body>
		</html>
<?php
	}
	else{
		header("location:http://localhost/Aminship/auth");
		exit;
	}
?>