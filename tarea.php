<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> Aminship (working with your land) </title>
		<link rel="stylesheet" type="text/css" href="./style/css/bootstrap.min.css">
		<style>
			body {padding-top:60px;}
			label{font-weight:bold;width:50px;display:inline-block;}
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
									<li class="active" onclick="giveinfo()"><a href="./tarea.php">Area for triangle</a></li>
									<li onclick="giveinfo()"><a href="./area.php">Area for rectengle</a></li>
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
				<li class="active"> Area for triangle </li>
			</ul>
			<div class="page-header"> <h4> Area Calculator for Triangle shape land </h4> </div>
			<div id="msg" class="alert alert-success col-sm-12">
				<span class="glyphicon glyphicon-info-sign"> </span>
				<span id="result"> </span>
			</div>
			<div class="jumbotron">
				<form class="form-horizontal" name="areacalculate" onsubmit="return calculate()" method="post">
					<h4> 1<sup>st</sup> side:</h4>
					<label class="control-label col-sm-1">feet:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="1st" class="form-control" id="1st1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12"  name="1st" class="form-control" id="1st2">
					</div>
					<h4> 2<sup>nd</sup> side:</h4>
					<label class="control-label col-sm-1">feet:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="2nd" class="form-control" id="2nd1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12"  name="2nd" class="form-control" id="2nd2">
					</div>
					<h4> 3<sup>rd</sup> side:</h4>
					<label class="control-label col-sm-1">feet:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="3rd" class="form-control" id="3rd1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12" name="3rd" class="form-control" id="3rd2"> 
					</div> <br/> <br/>
					<button type="submit" value="submit" class="btn btn-md btn-default"> View area </button>
					<button type="reset" value="reset" class="btn btn-md btn-default" onclick="document.getElementById('msg').style.display='none';"> Reset </button>
				</form>
				<div id="result"></div>
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
				var first1 = document.getElementById('1st1').value * 1;
				var first2 = document.getElementById('1st2').value * 1;
				var first = first1 + (first2 / 12);
				var second1 = document.getElementById('2nd1').value * 1;
				var second2 = document.getElementById('2nd2').value * 1;
				var second = second1 + (second2 / 12);
				var third1 = document.getElementById('3rd1').value * 1;
				var third2 = document.getElementById('3rd2').value * 1;
				var third = third1 + (third2 / 12);
				
				var S = (first + second + third) / 2;
				
				var area = Math.sqrt(S * (S - first) * (S - second) * (S - third));
				
				var size = area / 435.6;
				
				document.getElementById('msg').style.display="block";
				document.getElementById('result').innerHTML="<strong> Your area is "+size.toFixed(2)+" cent or "+area.toFixed(3)+" square feet</strong>";
				return false;
			}
		</script>
	</body>
</html>