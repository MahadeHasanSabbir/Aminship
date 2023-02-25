<!DOCTYPE html>
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
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Area <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li onclick="giveinfo()"><a href="./tarea.php">Area for triangle</a></li>
									<li onclick="giveinfo()"><a href="./area.php">Area for rectengle</a></li>
									<li onclick="giveinfo()"><a href="./sarea.php">Area for Circle</a></li>
								</ul>
						</li>
						<li class="active" onclick="giveinfo()"><a href="./side.php"> Side </a></li>
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
			<div class="page-header"> <h4> Side Calculator for Rectengle shape land </h4> </div>
			<div id="msg" class="alert alert-success col-sm-12">
				<span class="glyphicon glyphicon-info-sign"></span>
				<span id="result"> </span>
			</div>
			<div class="jumbotron">
				<form class="form-horizontal" name="areacalculate" onsubmit="return calculate()" method="post">
					<h4>1<sup>st</sup> known side:</h4>
					<label class="control-label col-sm-1">feet:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="known" class="form-control" id="k1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12"  name="known" class="form-control" id="k2">
					</div>
					<h4> known side's alternate side:</h4>
					<label class="control-label col-sm-1">feet:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="aknown" class="form-control" id="ak1" required="">
					</div>
					<label class="control-label col-sm-1">inch:</label>
					<div class="col-sm-5">
						<input type="number" min="0" max="12"  name="aknown" class="form-control" id="ak2">
					</div>
					<h4>Total area:</h4>
					<label class="control-label col-sm-1">Cent:</label>
					<div class="col-sm-5">
						<input type="number" min="0" name="area" class="form-control" id="a" required=""/>
					</div> <br/> <br/>
					<button type="submit" value="submit" class="btn btn-md btn-default" > Submit </button>
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
				var known1 = document.getElementById('k1').value * 1;
				var known2 = document.getElementById('k2').value * 1;
				var known = known1 + (known2 / 12);
				var aknown1 = document.getElementById('ak1').value * 1;
				var aknown2 = document.getElementById('ak2').value * 1;
				var aknown = aknown1 + (aknown2 / 12);
				
				var knownside = (known + aknown)/2;
				
				var area = document.getElementById('a').value * 1;
				
				var size = area * 435.6;
				
				var unknown = size / knownside;
				var unknown1 = unknown - (unknown % 1);
				var unknown2 = (unknown - unknown1) * 12;
				
				document.getElementById('msg').style.display="block";
				if(unknown2 <= 0){
					document.getElementById('result').innerHTML=" Your unknown side is '" + unknown1 + "' feet";
				}else{
					document.getElementById('result').innerHTML="<strong> Your unknown side is '" + unknown1 + "' feet and '" + unknown2.toFixed(2) + "' inch</strong>";
				}
				return false;
			}
		</script>
	</body>
</html>