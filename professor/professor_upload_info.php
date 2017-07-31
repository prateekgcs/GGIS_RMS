 <?php
 session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
    require_once '../lib/ExcelToDB.php';
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
      		
			<div class="col-md-6 col-md-offset-3">
  				<div class="container-fluid jumbotron">  	
				
					<div align='center'>
					<h2>UPLOAD STUDENT INFORMATION</h2>
					</div>
				<form action="./professor_upload_info_action.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					<br/>
                    <h4>Batch Year</h4>
                    <select name="year" class="form-control" id="sel1">
                                         <option value="131">2013-2017</option>
                     <option value="141">2014-2019</option>

                     <option value="151">2015-2019</option>
                     <option value="161">2016-2020</option>
                     <option value="171">2017-2021</option>
                     <option value="181">2018-2022</option>
                     </select>
                     </div>
				 				 
					
					 <div class="form-group">
                       <h4>Branch</h4>
                       <select name="branch" class="form-control" id="sel2">
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
					  <h4>Upload File</h4>
					  <input type="file" name="file" required class='form-control'>
					  </div>
					 <br/>
					 <div align="center">
						<button name="upload" type="submit" class="btn btn-default">Upload</button>
						</div>
					</form>
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
