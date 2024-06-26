<?php
	session_start();
	if(isset($_SESSION['id']) or isset($_SESSION['aid'])){
		header("location:./auth");
		exit;
	}
	//create connection with database
	$connect = mysqli_connect("localhost", "root", "", "aminship");
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
			input {padding:10px;}
			textarea {padding:10px;resize:none;}
			.center {display:grid;justify-content:center;}
			.center>div {padding:10px;}
		</style>
	</head>
	<body>
		<?php include 'header.php'; ?>
		<div class="container-fluid" role="main">
			<div class="jumbotron" style="margin-bottom:05px;">
				<p class="text-center"> <strong> Welcome to Aminship (land survey) project.</strong> We will help to calculator the area of your land like a Amin.</p>
			</div>
			<!--Slider-->
			<div id="carousel-generic" class="carousel slide" data-ride="carousel" style="height:60vh;">
				<ol class="carousel-indicators">
					<li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-generic" data-slide-to="1"></li>
					<li data-target="#carousel-generic" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox" style="height:100%">
					<div class="item active" style="height:100%">
						<img src="./style/gautier-pfeiffer-WPapb9IqRKw-unsplash.jpg" alt="First slide" height="100%" width="100%">
						<div class="carousel-caption">
							<h4>Welcome to this land survey project</h4>
						</div>
					</div>
					<div class="item" style="height:100%">
						<img src="./style/jan-antonin-kolar-lRoX0shwjUQ-unsplash.jpg" alt="Second slide" height="100%" width="100%">
						<div class="carousel-caption">
							<h4>Want to store all of your measurement?</h4>
							<a class="btn btn-md btn-success" href="./auth/register.php">Sign Up now</a>
							<p>We will store your data safely and provide document for store measurement.</p>
						</div>
					</div>
					<div class="item" style="height:100%">
						<img src="./style/valeria-fursa-8CACa5kjqMM-unsplash.jpg" alt="Third slide" height="100%" width="100%">
						<div class="carousel-caption">
							<h4><b>Aminship</b><br/>Your calculating assistant in land survey.</h4>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--measure description-->
			<div class="well" style="margin-top:05px;margin-bottom:05px;">
				<p class="lead text-justify"> Here is the instruction for measure your land. Before doing this, divide your land into the sape of triangle or rectangle or circle. Otherwise your don't get the perfect result.</p>
				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title text-center">Triangle shape land</h3>
						</div>
						<div class="panel-body text-justify row-md-4" >
							Simply take the length of the sides of your land and put it on the triangle shape area calculator page. When you take the length you must be conscious about the perfect value and put feet and inch separately into the respective input box.
						</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title text-center">Rectangle shape land</h3>
						</div>
						<div class="panel-body text-justify">
							Simply take the length of the sides of your land and put it on the rectangle shape area calculator page. When you take the length you must be conscious about the perfect value and put feet and inch separately into the respective input box.
						</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title text-center">Circle shape land</h3>
						</div>
						<div class="panel-body text-justify">
							Simply take the length of the long radios and short radios of your land then put it on the circle shape area calculator page. When you take the length you must be conscious about the perfect value and put feet and inch separately into the respective input box.
						</div>
						</div>
					</div>
				</div>
				<p class="text-center"> To know more visit <a href="./about.php" class="btn btn-sm btn-link"> About </a> </p>
			</div>
			<!--contact us-->
			<div class="well" style="display:flow-root;margin-bottom:05px;">
				<div class="col-md-6" style="margin-bottom:35px;">
					<h4 class="text-center" style="margin-bottom:20px;"> Contact with us </h4>
					<div class="center">
						<div>
							<span class="glyphicon glyphicon-envelope"></span>
							<a href="mailto:info@aminship.com" > info@aminship.com </a>
						</div>
						<div>
							<span class="glyphicon glyphicon-phone"></span>
							<b>+8801000000000</b>
						</div>
						<div>
							<span class="glyphicon glyphicon-map-marker"></span>
							<i> city, upzila, district </i>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h4 class="text-center" style="padding-bottom:10px;"> Massage with us</h4>
					<div>
						<?php
							if(isset($_POST['name'])){
								//local variable
								$name = $_POST['name'];
								$email = $_POST['email'];
								$text = $_POST['text'];
								
								//sql query for upload data to database
								$sqlquery = "INSERT INTO massage (name, email, text) VALUES ('$name', '$email', '$text')";
								
								//method for upload data to database
								mysqli_query($connect, $sqlquery);
								
								//success massage
						?>
								<div class='alert alert-success'>
									<span class='glyphicon glyphicon-info-sign'></span>
									Your massage send successfully. We will contact you within a day.
									<button type='button' class='close' data-dismiss='alert' area-label='close'>
										<span area-hidden='true'> &times; </span>
									</button>
								</div>
						<?php
							}
						?>
					</div>
					<form class="form-horizontal" name="contact" method="post">
						<div class="form-group">
							<label class="control-label col-sm-2"> Name:</label>
							<div class="col-sm-10">
								<input type="text" name="name" placeholder="Enter your name here" class="form-control" required=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2"> E-mail:</label>
							<div class="col-sm-10">
								<input type="text" name="email" placeholder="Enter your e-mail here" class="form-control" required=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2"> Massage:</label>
							<div class="col-sm-10">
								<textarea name="text" placeholder="Enter your massage here" class="form-control" rows="5" required=""></textarea>
							</div>
						</div>
						<button type="submit" value="submit" class="btn btn-md btn-sm btn-default col-sm-offset-2"> Send massage </button>
					</form>
				</div>
			</div>
		</div>
		<div class="sitefooter"></div>
		<script src="./style/js/jquery.min.js"></script>
		<script src="./style/js/bootstrap.min.js"></script>
		<script src="./style/js/jscript.js"></script>
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