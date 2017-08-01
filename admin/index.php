<?php
	session_start();
	require_once('../lib/sql/conn.php');
	require_once('../lib/phpass-0.5/PasswordHash.php');
	$conn = connect();
	$hasher = new PasswordHash(8,false);
	if(isset($_POST['login']))
	{
		$username = htmlentities($_POST['username'],ENT_QUOTES,'UTF-8');
		$password = htmlentities($_POST['password'],ENT_QUOTES,'UTF-8');
		$query = "SELECT * FROM admin_info WHERE email = ?";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(1,$username);
		if(!($stmt->execute())) die("<script>alert('Internal error!');</script>");
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$name = ucwords($result['fname'].' '.$result['mname'].' '.$result['lname']);
		$fetched_password = $result['password'];
		if($hasher->CheckPassword($password,$fetched_password))
		{
			$_SESSION['admin_username'] = $username;
			$_SESSION['admin_name'] = $name;
			printf("<script>window.location.href='./admin_dashboard.php';</script>");
		}
		else
		{
			printf("<script>alert('Incorrect Username or Password!');</script>");
		}
	}
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../lib/css/style.css" rel="stylesheet">
</head>

<body>

	<div class="container-fluid">
	
		<!--HEADER-->
		<div align="center" class="row header">
			<img class="img-responsive" src="../lib/image/logo.png"/>
		</div>
		
		<!--BODY-->	
		<div class="container-fluid">
			
			<div class="ht col-md-10 col-md-offset-1 midpad">

				<div align="center" class="col-md-4">
					<img class="img-responsive" src="../lib/image/ggit.jpg"/>
				</div>
				
				<div class="col-md-4 col-md-offset-2">
					
					<div class="row">
						<h2 class="text-center">ADMIN LOGIN</h2>
					</div>
							 		
					<div class="row mtop">		
						<form class="form-horizontal" action="" method='POST'>
										
							<div class="form-group">
								<label for="inputEmail" class="col-md-3">Username</label>
								<div class="col-md-9">
									<input type="text" name="username" class="col-md-3 form-control" placeholder="Email"/>
								</div>
							</div>
			  
							<div class="form-group">
								<label for="inputPassword" class="control-label col-md-3">Password</label>
								<div class="col-md-9">
									<input type="password" name="password" class="form-control" placeholder="Password"/>
								</div>
							</div>
				
							<br/>
							
							<div align="center">
								<button type="submit" name="login" class="btn btn-success">Submit</button>
							</div>
										
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