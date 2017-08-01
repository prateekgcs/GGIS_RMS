 <?php
 /*session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
    require_once '../lib/sql/conn.php';
    $conn = connect();*/
 ?>

 <!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Password</title>
	<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../lib/css/style.css" rel="stylesheet">
	
	<style>
				
		a:hover
		{
			text-decoration: none;
		}
	
	</style>
	
</head>

<body>

	<div class="container-fluid">
	
		<!--HEADER-->
		<div class="row header">
			<div align="center">
				<img class="img-responsive" src="../lib/image/logo.png"/>
			</div>
		</div>
		
		<!--BODY-->	
		<div class="container-fluid">
			<div class="ht col-md-10 col-md-offset-1">
				
				<div align="center" class="col-md-3 subhead sidebar">
					<h3>Welcome, Prateek</h3>
					<?php echo "Date: ".date("d-m-Y")."<br/>";
					echo "Time: ".date("h:i:sa");
					?>
					<hr/>
					<br/>
					<a href="./admin_dashboard.php"><button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/home.png"/><br/>Home</button></a><br/>
					<button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-7 col-md-offset-1">
					<div class="container-fluid subhead">  	
				
						<div align='center'>
							<h3>RESET PASSWORD</h3>
						</div>
						<br/>
					<form action="" method="POST">
					
						<div class="form-group">
							<label>Current Password</label>
							<input class="form-control" type="password" name="cpass">
						</div>
						
						<div class="form-group">
							<label>New Password</label>
							<input class="form-control" type="password" name="npass">
						</div>
						
						<div class="form-group">
							<label>Confirm New Password</label>
							<input class="form-control" type="password" name="cnpass">
						</div>
						<br/>
						
						<button type="submit" name="reset" class="btn btn-success btn-block">Reset</button>
					</form>
					
				</div>
			</div>	
			</div>
		</div>
		
		<!--FOOTER-->
		<div class="footer" align="center">
			<br/>
			<p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p>
		</div>
	
	<script src="../lib/js/jquery.min.js"></script>
	<script src="../lib/js/bootstrap.js"></script>
		
</body>

</html>

<?php
					
					
?>