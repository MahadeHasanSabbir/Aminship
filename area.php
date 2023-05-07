<?php
	session_start();
	if(isset($_SESSION['id']) or isset($_SESSION['aid'])){
		header("location:http://localhost/Aminship/auth");
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> Aminship (working with your land) </title>
		<link rel="stylesheet" type="text/css" href="./style/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./style/css/bootstrap-theme.min.css">
		<style>
			body {padding-top:60px;background-color:darkseagreen;}
			#msg {display:none;}
		</style>
	</head>
	<body>
		<?php include 'header.php'; ?>
		<div class="container-fluid">
			<ul class="breadcrumb">
				<li><a href="#">Area</a></li>
				<li class="active"> Area for rectengle shape land </li>
			</ul>
			<div class="page-header"> <h4> Area Calculator for Rectengle shape land </h4> </div>
			<div id="msg" class="alert alert-info col-sm-12">
				<span class="glyphicon glyphicon-info-sign"> </span>
				<span id="result"> </span>
			</div>
			<div class="jumbotron">
				<form class="form-horizontal" name="areacalculate" onsubmit="return calculate()" method="post">
					<h4>East side:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1"> feet: </label>
						<div class="col-sm-5">
							<input type="number" min="0" name="east" class="form-control" id="e1" autofocus=""  required="">
						</div>
						<label class="control-label col-sm-1">inch:</label>
						<div class="col-sm-5">
							<input type="number" min="0" max="12"  name="east" class="form-control" id="e2">
						</div>
					</div>
					<h4> West side:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1">feet:</label>
						<div class="col-sm-5">
							<input type="number" min="0" name="west" class="form-control" id="w1" required="">
						</div>
						<label class="control-label col-sm-1">inch:</label>
						<div class="col-sm-5">
							<input type="number" min="0" max="12"  name="west" class="form-control" id="w2">
						</div>
					</div>
					<h4> South side:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1">feet:</label>
						<div class="col-sm-5">
							<input type="number" min="0" name="south" class="form-control" id="s1" required="">
						</div>
						<label class="control-label col-sm-1">inch:</label>
						<div class="col-sm-5">
							<input type="number" min="0" max="12"  name="south" class="form-control" id="s2">
						</div>
					</div>
					<h4> North side:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1">feet:</label>
						<div class="col-sm-5">
							<input type="number" min="0" name="north" class="form-control" id="n1" required="">
						</div>
						<label class="control-label col-sm-1">inch:</label>
						<div class="col-sm-5">
							<input type="number" min="0" max="12" name="north" class="form-control" id="n2">
						</div>
					</div> <br/>
					<button type="submit" value="submit" class="btn btn-md btn-default"> View area </button>
					<button type="reset" value="reset" class="btn btn-md btn-default" onclick="document.getElementById('msg').style.display='none';" > Reset </button>
				</form>
				
			</div>
		</div>
		<div class="sitefooter"></div>
		<script src="./style/js/jquery.min.js"></script>
		<script src="./style/js/bootstrap.min.js"></script>
		<script src="./style/js/jscript.js"></script>
		<script>
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
				document.getElementById('result').innerHTML="<strong> Your area is "+size.toFixed(3)+" cent or "+area.toFixed(3)+" square feet</strong>";
				return false;
			}
		</script>
	</body>
</html>
<?php
	$ip = $_SERVER['REMOTE_ADDR'];
	if (filter_var($ip, FILTER_VALIDATE_IP)) {
		$date = new DateTime();
		$time = $date -> format('Y-m-j:H:i:s');
		
		$connect = mysqli_connect("localhost", "root", "", "aminship");
		$sql = "INSERT INTO visitors (time, ip) VALUES ('$time', '$ip')";
		
		mysqli_query($connect, $sql);
	}
?>