<?php
	session_start();
	if(isset($_SESSION['aid'])){
		header("location:../admin");
		exit;
	}
	if(isset($_SESSION['id'])){
		//create connection with database
		$connect = mysqli_connect("localhost","root","","aminship");

		//sql query to find user information from database
		$sqlquery = "SELECT name FROM user WHERE ID = '$_SESSION[id]'";

		//take data from database
		$data = mysqli_query($connect, $sqlquery);

		//convert 2D array to 1D array
		$row = mysqli_fetch_assoc($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> Aminship (working with your land) </title>
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../style/css/bootstrap-theme.min.css">
				<style>
					body {padding-top:60px;background-color:darkseagreen;}
					.jumbotron {margin-bottom:10px;}
					.jumbotron p {margin-bottom:0px;}
				</style>
			</head>
			<body>
				<?php include 'header.php'; ?>
				<div class="container-fluid" role="main">
					<!--websiteinfo-->
					<div class="well" style="margin-bottom:05px; background-image:url(../style/pexels-rafa-de-30134402.jpg); background-size:cover;color:white;padding-top:05px;">
						<div class="jumbotron" style="background-color:unset;">
						<p class="text-center">
							<strong> Welcome! <q> <?php echo $row['name'];?> </q> </strong> We are here to help you calculating your land area and distribute your land as you want.
						</p>
						</div>
						<blockquote class="bg-warning" style="color:black;">
							<p>
								Before starting the measurement we want to clear one thing, we will help you to calculate the area or find out a portion of a land depending on your input. We can not help you to measure the size of a side in your land, it will be done by you.
							</p>
							<footer> From Aminship </footer>
						</blockquote>
						<p class="text-justify">
							When it come about land there is no actual size of it. Land could have many axis and those could be straight or curved. For the betterment of measurement and error less area calculation we need to divide land into some geometric shape. Land shape could be Triangle, Rectangle or Ellipse. It is not being a problem when you divide your land. Just calculate every divided shape individually and sum them lastly for final result. We will help you to calculate the individual shape of land. Here is the process,
						</p>
					</div>
					<div>
						<ul class="list-group" style="margin-bottom:10px;">
							<li class="list-group-item">
								<h4 class="list-group-item-heading"> Triangle shape land measurement process </h4>
								<p class="list-group-item-text text-justify">
									Simply take the length of the sides of your land and put it on the triangle shape area calculator page. When you take the length you must be conscious about the perfect value and put feet and inch separately into the respective input box.
								</p>
							</li>
							<li class="list-group-item">
								<h4 class="list-group-item-heading"> Rectangle shape land measurement process </h4>
								<p class="list-group-item-text text-justify">
									Simply take the length of the sides of your land and put it on the rectangle shape area calculator page. When you take the length you must be conscious about the perfect value and put feet and inch separately into the respective input box.
								</p>
							</li>
							<li class="list-group-item">
								<h4 class="list-group-item-heading"> Circle shape land measurement process </h4>
								<p class="list-group-item-text text-justify">
									Simply take the length of the long radius and short radius of your land then put it on the circle shape area calculator page. When you take the length you must be conscious about the perfect value and put feet and inch separately into the respective input box.
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="sitefooter"></div>
				<script src="../style/js/jquery.min.js"></script>
				<script src="../style/js/bootstrap.min.js"></script>
				<script src="../style/js/jscript.js"></script>
			</body>
		</html>
<?php
	mysqli_close($connect);
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:../auth/log.php");
		exit;
	}
?>