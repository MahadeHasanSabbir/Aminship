<?php
	session_start();
	if(isset($_SESSION['id'])){
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> Aminship (working with your land) </title>
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
						<a class="navbar-brand" href="./">Aminship</a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="./"> Home </a></li>
								<li class="active"><a href="./about.php"> About </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Area <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li onclick="giveinfo()"><a href="./tarea.php">Area for triangle</a></li>
											<li onclick="giveinfo()"><a href="./area.php">Area for rectengle</a></li>
											<li onclick="giveinfo()"><a href="./sarea.php">Area for circle</a></li>
										</ul>
								</li>
								<li onclick="giveinfo()"><a href="./side.php"> Side </a></li>
								<li onclick="giveinfo()"><a href="#"> Distribution </a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="http://localhost/Aminship/auth/logout.php"> Log out </a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="container" role="main">
					<div class="jumbotron">
						<p> <strong> Welcome to land sarvay project.</strong> We are here to help you calculating your land area and distribute it as you want.
						</p>
					</div>
				</div>
				<div class="sitefooter"></div>
				<script src="./style/js/jquery.min.js"></script>
				<script src="./style/js/bootstrap.min.js"></script>
				<script>
					function giveinfo(){
						if (sessionStorage.getItem("visited") === null) {
							alert("Please read all the information of this page before doing any calculation!");
							sessionStorage.setItem("visited", "true");
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