 <?php
	require_once('./admin_session_check.php');
	require_once('../lib/sql/conn.php');
	require_once('../lib/phpass-0.5/PasswordHash.php');
	$conn = connect();
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
					<h3>Welcome</br><?php printf($_SESSION['admin_name']); ?></h3>
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
					<?php
						$hasher = new PasswordHash(8, false);
						if(isset($_POST['reset']))
						{
							$email = $_SESSION['admin_username'];
							$current_password = htmlentities($_POST['cpass'], ENT_QUOTES, 'UTF-8');
							$new_password = htmlentities($_POST['npass'], ENT_QUOTES, 'UTF-8');
							$confirm_password = htmlentities($_POST['cnpass'], ENT_QUOTES, 'UTF-8');
							
							if($new_password != $confirm_password)
								die("<script>alert('Password did not match!');</script>");
							
							$query = "SELECT * FROM admin_info where email = ?";
							
							$stmt = $conn->prepare($query);
							$stmt->bindParam(1, $email);
							if(!$stmt->execute()) die("<script>alert('Internal error!');</script>");
							
							$result = $stmt->fetch(PDO::FETCH_ASSOC);
							
							$fetched_password = $result['password'];
							
							if(!$hasher->CheckPassword($current_password,$fetched_password)) die("<script>alert('Incorrect Password!');</script>");
							
							$query = "UPDATE admin_info SET password = ? WHERE email = ?";
							
							$stmt = $conn->prepare($query);
							$stmt->bindParam(1, $hasher->HashPassword($new_password));
							$stmt->bindParam(2, $email);
							
							if(!$stmt->execute()) die("<script>alert('Can't update password!');</script>");
							
							printf("<script>alert('Password updated!'); window.location.href='./admin_dashboard.php';</script>");
							
						}
					?>
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