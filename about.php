<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> Aminship (working with your land) </title>
		<link rel="stylesheet" type="text/css" href="./style/css/bootstrap.min.css">
		<style>
			body {padding-top:60px;background-color:darkseagreen;}
		</style>
	</head>
	<body>
		<?php include 'header.php'; ?>
		<div class="container-fluid" role="main">
			<!--websiteinfo-->
			<div class="jumbotron" style="margin-bottom:05px;">
				<p> <strong> Welcome! </strong> We are here to help you calculating your land area and distribute your land as you want.
				</p>
			</div>
			<!--measurement info-->
			<div class="well" style="margin-bottom:05px;">
				<blockquote class="bg-warning">
					<p>
					Before starting the masurement we want to clear one thing, we will help you to calculate the area or find out a porsion of a land depanding on your input. We can not help you to mesure the size of a side in your land, it will be done by you.
					</p>
					<footer> From Aminship </footer>
				</blockquote>
				<p class="text-justify" >
					When it come about land there is no actual size of it. Land could have many axis and those could be straight or curved. For the betterment of mesurement and error less area calculation we need to divide land into some geometric sheap. Land shape could be Triangle, Rectengle or Ellipes. It is not being a problem when you divide your land. Just calculate every divided shape individualy and sum them lastly for final result. We will help you to calculate the individual shape of land. Here is the process,
				</p>
			</div>
			<div class="bg-info">
				<ul class="list-group">
					<li class="list-group-item">
						<h4 class="list-group-item-heading">
							Triangle shape land measurement process
						</h4>
						<p class="list-group-item-text text-justify">
							Simply take the lenght of the sides of your land and put it on the triangle shape area calculator page. When you take the length you must be consious about the perfect value and put feet and inch separately into the respective input box.
						</p>
					</li>
					<li class="list-group-item">
						<h4 class="list-group-item-heading">
							Rectengle shape land measurement process
						</h4>
						<p class="list-group-item-text text-justify">
							Simply take the lenght of the sides of your land and put it on the rectengle shape area calculator page. When you take the length you must be consious about the perfect value and put feet and inch separately into the respective input box.
						</p>
					</li>
					<li class="list-group-item">
						<h4 class="list-group-item-heading">
							Circle or ellipes shape land measurement process
						</h4>
						<p class="list-group-item-text text-justify">
							Simply take the lenght of the long radious and short radious of your land then put it on the circle shape area calculator page. When you take the length you must be consious about the perfect value and put feet and inch separately into the respective input box.
						</p>
					</li>
				</ul>
			</div>
		</div>
		<div class="footer"></div>
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
		
		$connect = mysqli_connect("localhost", "root", "", "aminship");
		$sql = "INSERT INTO visitors (time, ip) VALUES ('$time', '$ip')";
		
		mysqli_query($connect, $sql);
	}
?>