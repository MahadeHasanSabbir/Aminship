<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//sql query to find user information from database
		$sql= "SELECT * FROM user WHERE ID = '$_SESSION[id]'";

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
				<style>
					body {padding-top:60px;}
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
								<li class="active"><a href="./"> Home </a></li>
								<li><a href="./about.php"> About </a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Area <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li onclick="giveinfo()"><a href="./tarea.php">Area for triangle</a></li>
											<li onclick="giveinfo()"><a href="./area.php">Area for rectengle</a></li>
											<li onclick="giveinfo()"><a href="./sarea.php">Area for circle</a></li>
										</ul>
								</li>
								<li onclick="giveinfo()"><a href="./side.php"> Side </a></li>
								<li onclick="giveinfo()"><a href="#"> Distribution </a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="http://localhost/Aminship/auth/logout.php"> Log out </a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="container" role="main">
					<div class="page-header"> <h4> Information update form </h4> </div>
					<div class="jumbotron">
						<form action="update.php" name="bgregform" onsubmit="return validate()" autocomplete="off" method="post">
							<label> Name :</label> <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name'];?>" required=""/> <br/>
							<label> Mobile :</label> <input type="text" name="number" class="form-control" id="number" value="<?php echo $row['phone'];?>" required=""/> <br/>
							<label> E-mail :</label> <input type="text" name="email" class="form-control" id="mail" value="<?php echo $row['mail'];?>" required=""/> <br/>
							<label> Password :</label> <input type="password" name="password" class="form-control" id="pass" placeholder="Creat a new password or give the old one." title="alphanumaric and @,#,$,%,& are allow" required=""/> <br/> <br/>
							<button type="Submit" value="Update" class="btn btn-md btn-default"> Update </button> <br/>
						</form>
					</div>
				</div>
				<div id="content_footer"></div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script>
					function giveinfo(){
						if (sessionStorage.getItem("visited") === null) {
							alert("Please read all the information of this page before doing any calculation!");
							sessionStorage.setItem("visited", "true");
						  }
					}
					function validate(){
						//Reguler Expressions
						var namepattern = /^[A-Za-z \.]{3,35}$/i;
						var numberpattern = /^\+88[0-9]{11}$/;
						var emailpattern = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
						var passwordpattern = /^[a-z0-9\@\#\$\%\&]{4,8}$/i;
						
						//Values from user
						var namevalue = document.getElementById('name').value;
						var numbervalue = document.getElementById('number').value;
						var emailvalue = document.getElementById('mail').value;
						var passwordvalue = document.getElementById('pass').value;
						
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
						else if(!passwordpattern.test(passwordvalue)){
							alert("Incorrect password");
							return false;
						}
						else{
							if(confirm("Dear, " + namevalue + ". Your information will update.\nClick ok to proceid")){
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
		header("location:http://localhost/Aminship/auth/log.php");
		exit;
	}
?>