<?php
session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>student register</title>

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
    
    <div class="container-fluid ht">
    	<div class="well-lg">
    	
			<div class="col-md-8 col-md-offset-2 jumbotron">
				<div align='center'>
					<h2>STUDENT REGISTER</h2>
				</div>  		
				<br/>
   			
				<form action="./add_student_action.php" method="POST">
						
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
							<input class="form-control" pattern="[A-Za-z]+$" name="lname" type="text" required/>
						</div>
						
						<div class="form-group">
							<h4>Gender</h4>
							<select class="form-control" name="gender" id="sel2" >
								 <option value="Male">Male</option>
								 <option value="Female">Female</option>
							 </select>
						</div>
						
						<div class="form-group">
							<h4>Category</h4>
							<select class="form-control" name="category" id="sel2" >
								 <option value="General">General</option>
								 <option value="O.B.C.">O.B.C.</option>
								 <option value="S.C.">S.C.</option>
								 <option value="S.T.">S.T.</option>
							 </select>
						</div>
						
						<div class="form-group">
							<h4>Enrollment Number</h4>
							<input class="form-control" minlength="12" maxlength="12" pattern="[a-zA-Z0-9]+$"  name="eno" type="text" required/>
						</div>
						
						<div class="form-group">
							<h4>Batch</h4>
							<select name="batch" class="form-control" id="sel2">
								 <option value="151">2015-19</option>
								 <option value="161">2016-20</option>
								 <option value="171">2017-21</option>
								 <option value="181">2018-22</option>
							 </select>
						</div>
						
						<div class="form-group">
							<h4>Branch</h4>
							<select name="branch" class="form-control" id="sel1" >
								                        <option value="CE">CE</option>
                       <option value="CS">CSE</option>
		       <option value="EC">EC</option>
		       <option value="EE">EE</option>
		       <option value="EX">EX</option>
		       <option value="IT">IT</option>
		       <option value="ME">ME</option>
							 </select>
						</div>
						
						<div class="form-group">
							<h4>Section</h4>
							<select name="section" class="form-control" id="sel2" >
								 <option value="1">1</option>
								 <option value="2">2</option>
								 <option value="3">3</option>
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
						
					 
						
			<br/>
			<div align="center">
				<button type="submit" name="add" class="btn btn-default">Register</button>
			</div>
		</form>
		
	</div>
				
  </div>    
</div>
    
   <div class='footer text-center'>
	 <br/>
      <p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p>
    </div>
    

	<script src="../lib/js/jquery.min.js"></script>  
	<script src="../lib/js/bootstrap.js"></script>
	
</body>

</html>
