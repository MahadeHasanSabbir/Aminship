<?php
	session_start();
	if(isset($_SESSION['aid'])){
		header("location:http://localhost/Aminship/admin");
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> Registrartion Form | Aminship(working with your land) </title>
		<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap-theme.min.css">
		<style>
			body {padding-top:60px;background-color:darkseagreen;}
		</style>
	</head>
	<body>
		<?php include 'header.php'; ?>
		<div class="container-fluid">
			<div class="jumbotron">
				<h2> Registration form </h2>
				<form action="action.php" name="regform" onsubmit="return validate()" autocomplete="off" method="post">
					<label> Name </label>:  <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name." required="" autofocus /><br/>
					<label> Mobile </label>:  <input type="text" name="number" class="form-control" id="number" placeholder="+8801........." title="It is mandatory to use +88 before your number" required=""/> <br/>
					<label> E-mail </label>:  <input type="text" name="email" class="form-control" id="mail" placeholder="Enter a valid email." required=""/> <br/>
					<label> Password </label>:  <input type="password" name="password" class="form-control" id="pass" placeholder="Creat a password in 4 to 8 character" title="alphanumaric and @,#,$,%,& are allow" required=""/> <br/>
					<button type="Submit" value="Submit" class="btn btn-md btn-default"> Register </button>
					<button type="Reset" value="Reset" class="btn btn-md btn-default"> Reset </button> <br/>
				</form>
			</div>
		</div>
		<div id="content_footer"></div>
		<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
		<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
		<script src="http://localhost/Aminship/style/js/jscript.js"></script>
		<script>
			function validate(){
				//Reguler Expressions
				var namepattern = /^[A-Za-z \.]{3,35}$/i;
				var numberpattern = /^\+88[0-9]{11}$/;
				var emailpattern = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
				var passwordpattern = /^[A-Za-z0-9\@\#\$\%\&]{4,8}$/i;
				
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
					if(confirm("Thank you, " + namevalue + ". Registrartion form fillup!\nRemember Your password for future use.\nClick ok to proceid")){
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
	$ip = $_SERVER['REMOTE_ADDR'];
	if (filter_var($ip, FILTER_VALIDATE_IP)) {
		$date = new DateTime();
		$time = $date -> format('Y-m-j:H:i:s');
		
		$connect = mysqli_connect("localhost", "root", "", "aminship");
		$sql = "INSERT INTO visitors (time, ip) VALUES ('$time', '$ip')";
		
		mysqli_query($connect, $sql);
	}
?>