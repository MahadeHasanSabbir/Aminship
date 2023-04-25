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
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap-theme.min.css" />
				<style>
					body {padding-top:60px;background-color:darkseagreen;}
				</style>
			</head>
			<body>
				<?php include 'header.php'; ?>
				<div class="container-fluid">
					<ul class="breadcrumb">
						<li><a href="#">Area</a></li>
						<li class="active"> Area for triangle shape land </li>
					</ul>
					<div class="page-header"> <h4> Area Calculator for Triangle shape land </h4> </div>
					<div class="jumbotron">
						<form action="calculate.php" class="form-horizontal" name="areacalculate" onsubmit="return result()" method="post">
							<h4> 1<sup>st</sup> side:</h4>
							<div class="form-group">
								<label class="control-label col-sm-1">feet:</label>
								<div class="col-sm-5">
									<input type="number" min="0" name="1st1" class="form-control" id="1st1" required="" autofocus="">
								</div>
								<label class="control-label col-sm-1">inch:</label>
								<div class="col-sm-5">
									<input type="number" min="0" max="12"  name="1st2" class="form-control" id="1st2">
								</div>
							</div>
							<h4> 2<sup>nd</sup> side:</h4>
							<div class="form-group">
								<label class="control-label col-sm-1">feet:</label>
								<div class="col-sm-5">
									<input type="number" min="0" name="2nd1" class="form-control" id="2nd1" required="">
								</div>
								<label class="control-label col-sm-1">inch:</label>
								<div class="col-sm-5">
									<input type="number" min="0" max="12"  name="2nd2" class="form-control" id="2nd2">
								</div>
							</div>
							<h4> 3<sup>rd</sup> side:</h4>
							<div class="form-group">
								<label class="control-label col-sm-1">feet:</label>
								<div class="col-sm-5">
									<input type="number" min="0" name="3rd1" class="form-control" id="3rd1" required="">
								</div>
								<label class="control-label col-sm-1">inch:</label>
								<div class="col-sm-5">
									<input type="number" min="0" max="12" name="3rd2" class="form-control" id="3rd2"> 
								</div>
							</div> <br/>
							<button type="submit" value="submit" class="btn btn-md btn-default"> View area </button>
							<button type="reset" value="reset" class="btn btn-md btn-default"> Reset </button>
						</form>
					</div>
				</div>
				<div class="sitefooter"></div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script src="http://localhost/Aminship/style/js/jscript.js"></script>
			</body>
		</html>
<?php
	}
	else{
		header("location:http://localhost/Aminship/auth");
		exit;
	}
?>