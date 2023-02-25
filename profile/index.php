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
		$row = mysqli_fetch_array($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> <?php echo $row["name"];?>'s Profile | Aminship (working with your land) </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css" />
				<style>
					body {padding-top:30px;}
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
						<a class="navbar-brand" href="./">Aminship</a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="./"> Home </a></li>
								<li><a href="./about.php"> About </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Area <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li onclick="giveinfo()"><a href="./tarea.php">Area for triangle</a></li>
											<li onclick="giveinfo()"><a href="./area.php">Area for rectengle</a></li>
											<li onclick="giveinfo()"><a href="./sarea.php">Area for Circle</a></li>
										</ul>
								</li>
								<li onclick="giveinfo()"><a href="./side.php"> Side </a></li>
								<li onclick="giveinfo()"><a href="#"> Distribution </a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="http://localhost/Aminship/auth/logout.php">Log out</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</nav>
				<div class="container">
					<div class="page-header">
						<h4 style="display:inline-block;"> Your information </h4>
						<button class="btn btn-md btn-default" onclick="return permit1()">
							<a href='./profileupdate.php'> Edit profile </a>
						</button>
						<button class="btn btn-md btn-default" onclick="return permit2()">
							<a href='./delete.php'> Delete ID </a>
						</button>
						<button class="btn btn-md btn-default">
							<a href='./view.php'> Meserment history </a>
						</button>
					</div>
					<div class="jumbotron">
						<?php
							echo "<label> User ID</label>: ", $row["ID"];
							echo "<br/> <label> Name</label>: ", $row["name"];
							echo "<br/> <label> Mobile</label>: ", $row["phone"];
							echo "<br/> <label> E-mail</label>: ", $row["mail"];
							echo "<br/> <label> Measure count</label>: ", $row["measure"];
						?>
					</div>
				</div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script>
					function giveinfo(){
						if (sessionStorage.getItem("visited") === null) {
							alert("Please read all the information of this page before doing any calculation!");
							sessionStorage.setItem("visited", "true");
						  }
					}
					function permit1(){
						if(!confirm("Sure to edit your information?")){
							return false;
						}
						else{
							return true;
						}
					}
					function permit2(){
						if(!confirm("Sure to delete your information?")){
							return false;
						}
						else{
							return true;
						}
					}
					function permit3(){
						if(!confirm("Do you want to Log out?")){
							return false;
						}
						else{
							return true;
						}
					}
				</script>
			</body>
		</html>
<?php
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/auth/log.php");
		exit;
	}
?>