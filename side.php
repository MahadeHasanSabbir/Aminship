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
			<div class="page-header"> <h4> Find portion from Rectengle shape land </h4> </div>
			<div id="msg" class="alert alert-info col-sm-12">
				<span class="glyphicon glyphicon-info-sign"></span>
				<span id="result"> </span>
			</div>
			<div class="jumbotron">
				<form class="form-horizontal" name="areacalculate" onsubmit="return calculate()" method="post">
					<h4>1<sup>st</sup> known side:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1">feet:</label>
						<div class="col-sm-5">
							<input type="number" min="0" name="known" class="form-control" id="k1" autofocus="" required="">
						</div>
						<label class="control-label col-sm-1">inch:</label>
						<div class="col-sm-5">
							<input type="number" min="0" max="12"  name="known" class="form-control" id="k2">
						</div>
					</div>
					<h4> known side's alternate side:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1">feet:</label>
						<div class="col-sm-5">
							<input type="number" min="0" name="aknown" class="form-control" id="ak1" required="">
						</div>
						<label class="control-label col-sm-1">inch:</label>
						<div class="col-sm-5">
							<input type="number" min="0" max="12"  name="aknown" class="form-control" id="ak2">
						</div>
					</div>
					<h4>Total area:</h4>
					<div class="form-group">
						<label class="control-label col-sm-1">Cent:</label>
						<div class="col-sm-5">
							<input type="text" name="area" class="form-control" id="a" required=""/>
						</div>
					</div> <br/>
					<button type="submit" value="submit" class="btn btn-md btn-default" > View length </button>
					<button type="reset" value="reset" class="btn btn-md btn-default" onclick="document.getElementById('msg').style.display='none';"> Reset </button>
				</form>
			</div>
		</div>
		<div class="sitefooter"></div>
		<script src="./style/js/jquery.min.js"></script>
		<script src="./style/js/bootstrap.min.js"></script>
		<script src="./style/js/jscript.js"></script>
		<script>
			function calculate(){
				var known1 = document.getElementById('k1').value * 1;
				var known2 = document.getElementById('k2').value * 1;
				var known = known1 + (known2 / 12);
				var aknown1 = document.getElementById('ak1').value * 1;
				var aknown2 = document.getElementById('ak2').value * 1;
				var aknown = aknown1 + (aknown2 / 12);
				
				var knownside = (known + aknown)/2;
				
				var area = document.getElementById('a').value * 1;
				var areapattern = /^[0-9]*\.[0-9]+|[0-9]+$/;
				if(!areapattern.test(area)){
					alert("Incorrect value for cent!");
					return false;
				}
				
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