<?php
	session_start();
	if(isset($_SESSION['id'])){
		//local variable
		$first1 = $_POST['1st1'];
		$first2 = 0;
		if(isset($_POST['1st2']) && $_POST['1st2'] != null){
			$first2 = $_POST['1st2'];
		}
		$first = round(($first1 + ($first2 / 12)), 3);
		$second1 = $_POST['2nd1'];
		$second2 = 0;
		if(isset($_POST['2nd2']) && $_POST['2nd2'] != null){
			$second2 = $_POST['2nd2'];
		}
		$second = round(($second1 + ($second2 / 12)), 3);
		$third1 = 0;
		if(isset($_POST['3rd1'])){
			$third1 = $_POST['3rd1'];
		}
		$third2 = 0;
		if(isset($_POST['3rd2']) && $_POST['3rd2'] != null){
			$third2 = $_POST['3rd2'];
		}
		$third = round(($third1 + ($third2 / 12)), 3);
		$fourth1 = 0;
		if(isset($_POST['4th1'])){
			$fourth1 = $_POST['4th1'];
		}
		$fourth2 = 0;
		if(isset($_POST['4th2']) && $_POST['4th2'] != null){
			$fourth2 = $_POST['4th2'];
		}
		$fourth = round(($fourth1 + ($fourth2 / 12)), 3);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> Aminship (working with your land) </title>
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap-theme.min.css" />
				<style>
					body {padding-top:60px;background-color:darkseagreen;}
				</style>
			</head>
			<body onload="calculate()">
				<?php include 'header.php'; ?>
				<div class="container-fluid">
					<div class="page-header"> <h4> Area Calculator of your land </h4> </div>
					<div class="jumbotron">
						<form class="form-horizontal" action="upload.php" name="areacalculate" onsubmit="return result()" method="post">
							<div class="form-group">
								<label class="control-label col-sm-2"> first side (feet) : </label>
								<div class="col-sm-4">
									<input type="number" name="1st" class="form-control" id="1st" value="<?php echo $first; ?>" readonly=""/>
								</div>
								<label class="control-label col-sm-2"> second side (feet) : </label>
								<div class="col-sm-4">
									<input type="number" name="2nd" class="form-control" id="2nd" value="<?php echo $second; ?>" readonly="" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2"> third side (feet) : </label>
								<div class="col-sm-4">
									<input type="number" name="3rd" class="form-control" id="3rd" value="<?php echo $third; ?>" readonly="" />
								</div>
								<label class="control-label col-sm-2"> fourth side (feet) : </label>
								<div class="col-sm-4">
									<input type="number" name="4th" class="form-control" id="4th" value="<?php echo $fourth; ?>" readonly="" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2"> area (cent) : </label>
								<div class="col-sm-4">
									<input type="text" name="result1" class="form-control" id="result1" readonly=""/>
								</div>
								<label class="control-label col-sm-2"> area (sq feet) : </label>
								<div class="col-sm-4">
									<input type="text" name="result" class="form-control" id="result2" readonly=""/>
								</div>
							</div>
							<br/> <br/>
							<button type="submit" value="submit" class="btn btn-md btn-default" onclick="return result()"> Save info </button>
							<a type="submit" value="refresh" class="btn btn-md btn-default"
							<?php
								if($fourth != 0){echo 'href="area.php"';}
								else if($third != 0){echo 'href="tarea.php"';}
								else{echo 'href="sarea.php"';}
							?>> Calculate again </a>
						</form>
					</div>
				</div>
				<div class="sitefooter"></div>
				<script src="../style/js/jquery.min.js"></script>
				<script src="../style/js/bootstrap.min.js"></script>
				<script src="../style/js/jscript.js"></script>
				<script>
					function calculate(){
						var first = document.getElementById('1st').value * 1;
						var second = document.getElementById('2nd').value * 1;
						var third = document.getElementById('3rd').value * 1;
						var fourth = document.getElementById('4th').value * 1;
						var area = 0;
						
						if(fourth > 0){
							var firstsecond = (first + second)/2;
							var thirdfourth = (third + fourth)/2;
							
							area = firstsecond * thirdfourth;
						}
						else if(third > 0){
							var S = (first + second + third) / 2;
				
							area = Math.sqrt(S * (S - first) * (S - second) * (S - third));
						}
						else if(second > 0){
							area = first * second * 0.7854;
						}
						
						
						var size = area / 435.6;
						
						document.getElementById('result1').value = size.toFixed(3);
						document.getElementById('result2').value = area.toFixed(2);
						return false;
					}
					function result(){
						if(confirm("Are you sure to save information")){
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
		header("location:../auth");
		exit;
	}
?>