<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM user";

		//take data from database
		$data = mysqli_query($conect, $sqlquery);
		$data1 = mysqli_query($conect, $sqlquery);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> All user information page </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css" />
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
						<a class="navbar-brand" href="./adminprofile.php"> Aminship / Admin </a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li> <a href="./adminprofile.php"> Dashboard </a> </li>
								<li class="active" onclick="return apermit()"> <a href="./users.php"> View users </a> </li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li onclick="return permit()">
									<a href="http://localhost/Aminship/admin/logout.php">Log out</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="container">
					<?php
						$row1=mysqli_fetch_assoc($data1);
						if(isset($row1) && $row1 != null){
					?>
							<div class="jumbotron">
								<table class="table table-bordered">
									<caption> <h4 class="text-center"> All registered user </h4> </caption>
									<thead>
										<tr>
											<th class="col-md-2"> User ID </th>
											<th> Name </th>
											<th class="col-md-2"> Number </th>
											<th class="col-md-2"> No of meserment </th>
											<th class="col-md-2"> View profile </th>
										</tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_assoc($data)){
										echo "<tr>
												<td> $row[ID] </td>
												<td> $row[name] </td>
												<td> $row[phone] </td>
												<td> $row[measure] </td>
												<td>
													<a href='userview.php?key=$row[ID]'> <span class='glyphicon glyphicon-user'></span> Profile </a>
												</td>
											</tr>";
										}
										?>
									</tbody>
								</table>
							</div>
					<?php
						}
						else{
							echo "<div class='jumbotron'> <h4> You don't have any user yet! </h4> <br/>  </div>";
							$sql = "UPDATE admin SET users = '000' WHERE admin.ID = '$_SESSION[id]'";
							mysqli_query($conect, $sql);
							
						}
					?>
				</div>
				<div id="content_footer"></div>
				<script src="http://localhost/Aminship/style/js/jquery.min.js"></script>
				<script src="http://localhost/Aminship/style/js/bootstrap.min.js"></script>
				<script src="http://localhost/Aminship/style/js/jscript.js"></script>
			</body>
		</html>
<?php
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/aminship/admin/");
		exit;
	}
?>