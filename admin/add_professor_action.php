 <?php
 session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
    require_once '../lib/sql/conn.php';
    $conn = connect();
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Result Analysis System</title>
	<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../lib/css/style.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    </div>
	
	<div align="center" class="col-sm-3">
	<img class="img-circle img-responsive" width="50%" src="../lib/image/logo.jpg"/>
	</div>
	 <div class="col-sm-9" align="center">
		<h2 style="color: #fff;">GYAN GANGA INTERNATIONAL SCHOOL</h2>
		<h3 style="color: #fff;">RESULT ANALYSIS SYSTEM</h3>
	 </div>
    <div class="collapse navbar-collapse" id="defaultNavbar1">    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./admin_dashboard.php">Dashboard</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div style="min-height: 350px;" class="container-fluid">
  <div class="row headmargin">		
		<?php
		
			if(isset($_POST['add']))
			{
				$fname = $_POST['fname'];
				$mname = $_POST['mname'];
				$lname = $_POST['lname'];
				$gender = $_POST['gender'];
				$email = $_POST['email'];
				$cnumber = $_POST['cnumber'];
				$dept = $_POST['dept'];
				
				$query0 = "INSERT INTO  professor_info (fname,mname,lname,gender,email,password,contact,department) VALUES(?,?, ?,?, ?,'123qwe,./', ?,?)";
				$sql0 = $conn->prepare($query0);
				$sql0->bindParam(1,$fname);
				$sql0->bindParam(2,$mname);
				$sql0->bindParam(3,$lname);
				$sql0->bindParam(4,$gender);
				$sql0->bindParam(5,$email);
				$sql0->bindParam(6,$cnumber);
				$sql0->bindParam(7,$dept);
								
				if(!($sql0->execute())) 	
				die("ERROR");

				  printf("<div style='font-size:20px' class='alert alert-success text-center'> <strong>Upload Successful!<strong><br/> Data has been successfully uploaded to the database.</div>");	

      }
			
		?>
    </div>
  </div>
  <hr>
  <div class="row">
 <div class="footer" align="center">
<br/>
      <p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p>
    </div>
  </div>
  <hr>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../lib/js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../lib/js/bootstrap.js"></script>
</body>
</html>
