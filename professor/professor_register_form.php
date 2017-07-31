<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Inhouse User</title>

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
					<h2>REGISTER PROFESSOR</h2>
				</div>  		
				<br/>
   			
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
							<h4>Contact Number</h4>
							<input class="form-control" name="cnumber" type="text" pattern="[7-9][0-9]{9}$" minlength="10" maxlength="10" required/>
						</div>
					 
					 	<div class="form-group">
							<h4>Email Id</h4>
							<input class="form-control" name="email" type="email" required/>
						</div>
					 
						<div class="form-group">
							<h4>Department</h4>
							<select name="dept" class="form-control" id="sel1" >
								 <option value="ce">CE</option>
                       						<option value="cs">CSE</option>
							       <option value="ec">EC</option>
							       <option value="ee">EE</option>
							       <option value="ex">EX</option>
							       <option value="it">IT</option>
							       <option value="me">ME</option>
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
    
   <div class='footer text-center'>
	 <br/>
      <p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p>
    </div>
    

	<script src="../lib/js/jquery.min.js"></script>  
	<script src="../lib/js/bootstrap.js"></script>
	
</body>

</html>
