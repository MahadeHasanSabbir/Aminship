<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> Aminship (working with your land) </title>
		<link rel="stylesheet" type="text/css" href="./style/css/bootstrap.min.css">
		<style>
			body {padding-top:60px;}
			#msg {display:none;}
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
									<li onclick="giveinfo()"><a href="./sarea.php">Area for circle</a></li>
								</ul>
						</li>
						<li onclick="giveinfo()"><a href="./side.php"> Side </a></li>
						<li onclick="giveinfo()"><a href="#"> Distribution </a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="./auth/register.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
						<li><a href="./auth/log.php"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
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
			<div id="msg" class="alert alert-success col-sm-12">
				<span class="glyphicon glyphicon-info-sign"> </span>
				<span id="result"> </span>
			</div>
			<div class="jumbotron">
				<form class="form-horizontal" name="areacalculate" onsubmit="return calculate()" method="post">
					<h4>East side:</h4>
					<label class="control-label col-sm-1"> feet: </label>
					<div class="col-sm-5">
						<input type="number" min="0" name="east" class="form-control" id="e1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12"  name="east" class="form-control" id="e2">
					</div>
					<h4> West side:</h4>
					<label class="control-label col-sm-1">feet:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="west" class="form-control" id="w1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12"  name="west" class="form-control" id="w2">
					</div>
					<h4> South side:</h4>
					<label class="control-label col-sm-1">feet:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="south" class="form-control" id="s1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12"  name="south" class="form-control" id="s2">
					</div>
					<h4> North side:</h4>
					<label class="control-label col-sm-1">feet:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="north" class="form-control" id="n1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12" name="north" class="form-control" id="n2">
					</div> <br/> <br/>
					<button type="submit" value="submit" class="btn btn-md btn-default"> View area </button>
					<button type="reset" value="reset" class="btn btn-md btn-default" onclick="document.getElementById('msg').style.display='none';" > Reset </button>
				</form>
				
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
			function calculate(){
				var east1 = document.getElementById('e1').value * 1;
				var east2 = document.getElementById('e2').value * 1;
				var east = east1 + (east2 / 12);
				var west1 = document.getElementById('w1').value * 1;
				var west2 = document.getElementById('w2').value * 1;
				var west = west1 + (west2 / 12);
				var south1 = document.getElementById('s1').value * 1;
				var south2 = document.getElementById('s2').value * 1;
				var south = south1 + (south2 / 12);
				var north1 = document.getElementById('n1').value * 1;
				var north2 = document.getElementById('n2').value * 1;
				var north = north1 + (north2 /12);
				
				var eastwest = (east + west)/2;
				var southnorth = (south + north)/2;
				
				var area = eastwest * southnorth;
				
				var size = area / 435.6;
				
				document.getElementById('msg').style.display="block";
				document.getElementById('result').innerHTML="<strong> Your area is "+size.toFixed(2)+" cent or "+area.toFixed(3)+" square feet</strong>";
				return false;
			}
		</script>
	</body>
</html>