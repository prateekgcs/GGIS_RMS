<?php
	require_once('./admin_session_check.php');
	require_once('../lib/sql/conn.php');
	$conn = connect();
?> 
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
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
					<button onclick="location.href='./admin_reset_password.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button onclick="location.href='../lib/signout.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-7 col-md-offset-1">
					<div class="container-fluid subhead">  	
				
						<div align='center'>
							<h2>REMOVE PROFESSOR</h2>
						</div>

					<form action="" method="POST">
					<br/>
						<h4>Enter Email</h4>
						<input class="form-control" type="email" name="email">
						<br/>
						<br/>
						<button type="submit" name="view" class="btn btn-success btn-block">Search</button>
					</form>
					
					<div>
						<?php
							if(isset($_POST['view']))
							{
								$email = $_POST['email'];
								$query = "SELECT * FROM  professor_info where email = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$email);
								if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
								$result = $stmt->fetch(PDO::FETCH_ASSOC);
								$name = ucwords($result['fname'].$result['mname'].$result['lname']);
								$class = ucwords($result['class'].$result['section']);
								printf("Name: $name</br> Class:  $class");
								printf("
									</br><button onclick=\" confirmBox(); \" class='btn btn-danger btn-block'>Delete</button>
									<script>
										function confirmBox()
										{
											var r = confirm(\"Are you 🐷?\");
											if (r == true) {
												window.location.href='./admin_delete_professor.php?delete=1&email=$email';
											} else {
												window.location.href='./admin_delete_professor.php';
											}
										}
									</script>");
							}

							if(isset($_GET['delete'])&&isset($_GET['email']))
							{
								$email = $_GET['email'];
								$query = "DELETE FROM professor_info WHERE email = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$email);
								if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
								printf("
										<script>
											alert('Account Deleted');
											window.location.href='./admin_manage_user.php';
										</script>
									");
							}
						?>
					</div>
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