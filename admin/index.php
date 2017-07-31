
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
									<input type="text" name="email" class="col-md-3 form-control" placeholder="Email"/>
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
								<button type="submit" name="submits" class="btn btn-success">Submit</button>
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

<?php

	if(isset($_POST['submits']))
		header("location: ./admin_dashboard.php");
	/*{
		$username=$_POST['email'];
		$password=$_POST['password'];
		
		$conn=connect();
		$table = "admin_login";
		
		$query="SELECT fname, mname, lname FROM `$table` WHERE username=? AND password=?";
		$sql=$conn->prepare($query);
		$sql->bindParam(1,$username);
		$sql->bindParam(2,$password);
		
		if(!($sql->execute()))
		{
			die();
		}
		
		$count = $sql->rowCount();
		
		if($count==1)
        {   
	
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			$fname = $row['fname'];
			$mname = $row['mname'];
			$lname = $row['lname'];
			
			$_SESSION['name'] = $fname.' '.$mname.' '.$lname;
			$_SESSION['username'] = $username;
            header("location: ./admin_dashboard.php");
		}
        else
        {
			printf("<script> alert('Incorrect Authentication!') </script>");
		}
	}
	*/
?>