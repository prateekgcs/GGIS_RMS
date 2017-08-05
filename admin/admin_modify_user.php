<?php
	require_once('./admin_session_check.php');
	require_once('../lib/sql/conn.php');
	$conn = connect();	
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Modify User</title>
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
							<h2>MODIFY PROFESSOR</h2>
						</div>

					<form action="" method="POST">
					<br/>
						<h4>Enter Email</h4>
						<input class="form-control" type="email" name="email">
						<br/>
						<div class="form-group">
							   <h4>Category</h4>
							   <select name="category" class="form-control">
							   <option value="fname">First Name</option>
							   <option value="mname">Middle Name</option>
							   <option value="lname">Last Name</option>
							   <option value="gender">Gender</option>
							   <option value="email">Email</option>
							   <option value="contact">Contact</option>
							    <option value="email">Class</option>
							   <option value="section">Section</option>
							   </select>
							 </div>
						<br/>
						<button type="submit" name="view" class="btn btn-success btn-block">Search</button>
					</form>
					
				</div>
				<div>
					<?php
						if(isset($_POST['view']))
						{
							$email = $_POST['email'];
							$category = $_POST['category'];
							$query = "SELECT $category FROM professor_info WHERE email = ?";
							$stmt = $conn->prepare($query);
							$stmt->bindParam(1,$email);
							if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
							$result = $stmt->fetch(PDO::FETCH_ASSOC);
							$value = ucwords($result["$category"]);
							printf("<form action='' method='POST'>
							<input type='text' name='value' value='$value'/>
							<input type='hidden' name='email' value='$email'>
							<input type='hidden' name='category' value='$category'>
							<input type='submit' name='update' value='Update'/>
							</form>");
						}
						if(isset($_POST['update']))
						{
							$email = $_POST['email'];
							$value = $_POST['value'];
							$category = $_POST['category'];
							$query = "UPDATE professor_info SET $category = ? WHERE email = ?";
							$stmt = $conn->prepare($query);
							$stmt->bindParam(1,$value);
							$stmt->bindParam(2,$email);
							if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
							printf("<script>
										alert('User Updated!');
										window.location.href='./admin_manage_user.php';
									</script>");
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
					
					/*if(isset($_POST['view']))
					{
						$email=$_POST['eid'];
						
						$query="SELECT * FROM professor_info WHERE email=?";
						$sql=$conn->prepare($query);
						$sql->bindParam(1,$email);
						
						if(!($row=$sql->execute()))
						{
							die("ERROR!");
						}
						
						$row = $sql->fetch(PDO::FETCH_ASSOC);
						
						$name = $row['fname']." ".$row['mname']." ".$row['lname'];
						$gender = $row['gender'];
						$contact = $row['contact'];
						$dept = $row['department'];
						
						
						$table = "<div align='center'><h3>USER DETAILS</h3></div>
								  <table class='table table-striped table-bordered'>
								  <tr><td><b>Name</b></td><td>$name</td></tr>
								  <tr><td><b>Gender</b></td><td>$gender</td></tr>
								  <tr><td><b>Email</b></td><td>$email</td></tr>
								  <tr><td><b>Department</b></td><td>$dept</td></tr>
								  <tr><td><b>Contact</b></td><td>$contact</td></tr>
								  <tr><td colspan=2><a href='admin_delete_professor.php?email=$email'><button class='btn btn-danger' name='delete'>Delete</button></a></td></tr>
								  </table>";
						
						echo $table;
						
					}
					
					if(isset($_GET['email']))
					{
						$email=$_GET['email'];
						
						$query="DELETE FROM professor_info WHERE email=?";
						$sql=$conn->prepare($query);
						$sql->bindParam(1,$email);
						
						if(!($row=$sql->execute()))
						{
							die("ERROR!");
						}
						
						printf("<div style='font-size:20px' class='alert alert-success text-center'> <strong>Delete Successful!<strong><br/> Data has been successfully removed from the database.</div>");
						
					}*/
				?>