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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Result Analysis System</title>
	<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../lib/css/style.css" rel="stylesheet">

	<style>
	td
	{
		text-align: center;
	}
	</style>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
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
  </div>

</nav>
<div class="container-fluid">
  <div class="row">
     				
  				<div class="container-fluid">  		
				
				<div class="col-md-6 col-md-offset-3 jumbotron" align="center">
				
				<h2>ADMIN TRUNCATE</h2>
					<form action="" method="POST">
						<form action="./admin_upload_action.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					<br/>
                    <h4>Batch Year</h4>
                    <select name="batch" class="form-control" id="sel1">
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
                    <h4>Semester</h4>
                    <select name="sem" class="form-control" id="sel3">
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
					 <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     </select>
                     </div>
										
					 <br/>
					 <div align="center">
						<button name="truncate" type="submit" class="btn btn-default">Submit</button>
						</div>
					</form>
					</form>
					<br/>
					
				</div>
			</div>
				
				<div>
				<?php
					
					if(isset($_POST['truncate']))
					{
							$branch = strtolower($_POST['branch']);
							$sem = $_POST['sem'];
							$batch = $_POST['batch'];

							$tname = '0206'.$branch.$batch.$sem;

							$query = "SELECT * FROM `$tname`";
							
							$stmt = $conn->prepare($query);

							if(!($stmt->execute())) 
							  die("<div style='font-size:20px' class='alert alert-info text-center'> <strong>Add Batch and Semester!<strong><br/> Contact Administrator to add Batch and Semester</div> </div> </div> <hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
							
							$output = "  
							<table class='table table-striped table-responsive table-bordered' bordered='1'>";  
							 

						   while($row = $stmt->fetch(PDO::FETCH_ASSOC))  
						   {  
							   $sno = $row['s_no'];
							   $rollno = $row['roll_no'];
							   $name = $row['name'];
							   $s1 = $row['s1'];
							   $s2 = $row['s2'];
							   $s3 = $row['s3'];
							   $s4 = $row['s4'];
							   $s5 = $row['s5']; 
							   $s6 = $row['s6'];
							   $s7 = $row['s7'];
							   $s8 = $row['s8'];
							   $s9 = $row['s9'];
							   $s10 = $row['s10']; 
							   $s11 = $row['s11'];
							   $s12 = $row['s12'];
							   $s13 = $row['s13'];
							   $s14 = $row['s14'];
							   $s15 = $row['s15'];
							   $r_desc = $row['r_desc'];
							   $sgpa = $row['sgpa'];
							   $cgpa = $row['cgpa'];
							   $r_status = $row['r_status'];
							   $remarks = $row['remarks'];
								
								if($sno==0)
								{
									$output .= "<tr>
											<td><b>Sno</b></td>
											<td><b>$rollno</b></td>
											<td><b>$name</b></td>
											<td><b>$s1</b></td>
											<td><b>$s2</b></td>
											<td><b>$s3</b></td>
											<td><b>$s4</b></td>
											<td><b>$s5</b></td>
											<td><b>$s6</b></td>
											<td><b>$s7</b></td>
											<td><b>$s8</b></td>
											<td><b>$s9</b></td>
											<td><b>$s10</b></td>
											<td><b>$s11</b></td>
											<td><b>$s12</b></td>
											<td><b>$s13</b></td>
											<td><b>$s14</b></td>
											<td><b>$s15</b></td>
											<td><b>$r_desc</b></td>
											<td><b>$sgpa</b></td>
											<td><b>$cgpa</b></td>
											<td><b>$r_status</b></td>
											<td><b>$remarks</b></td>
										   </tr>";
								}  
								else
								{
							   $output .= "<tr>
											<td>$sno</td>
											<td>$rollno</td>
											<td>$name</td>
											<td>$s1</td>
											<td>$s2</td>
											<td>$s3</td>
											<td>$s4</td>
											<td>$s5</td>
											<td>$s6</td>
											<td>$s7</td>
											<td>$s8</td>
											<td>$s9</td>
											<td>$s10</td>
											<td>$s11</td>
											<td>$s12</td>
											<td>$s13</td>
											<td>$s14</td>
											<td>$s15</td>
											<td>$r_desc</td>
											<td>$sgpa</td>
											<td>$cgpa</td>
											<td>$r_status</td>
											<td>$remarks</td>
										   </tr>";
						   }  
						   }
						   $output .= "</table>";  	
							echo $output;
							echo "<div align='center'><a href='./admin_truncate.php?branch=$branch&batch=$batch&sem=$sem'><button class='btn btn-danger'>Truncate</button></a></div>";
						}
					if(isset($_GET['branch']))
					{
							$branch = $_GET['branch'];
							$sem = $_GET['sem'];
							$batch = $_GET['batch'];

							$tname = '0206'.$branch.$batch.$sem;
							
						$query = "TRUNCATE `$tname`";
							
						$stmt = $conn->prepare($query);

						if(!($stmt->execute())) 
							die("<div style='font-size:20px' class='alert alert-info text-center'> <strong>Database Error!<strong><br/>There is a problem communicating with the Database!</div> </div> </div> <hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
						
						$query = "UPDATE `batch_info` SET `$sem`='1' WHERE batch_year='$batch' AND branch='$branch'";
							
						$stmt = $conn->prepare($query);

						if(!($stmt->execute())) 
							die("<div style='font-size:20px' class='alert alert-info text-center'> <strong>Database Error!<strong><br/>There is a problem communicating with the Database!</div> </div> </div> <hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
						
						
						printf("<div style='font-size:20px' class='alert alert-info text-center'> <strong>Result Successfully Truncated!<strong></div> ");				 

					}	   
				?>
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

<script src="../lib/js/jquery.min.js"></script>
<script src="../lib/js/bootstrap.js"></script>

</body>
</html>
