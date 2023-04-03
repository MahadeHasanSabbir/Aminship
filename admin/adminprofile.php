<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//sql query to find user information from database
		$sql = "SELECT * FROM admin WHERE admin.id = '$_SESSION[id]'";

		//take data from database
		$data = mysqli_query($conect, $sql);

		//convert 2D array to 1D array
		$row = mysqli_fetch_assoc($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> Admin panel </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css">
				<style>
					body {padding-top:60px;background-color:darkseagreen;}
				</style>
			</head>
			<body>
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						<a class="navbar-brand" href="./adminprofile.php">Aminship / Admin </a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="active"> <a href="./adminprofile.php"> Dashboard </a> </li>
								<li onclick="return apermit()"> <a href="./users.php"> View users </a> </li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li onclick="return permit()"> <a href="http://localhost/Aminship/admin/logout.php">Log out</a> </li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="container">
					<?php
						$date = new DateTime();
						$today = $date -> format('Y-m-j');
						if((strtotime($today) - strtotime($row['passlast']))/60/60/24 > 90){
							echo "<div class='alert alert-danger' style='margin-bottom:10px;'>
									<span class='glyphicon glyphicon-alert'></span>
									Change your password. It is older than 90 day!
									<button type='button' class='close' data-dismiss='alert' area-label='close'>
										<span area-hidden='true'> &times; </span>
									</button>
								</div>";
						}
						echo "<div class='jumbotron' style='margin-bottom:10px;'>";
						echo "<b class='col-sm-3 col-xs-4'> Admin </b> <span class='col-sm-9'> : &nbsp", $row["ID"], "</span></br>";
						echo "<b class='col-sm-3 col-xs-4'> Last password change </b> <span class='col-sm-9'> : &nbsp", $row["passlast"], "</span></br>";
						echo "<b class='col-sm-3 col-xs-4'> Last time log-in </b> <span class='col-sm-9'> : &nbsp",round((strtotime($today) - strtotime($row['lastlog']))/60/60/24), " day ago </span></br>";
						echo "<hr/>";
					?>
					<a href='./adminprofileupdate.php' style="color:brown;" class="btn btn-md bg-warning" onclick="return permit1()"> Edit info </a>
					</div>
					<div class="well" style="background-color:ghostwhite;">
						<p class="text-center"> Website reach information </p>
						<div class="row">
							<div class="col-sm-4 text-center">
								<div class="panel panel-info">
									<div class="panel-heading">
										<h3 class="panel-title">Number of page view today</h3>
									</div>
									<div class="panel-body" >
										<?php
											$sql = "SELECT COUNT(ip) FROM visitors WHERE time LIKE '$today%'";
											
											$source = mysqli_query($conect, $sql);
											$number = mysqli_fetch_array($source);
											
											echo $number[0];
										?>
									</div>
								</div>
							</div>
							<div class="col-sm-4 text-center">
								<div class="panel panel-info">
									<div class="panel-heading">
										<h3 class="panel-title">Number of visitor today</h3>
									</div>
									<div class="panel-body">
										<?php
											$sql = "SELECT COUNT(DISTINCT ip) FROM visitors WHERE time LIKE '$today%'";

											$source = mysqli_query($conect, $sql);
											$number = mysqli_fetch_array($source);
											
											echo $number[0];
										?>
									</div>
								</div>
							</div>
							<div class="col-sm-4 text-center">
								<div class="panel panel-info">
									<div class="panel-heading">
										<h3 class="panel-title">Number of visitor in lifetime</h3>
									</div>
									<div class="panel-body">
										<?php
											$sql = "SELECT COUNT(DISTINCT ip) FROM visitors";

											$source = mysqli_query($conect, $sql);
											$number = mysqli_fetch_array($source);
											
											echo $number[0];
										?>
									</div>
								</div>
							</div>
							<div class="btn-group col-sm-offset-5 col-xs-offset-4">
								<button class="btn btn-md btn-sm btn-default" onclick="givealert()"> Clear today info</button>
								<button class="btn btn-md btn-sm btn-default" onclick="givealert()"> Clear all info</button>
							</div>
						</div> <hr/>
						<p class="text-center"> Website user information </p>
						<div class="row">
							<div class="col-sm-4 text-center">
								<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">Number of user log-in today</h3>
									</div>
									<div class="panel-body">
										<?php
											$now1 = $date -> format('Y-m-');
											$now2 = $date -> format('j');
											if($now2 < 10){
												$now2 = "0$now2";
											}
											$now = $now1.$now2;
											$sql = "SELECT COUNT(ID) FROM user WHERE lastlog LIKE '$now'";

											$source = mysqli_query($conect, $sql);
											$number = mysqli_fetch_array($source);
											
											echo $number[0];
										?>
									</div>
								</div>
							</div>
							<div class="col-sm-4 text-center">
								<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">Number of active user</h3>
									</div>
									<div class="panel-body">
										<?php
											$sql = "SELECT COUNT(ID) FROM user";

											$source = mysqli_query($conect, $sql);
											$number = mysqli_fetch_array($source);
											
											echo $number[0];
										?>
									</div>
								</div>
							</div>
							<div class="col-sm-4 text-center">
								<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">Number of registered user</h3>
									</div>
									<div class="panel-body">
										<?php echo round($row["users"]); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer"></div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script src="http://localhost/Aminship/style/js/jscript.js"></script>
			</body>
		</html>
<?php
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/admin/");
		exit;
	}
?>