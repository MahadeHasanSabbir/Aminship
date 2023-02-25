<?php
	session_start();
	if(!isset($_GET['id'])){
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> Login page | Aminship (working with your land) </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css">
				<style>
					body {padding-top:60px;}
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
						<a class="navbar-brand" href="http://localhost/Aminship">Aminship</a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="http://localhost/Aminship"> Home </a></li>
								<li><a href="http://localhost/Aminship/about.php"> About </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Area <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li onclick="giveinfo()"><a href="http://localhost/Aminship/tarea.php">Area for triangle</a></li>
											<li onclick="giveinfo()"><a href="http://localhost/Aminship/area.php">Area for rectengle</a></li>
											<li onclick="giveinfo()"><a href="http://localhost/Aminship/sarea.php">Area for circle</a></li>
										</ul>
								</li>
								<li onclick="giveinfo()"><a href="http://localhost/Aminship/side.php"> Side </a></li>
								<li onclick="giveinfo()"><a href="#"> Distribution </a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="./register.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
								<li class="active"><a href="./log.php"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</nav>
				<div class="container">
					<div class="jumbotron">
						<h2> Log in form </h2>
						<?php
							if(isset($_SESSION['error'])){
								echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> $_SESSION[error]</div>";
								session_destroy();
							}
						?>
						<form action="authentication.php" method="post" onsubmit="return valid()">
							<label> User ID </label>: <input type="text" name="id" class="form-control" id="id" required="" placeholder="Enter your user account ID" autofocus /> <br/>
							<label> Password </label>: <input type="password" name="password" class="form-control" id="pass" required="" placeholder="Enter your user account password"/> <br/> <br/>
							<button class="btn btn-md btn-default" type="Submit" value="Login"> Log in </button>
							<button class="btn btn-md btn-default" type="Reset" value="Reset"> Reset </button> <br/>
						</form> <br/>
						<div> Don't have any account? <a class="btn btn-md btn-link" href="http://localhost/aminship/auth/register.php" > Register </a>
						</div>
					</div>
				</div>
				<div class="sitefooter"></div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script>
					function giveinfo(){
						if (sessionStorage.getItem("visited") === null) {
							alert("Please read all the information of this page before doing any calculation!");
							sessionStorage.setItem("visited", "true");
						  }
					}
					function valid(){
						var id = document.getElementById('id').value;
						var pass = document.getElementById('pass').value;
						
						var sampleid = /^[0-9]{9}$/i;
						var samplepass = /^[a-z0-9\@\#\$\%\&]{4,8}$/i;
						
						if(!sampleid.test(id)){
							document.getElementById('msg').innerHTML="Invalide ID";
							return false;
						}
						else if(!samplepass.test(pass)){
							document.getElementById('msg').innerHTML="Invalide Password";
							return false;
						}
						return true;
					}
				</script>
			</body>
		</html>
<?php
	}
	else{
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM user WHERE ID = '$_GET[id]'";

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
				<title> Login page | Aminship (working with your land) </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css">
				<style>
					body {padding-top:60px;}
					#msg {color:darkred;}
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
						<a class="navbar-brand" href="http://localhost/Aminship">Aminship</a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="http://localhost/Aminship"> Home </a></li>
								<li><a href="http://localhost/Aminship/about.php"> About </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Area <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li onclick="giveinfo()"><a href="http://localhost/Aminship/tarea.php">Area for triangle</a></li>
											<li onclick="giveinfo()"><a href="http://localhost/Aminship/area.php">Area for rectengle</a></li>
											<li onclick="giveinfo()"><a href="http://localhost/Aminship/sarea.php">Area for Circle</a></li>
										</ul>
								</li>
								<li onclick="giveinfo()"><a href="http://localhost/Aminship/side.php"> Side </a></li>
								<li onclick="giveinfo()"><a href="#"> Distribution </a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="./register.php">Sign in</a></li>
								<li class="active"><a href="./log.php">Log in</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</nav>
				<div class="container">
					<div class="jumbotron">
						<h2> Log in form </h2>
						<div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span> Remember Your ID for future use!</div>
						<form action="authentication.php" method="post" onsubmit="return valid()">
							<label> User ID </label>: <input type="text" name="id" class="form-control" id="id" required="" value="<?php echo $row['ID'];?>" required="" autofocus /> <br/>
							<label> Password </label>: <input type="password" name="password" class="form-control" id="pass" placeholder="Enter your user account password" required=""/> <br/> <br/>
							<button class="btn btn-md btn-default" type="Submit" value="Login"> Log in </button>
							<button class="btn btn-md btn-default" type="Reset" value="Reset"> Reset </button> <br/>
						</form> <br/>
					</div>
				</div>
				<div class="sitefooter"></div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script>
					function giveinfo(){
						if (sessionStorage.getItem("visited") === null) {
							alert("Please read all the information of this page before doing any calculation!");
							sessionStorage.setItem("visited", "true");
						  }
					}
					function valid(){
						var id = document.getElementById('id').value;
						var pass = document.getElementById('pass').value;
						
						var sampleid = /^[0-9]{9}$/i;
						var samplepass = /^[a-z0-9\@\#\$\%\&]{4,8}$/i;
						
						if(!sampleid.test(id)){
							document.getElementById('msg').innerHTML="Invalide ID";
							return false;
						}
						else if(!samplepass.test(pass)){
							document.getElementById('msg').innerHTML="Invalide Password";
							return false;
						}
						return true;
					}
				</script>
			</body>
		</html>
<?php
	}
?>