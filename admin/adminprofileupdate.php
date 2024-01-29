<?php
	session_start();
	if(isset($_SESSION['aid'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//sql query to find user information from database
		$sql = "SELECT * FROM admin WHERE admin.ID = '$_SESSION[aid]'";

		//take data from database
		$data = mysqli_query($conect, $sql);

		//convert 2D array to 1D array
		$row = mysqli_fetch_assoc($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> Admin panel </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap-theme.min.css">
				<style>
					body {padding-top:60px;background-color:darkseagreen;}
				</style>
			</head>
			<body>
				<?php include 'header.php';?>
				<div class="container">
					<div class="page-header"> <h4> Admin information update form </h4> </div>
					<div class="jumbotron">
						<form action="action.php" onsubmit="return validate()" method="post" >
							<label class="control-label"> Admin ID </label>:  <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['ID'];?>" required=""/><br/>
							<label class="control-label"> Password </label>:  <input type="password" name="password" class="form-control" id="pass"  placeholder="Creat a new password or give the old one." title="alphanumaric and @,#,$,%,& are allow" required=""/> <br/>
							<button type="Submit" value="Update" class="btn btn-md btn-default"> Update </button> <br/>
						</form>
					</div>
				</div>
				<div id="footer"></div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script src="http://localhost/Aminship/style/js/jscript.js"></script>
				<script>
					function validate(){
						//Reguler Expressions
						var namepattern = /^[A-Za-z0-9]{4,10}$/i;
						var passwordpattern = /^[A-Za-z0-9\@\#\$\%\&]{4,8}$/i;
						
						//Values from user
						var namevalue = document.getElementById('name').value;
						var passwordvalue = document.getElementById('pass').value;
						
						//Validate the value
						if(!namepattern.test(namevalue)){
							alert("Incorrect ID! ID can be alphanumaric only.");
							return false;
						}
						else if(!passwordpattern.test(passwordvalue)){
							alert("Incorrect password! Please follow the pattern of the password.");
							return false;
						}
						else
							alert("Your information will update!\nClick ok to proceed");
						}
				</script>
			</body>
		</html>
<?php
	mysqli_close($conect);
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/admin/");
		exit;
	}
?>