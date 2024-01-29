<?php
	session_start();
	if(isset($_SESSION['aid'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","aminship");

		$table = "user"."$_GET[id]";

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM $table";

		//take data from database
		$data1 = mysqli_query($conect, $sqlquery);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> All saved meserment information page </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap.min.css" />
				<link rel="stylesheet" type="text/css" href="http://localhost/Aminship/style/css/bootstrap-theme.min.css" />
				<style>
					body {padding-top:60px;background-color:darkseagreen;}
					.center {display:grid;justify-content:center;}
					.pagination>.active>a {background-color:darkseagreen;}
				</style>
			</head>
			<body>
				<?php include 'header.php'; ?>
				<div class="container">
					<ul class="breadcrumb" style="margin-bottom:10px;">
						<li> <a href='<?php echo "./userview.php?key=$_GET[id]";?>'> User profile </a> </li>
						<li class="active"> Saved meserment </li>
					</ul>
					<?php
						$row1=mysqli_fetch_assoc($data1);
						if(isset($row1) && $row1 != null){
							$items_per_page = 10;
							$total_items_query = "SELECT COUNT(*) as total FROM $table";
							$total_items_result = mysqli_query($conect, $total_items_query);
							$total_items = mysqli_fetch_assoc($total_items_result);
							$total_pages = ceil($total_items['total'] / $items_per_page);
							
							$page = isset($_GET['page']) ? $_GET['page'] : 1;
							$page = max(1, min($total_pages, $page));
							$offset = ($page - 1) * $items_per_page;

							$query = "SELECT * FROM $table LIMIT $offset, $items_per_page";
							$data = mysqli_query($conect, $query);

					?>
							<div class="well" style="margin-bottom:0px;">
								<table class="table table-bordered">
									<caption style="text-align:center;padding-top0px;"> <h4> All saved meserment </h4> </caption>
									<thead>
										<tr>
											<th> NO </th>
											<th> 1st side (feet) </th>
											<th> 2nd side (feet) </th>
											<th> 3rd side (feet) </th>
											<th> 4th side (feet) </th>
											<th> Area of land (cent) </th>
											<th class="col-md-2 text-center"> Download </th>
											<th class="col-md-2 text-center"> Delete </th>
										</tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_assoc($data)){
										echo "<tr>";
											echo "<td>" . $row['UID'] . "</td>";
											echo "<td>" . $row['first'] . "</td>";
											echo "<td>" . $row['second'] . "</td>";
											echo "<td>" . $row['third'] . "</td>";
											echo "<td>" . $row['fourth'] . "</td>";
											echo "<td>" . round($row['size'] / 435.6, 3) . "</td>";
											echo "<td class='text-center'>
												<a href='pdf.php?key=$row[UID]&id=$_GET[id]'>
													<span class='glyphicon glyphicon-download-alt'></span> Download as pdf
												</a>
											</td>
											<td class='text-center'>
												<a href='delete.php?key=$row[UID]&id=$_GET[id]' onclick='return permit3()'>
													<span class='glyphicon glyphicon-trash'></span> Delete measurement
												</a>
											</td>
										</tr>";
										}
										?>
									</tbody>
								</table>
					<?php
							if ($total_pages > 1) {
								echo '<div class="center"><ul class="pagination">';
								for ($i = 1; $i <= $total_pages; $i++) {
									echo "<li";
									if ($i == $page) {
										echo " class='active'";
									}
									echo '><a href="?id=' . $_GET['id'] . '&page=' . $i . '">' . $i . '</a></li>';
								}
								echo "</ul></div>";
							}
							echo "</div>";
						}
						else{
							echo "<div class='jumbotron'> <h4 class='text-center'> User don't save any meserment yet! </h4> <br/> </div>";
							$sql = "UPDATE user SET measure = '000' WHERE user.ID = '$_GET[id]'";
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
	mysqli_close($conect);
	}
	else{
		$_SESSION['error'] = 'Request failed';
		header("location:http://localhost/aminship/admin/");
		exit;
	}
?>