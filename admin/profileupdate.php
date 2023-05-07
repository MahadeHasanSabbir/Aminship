<?php
	session_start();
	if(isset($_SESSION['aid'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//sql query to find user information from database
		$sql= "SELECT * FROM user WHERE ID = '$_GET[id]'";

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
				<title> <?php echo $row['name'];?>'s Information update Form | Aminship (working with your land) </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap-theme.min.css" />
				<style>
					body {padding-top:60px;background-color:darkseagreen;}
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
							<a class="navbar-brand" href="./adminprofile.php">Aminship / Admin </a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="active"> <a href="./adminprofile.php"> Dashboard </a> </li>
								<li onclick="return apermit()"> <a href="./users.php"> View users </a> </li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li onclick="return permit()">
									<a href="http://localhost/Aminship/admin/logout.php">Log out</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="container" role="main">
					<div class="page-header">
						<h4> Information update form for ID: <?php echo $row['ID']; ?></h4>
					</div>
					<div class="jumbotron">
						<form <?php echo "action='userupdate.php?id=$row[ID]&pass=0'";?> name="bgregform" onsubmit="return validate()" autocomplete="off" method="post">
							<label> Name :</label> <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name'];?>" required=""/> <br/>
							<label> Mobile :</label> <input type="text" name="number" class="form-control" id="number" value="<?php echo $row['phone'];?>" required=""/> <br/>
							<label> E-mail :</label> <input type="text" name="email" class="form-control" id="mail" value="<?php echo $row['mail'];?>" required=""/> <br/> <br/>
							<button type="Submit" value="Update" class="btn btn-md btn-default"> Update </button> <br/>
						</form>
					</div>
				</div>
				<div id="content_footer"></div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script>
					function validate(){
						//Reguler Expressions
						var namepattern = /^[A-Za-z \.]{3,35}$/i;
						var numberpattern = /^\+88[0-9]{11}$/;
						var emailpattern = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
						
						//Values from user
						var namevalue = document.getElementById('name').value;
						var numbervalue = document.getElementById('number').value;
						var emailvalue = document.getElementById('mail').value;
						
						//Validate the value
						if(!namepattern.test(namevalue)){
							alert("Incorrect name");
							return false;
						}
						else if(!numberpattern.test(numbervalue)){
							alert("Incorrect number");
							return false;
						}
						else if(!emailpattern.test(emailvalue)){
							alert("Incorrect E-mail");
							return false;
						}
						else{
							if(confirm(namevalue + "'s information will update.\nClick ok to proceid")){
								return true;
							}else{
								return false;
							}
						}
					}
				</script>
			</body>
		</html>
<?php
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/Aminship/admin/");
		exit;
	}
?>