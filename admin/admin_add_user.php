<?php
/*
	session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
	*/
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
				
				<div align="center" class="col-md-3 subhead sidebarlong">
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
							<h2>ADD PROFESSOR</h2>
						</div>
					   			
				<form action="./add_professor_action.php" method="POST">
						
						<div class="form-group">
							<h4>First Name</h4>
							<input class="form-control" pattern="[A-Za-z]+$" name="fname" type="text" required/>
						</div>
						
						<div class="form-group">
							<h4>Middle Name</h4>
							<input class="form-control" pattern="[A-Za-z]+$" name="mname" type="text"/>
						</div>
						
						<div class="form-group">
							<h4>Last Name</h4>
							<input class="form-control" name="lname" pattern="[A-Za-z]+$" type="text" required/>
						</div>
											 
						<div class="form-group">
							<h4>Gender</h4>
							<select class="form-control" name="gender" id="sel2" >
								 <option value="Male">Male</option>
								 <option value="Female">Female</option>
							 </select>
						</div>
						
						<div class="form-group">
							<h4>Email Id</h4>
							<input class="form-control" name="email" type="text" required/>
						</div>
						
						<div class="form-group">
							<h4>Contact Number</h4>
							<input class="form-control" name="cnumber" type="text" pattern="[7-9][0-9]{9}$" minlength="10" maxlength="10" required/>
						</div>
						
						<div class="form-group">
							<h4>Class</h4>
							 <select name="class" class="form-control" id="class">
							   <option value="1">1</option>
							   <option value="2">2</option>
							   <option value="3">3</option>
							   <option value="4">4</option>
							   <option value="5">5</option>
							   <option value="6">6</option>
							   <option value="7">7</option>
							   <option value="8">8</option>
							   <option value="9">9</option>
							   <option value="10">10</option>
							   <option value="11S">11 (SCIENCE)</option>
							   <option value="11C">11 (COMMERCE)</option>
							   <option value="12S">12 (SCIENCE)</option>
							   <option value="12C">12 (COMMERCE)</option>
							   </select>
						</div>
						
						<div class="form-group">
							<h4>Section</h4>
							<select class="form-control" name="section" id="section" >
								 <option value="A">A</option>
								 <option value="B">B</option>
								 <option value="C">C</option>
							 </select>
						</div>
                     
			<br/>
			<div align="center">
				<button type="submit" name="add" class="btn btn-default">Register</button>
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

		

