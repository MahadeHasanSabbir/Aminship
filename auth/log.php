<?php
	session_start();
	if(isset($_SESSION['aid'])){
		header("location:../admin");
		exit;
	}
	$connect = mysqli_connect("localhost","root","","aminship");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> Login page | Aminship (working with your land) </title>
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../style/css/bootstrap-theme.min.css">
		<style>
			body {padding-top:80px;background-color:darkseagreen;}
			.justify {display:grid;justify-content:center;text-align:center;}
		</style>
	</head>
	<body>
		<?php include 'header.php'; ?>
		<div class="container-fluid justify">
			<div class="jumbotron">
				<h2 style="margin-bottom:20px;"> Log in form </h2>
				<?php
				if(isset($_SESSION['error'])){
					echo "
						<div class='alert alert-danger'>
							<span class='glyphicon glyphicon-alert'></span>
							$_SESSION[error]
							<button type='button' class='close' data-dismiss='alert' area-label='close'>
								<span area-hidden='true'> &times; </span>
							</button>
						</div>";
					$_SESSION = array();
					session_destroy();
				}
				if(isset($_SESSION['success'])){
					echo "
						<div class='alert alert-success'>
							<span class='glyphicon glyphicon-info-sign'></span>
							$_SESSION[success]
							<button type='button' class='close' data-dismiss='alert' area-label='close'>
								<span area-hidden='true'> &times; </span>
							</button>
						</div>";
					$_SESSION = array();
					session_destroy();
				}
				if(isset($_GET['id'])){
					echo "
						<div class='alert alert-info'>
							<span class='glyphicon glyphicon-info-sign'></span>
							Remember Your ID for future use!
						</div>";
				}
				?>
				<form class="form-horizontal" action="authentication.php" method="post" onsubmit="return valid()">
					<div class="form-group">
						<label class="col-md-12" style="text-align:center;"> User ID </label>
						<?php
						if(isset($_GET['id'])){
							$id = mysqli_real_escape_string($connect, $_GET['id']);
							//sql query to find user information from database
							$sqlquery = "SELECT * FROM user WHERE ID = '$id'";

							//take data from database
							$data = mysqli_query($connect, $sqlquery);

							//convert 2D array to 1D array
							$row = mysqli_fetch_array($data);
						?>
						<input type="text" name="id" class="form-control" id="id" required="" value="<?php echo $row['ID'];?>" required="" autofocus />
						<?php
						}
						else{
						?>
						<input type="text" name="id" class="form-control" id="id" required="" placeholder="Enter your user account ID" autofocus />
						<?php
						}
						?>
					</div>
					<div class="form-group">
						<label class="col-md-12" style="text-align:center;"> Password </label>
						<input type="password" name="password" class="form-control" id="pass" required="" placeholder="Enter your user account password"/>
					</div>
					<button class="btn btn-md btn-default" type="Submit" value="Login"> Log in </button>
					<button class="btn btn-md btn-default" type="Reset" value="Reset"> Reset </button>
				</form> <br/>
				<?php
				if(!isset($_GET['id'])){
				?>
					<div class="text-center"> Don't have any account? <a class="btn btn-md btn-link" href="./register.php" > Register </a>
					<div class="text-center"> Forget your password? <a class="btn btn-md btn-link" href="mailto:info.pass@aminship.com" > mail us </a>
					</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="sitefooter"></div>
		<script src="../style/js/jquery.min.js"></script>
		<script src="../style/js/bootstrap.min.js"></script>
		<script src="../style/js/jscript.js"></script>
		<script>
			function valid(){
				var id = document.getElementById('id').value;
				var pass = document.getElementById('pass').value;
				
				var sampleId = /^[0-9]{9}$/i;
				var samplePass = /^[A-Za-z0-9\@\#\$\%\&]{4,9}$/i;
				
				if(!sampleId.test(id)){
					alert("!Invalide ID");
					return false;
				}
				else if(!samplePass.test(pass)){
					alert("!Invalide Password");
					return false;
				}
				return true;
			}
		</script>
	</body>
</html>
<?php
	$ip = $_SERVER['REMOTE_ADDR'];
	if (filter_var($ip, FILTER_VALIDATE_IP)) {
		$date = new DateTime();
		$time = $date -> format('Y-m-j:H:i:s');
		
		$sql = "INSERT INTO visitors (time, ip) VALUES ('$time', '$ip')";
		
		mysqli_query($connect, $sql);
		mysqli_close($connect);
	}
?>