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
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css" />
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
								<li><a href="./about.php"> About </a></li>
								<li class="dropdown active">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Area <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li onclick="giveinfo()"><a href="./tarea.php">Area for triangle</a></li>
											<li class="active" onclick="giveinfo()"><a href="./area.php">Area for rectengle</a></li>
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
					<ul class="breadcrumb">
						<li><a href="#">Area</a></li>
						<li class="active"> Area for rectengle </li>
					</ul>
					<div class="page-header"> <h4> Area Calculator for Rectengle shape land </h4> </div>
					<div class="jumbotron">
						<form class="form-horizontal" name="areacalculate" onsubmit="return calculate()" method="post">
							<h4>East side:</h4>
							<label class="control-label col-sm-1"> feet: </label>
							<div class="col-sm-5">
								<input type="number" min="0" name="east" class="form-control" id="e1">
							</div>
							<label class="control-label col-sm-1">inch:</label>
							<div class="col-sm-5">
								<input type="number" min="0" max="12"  name="east" class="form-control" id="e2">
							</div>
							<h4> West side:</h4>
							<label class="control-label col-sm-1">feet:</label>
							<div class="col-sm-5">
								<input type="number" min="0" name="west" class="form-control" id="w1">
							</div>
							<label class="control-label col-sm-1">inch:</label>
							<div class="col-sm-5">
								<input type="number" min="0" max="12"  name="west" class="form-control" id="w2">
							</div>
							<h4> South side:</h4>
							<label class="control-label col-sm-1">feet:</label>
							<div class="col-sm-5">
								<input type="number" min="0" name="south" class="form-control" id="s1">
							</div>
							<label class="control-label col-sm-1">inch:</label>
							<div class="col-sm-5">
								<input type="number" min="0" max="12"  name="south" class="form-control" id="s2">
							</div>
							<h4> North side:</h4>
							<label class="control-label col-sm-1">feet:</label>
							<div class="col-sm-5">
								<input type="number" min="0" name="north" class="form-control" id="n1">
							</div>
							<label class="control-label col-sm-1">inch:</label>
							<div class="col-sm-5">
								<input type="number" min="0" max="12" name="north" class="form-control" id="n2">
							</div> <br/> <br/>
							<button type="submit" value="submit" class="btn btn-md btn-default"> View area </button>
							<button type="reset" value="reset" class="btn btn-md btn-default"> Reset </button>
						</form>
						<div id="result"></div>
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
					function result(){
						if(confirm("Are you sure to view result")){
							return true;
						}else{
							return false;
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