<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		$table = "user"."$_SESSION[id]";

		//sql query to find user information from database
		//$sql = "SELECT * FROM user WHERE ID = '$_SESSION[id]'";
		$sqlquery = "SELECT * FROM $table";

		//take data from database
		//$data = mysqli_query($conect, $sql);
		$data = mysqli_query($conect, $sqlquery);
		$data1 = mysqli_query($conect, $sqlquery);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> All saved meserment information page </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css" />
				<style>
					body {padding-top:60px;background-color:darkseagreen;}
				</style>
			</head>
			<body>
				<?php include 'header.php'; ?>
				<div class="container-fluid">
					<?php
						$row1=mysqli_fetch_assoc($data1);
						//if($row['measure'] != '000'){
							if(isset($row1) && $row1 != null){
					?>
							<div class="jumbotron">
								<table class="table table-bordered">
									<caption style="text-align:center;"> <h4> All saved meserment </h4> </caption>
									<thead>
										<tr>
											<th> NO </th>
											<th> 1st side </th>
											<th> 2nd side </th>
											<th> 3rd side </th>
											<th> 4th side </th>
											<th> Area of land </th>
											<th class="col-md-2"> Download </th>
											<th class="col-md-2"> Delete </th>
										</tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_assoc($data)){
										echo "<tr>
												<td> $row[UID] </td>
												<td> $row[first] </td>
												<td> $row[second] </td>
												<td> $row[third] </td>
												<td> $row[fourth] </td>
												<td> $row[size] </td>
												<td>
													<a href='pdf.php?key=$row[UID]'><span class='glyphicon glyphicon-download-alt'></span> Download as pdf </a>
												</td>
												<td>
													<a href='delete.php?key=$row[UID]' onclick='return permit3()'>
														<span class='glyphicon glyphicon-trash'></span> Delete measurement
													</a>
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
							echo "<div class='jumbotron'> <h4> You don't save any meserment yet! </h4> <br/> <br/> <h5> Save meserment for visit those. </h5> </div>";
							$sql = "UPDATE user SET measure = '000' WHERE user.ID = '$_SESSION[id]'";
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
		header("location:http://localhost/aminship/auth/log.php");
		exit;
	}
?>