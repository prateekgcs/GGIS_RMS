<?php
	//session_start();
	//require_once("lib/sql/conn.php");
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GGIS-RMS</title>
	<link href="lib/css/bootstrap.css" rel="stylesheet">
	<link href="lib/css/style.css" rel="stylesheet">
	
	<style>
		#cards:hover 
		{ 
			background-color: #04202C;
		}
		
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
				<img class="img-responsive" src="lib/image/logo.png"/>
			</div>
		</div>
		
		<!--BODY-->	
		<div class="container-fluid">
			<div class="ht col-md-10 col-md-offset-1">
				
				<div class="headmargin" align="center">
					<h2>WELCOME TO <br/><br/> RESULT MANAGEMENT SYSTEM</h2>
				</div>
				<br/>
				<div class="row">
				
					<div class="col-md-4 col-md-offset-2 headmargin">
						<div align="center" class="card">
							<a href="admin/index.php">
							<div class="card cards padd" id="cards">
								<img class="card-img-top" width="20%" src="lib/image/user.png">
									<h3 class="card-title">ADMINISTRATOR LOGIN</h3>
								</div>
							</a>
						</div>				
					</div>
					
					<div class="col-md-4 headmargin">
						<div align="center" class="card">
							<a href="professor/index.php">
							<div class=" card cards padd" id="cards">
								<img class="card-img-top" width="20%" src="lib/image/user.png">
									<h3 class="card-title">PROFESSOR LOGIN</h3>
								</div>
							</a>
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
	
	<script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.js"></script>
		
</body>

</html>

<?php
	/*
	if(isset($_POST['submits']))
	{
		$username=strtolower($_POST['email']);
		$password=$_POST['password'];
		$type=$_POST['type'];
		
		$conn=connect();
		$un = "";
		if($type=="Professor")
			{
				$table="professor_info";
				$un="email";
			}
			elseif($type=="Student")
			{
				$table = substr($username, 0, 9);
				$table.="_info";
				$un="enrollment_no";
			}
		
		$query="SELECT fname, mname, lname FROM $table WHERE $un=? AND password=?";
		$sql=$conn->prepare($query);
		$sql->bindParam(1,$username);
		$sql->bindParam(2,$password);
		
		if(!($sql->execute()))
		{
			die();
		}
		
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$fname = $row['fname'];
		$mname = $row['mname'];
		$lname = $row['lname'];
		
		$count = $sql->rowCount();
		
		if($count>=1)
        {   
            if($type=="Professor")
			{
				$_SESSION['name'] = $fname.' '.$mname.' '.$lname;
				$_SESSION['username'] = $username;
				header('location: professor/professor_dashboard.php');
			}
			elseif($type=="Student")
			{
				$_SESSION['name'] = $fname.' '.$mname.' '.$lname;
				$_SESSION['username'] = $username;
				header('location: student/student_dashboard.php');
			}
		}
        else
        {
			printf("<script> alert('Incorrect Authentication!') </script>");
		}
	}*/
?>