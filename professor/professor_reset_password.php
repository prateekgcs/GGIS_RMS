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
	<img class="img-circle img-responsive" width="50%" src="lib/image/logo.jpg"/>
	</div>
	 <div class="col-sm-9" align="center">
		<h2 style="color: #fff;">GYAN GANGA INTERNATIONAL SCHOOL</h2>
		<h3 style="color: #fff;">RESULT ANALYSIS SYSTEM</h3>
	 </div>
    <div class="collapse navbar-collapse" id="defaultNavbar1">    
      <ul class="nav navbar-nav navbar-right">
      <li><a href="./professor_dashboard.php">Dashboard</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">   		
   	
   			<div class="col-md-offset-3 col-md-6 jumbotron" align="center">
   				<div class="row">
   					<h2 class="text-center">RESET PASSWORD</h2>
				</div>
 				
  				<div class="container-fluid">  		
   					<div class="row mtop">
						<form class="form-horizontal" action='' method='post'>
  							<div class="form-group">
    							<label for="currentPassword" class="col-sm-4 control-label">Current Password</label>
    							<div class="col-sm-6">
      								<input type="password" required name='currentPassword' class="form-control" id="currentPassword">
    							</div>
  							</div>
  
   							<div class="form-group">
    							<label for="newPassword" class="col-sm-4 control-label">New Password</label>
    							<div class="col-sm-6">
      								<input type="password" required name='newPassword' class="form-control" id="newPassword">
    							</div>
  							</div>
							
							<div class="form-group">
    							<label for="confirmPassword" class="col-sm-4 control-label">Confirm Password</label>
    							<div class="col-sm-6">
      								<input type="password" required name='confirmPassword' class="form-control" id="confirmPassword">
    							</div>
  							</div>
							<br/>
   							<div class="form-group">
    							<div class="col-md-offset-3 col-sm-6" align="center">
      								<button type="submit" name='submits' class="btn btn-default login-btn">Reset</button>
    							</div>
  							</div>
		
						</form>
						<?php
							if(isset($_POST['submits']))
							{
									$currentPassword = $_POST['currentPassword'];
									$newPassword = $_POST['newPassword'];
									$confirmPassword = $_POST['confirmPassword'];
									
									if($newPassword!=$confirmPassword)
									{
										die("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-info text-center'> <strong>Passwords do not match!<strong></div> </div></div></div></div></div></div><hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
									}
									
									$email = $_SESSION['username'];
									$query = "SELECT * FROM `professor_info` WHERE email =? AND password = ?";
									$sql = $conn->prepare($query);
									$sql->bindParam(1,$email);
									$sql->bindParam(2,$currentPassword);
									if(!($sql->execute())) die("Error 1!");
									$count = $sql->rowCount();
									if($count == 0)
									{
										die("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-info text-center'> <strong>Incorrect Password!<strong></div> </div></div></div></div></div></div><hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
									}
									$query = "UPDATE `professor_info` SET password = ? WHERE email = ?";
									$sql = $conn->prepare($query);
									$sql->bindParam(1,$confirmPassword);
									$sql->bindParam(2,$email);
									if(!($sql->execute())) die("Error 2!");
									printf("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-success text-center'> <strong>Password Successfully Changed!<strong></div> </div> ");
							}
						?>
					</div>
				</div>
			</div>
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
