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
				<li class="active"> Area for circle shape land</li>
			</ul>
			<div class="page-header"> <h4> Area Calculator for Circle shape land </h4> </div>
			<div id="msg" class="alert alert-info col-sm-12">
				<span class="glyphicon glyphicon-info-sign"> </span>
				<span id="result"> </span>
			</div>
			<div class="jumbotron">
				<form class="form-horizontal" name="areacalculate" onsubmit="return calculate()" method="post">
					<h4> Long radius side:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1">feet:</label>
						<div class="col-sm-5">
							<input type="number" min="0" name="1st" class="form-control" id="1st1" autofocus="" required="">
						</div>
						<label class="control-label col-sm-1">inch:</label>
						<div class="col-sm-5">
							<input type="number" min="0" max="12"  name="1st" class="form-control" id="1st2">
						</div>
					</div>
					<h4> Short radius side:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1">feet:</label>
						<div class="col-sm-5">
							<input type="number" min="0" name="2nd" class="form-control" id="2nd1" required="">
						</div>
						<label class="control-label col-sm-1">inch:</label>
						<div class="col-sm-5">
							<input type="number" min="0" max="12"  name="2nd" class="form-control" id="2nd2">
						</div>
					</div> <br/>
					<button type="submit" value="submit" class="btn btn-md btn-default"> View area </button>
					<button type="reset" value="reset" class="btn btn-md btn-default" onclick="document.getElementById('msg').style.display='none';"> Reset </button>
				</form>
				<div id="result"></div>
			</div>
		</div>
		<div class="sitefooter"></div>
		<script src="./style/js/jquery.min.js"></script>
		<script src="./style/js/bootstrap.min.js"></script>
		<script src="./style/js/jscript.js"></script>
		<script>
			function calculate(){
				var first1 = document.getElementById('1st1').value * 1;
				var first2 = document.getElementById('1st2').value * 1;
				var first = first1 + (first2 / 12);
				var second1 = document.getElementById('2nd1').value * 1;
				var second2 = document.getElementById('2nd2').value * 1;
				var second = second1 + (second2 / 12);
				
				var area = first * second * 0.7854;
				
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
		mysqli_close($connect);
	}
?>