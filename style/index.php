<!DOCTYPE html>
<html>
	<script>
		alert("You don't have permission to access this folder!");
	</script>
	<?php
		session_start();
		if(isset($_SESSION['id'])){
			header("location:http://localhost/Aminship/auth");
			exit;
		}
		if(isset($_SESSION['aid'])){
			header("location:http://localhost/Aminship/admin");
			exit;
		}
		else{
			header("location:http://localhost/Aminship");
			exit;
		}
	?>
</html>