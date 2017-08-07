<?php
	require_once('./admin_session_check.php');
    require_once '../lib/sql/conn.php';
    $conn = connect();
 ?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Upload Info</title>
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
		<div class='container-fluid'>
			<div class="ht col-md-10 col-md-offset-1">
				
				<div align="center" class="col-md-3 subhead sidebar">
					<h3>Welcome</br><?php printf($_SESSION['admin_name']); ?></h3>
					<?php echo "Date: ".date("d-m-Y")."<br/>";
					echo "Time: ".date("h:i:sa");
					?>
					<hr/>
					<br/>
					<a href="./admin_dashboard.php"><button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/home.png"/><br/>Home</button></a><br/>
					<button onclick="location.href='./admin_reset_password.php'"  class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button onclick="location.href='../lib/signout.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-7 col-md-offset-1 row">
					<div class="container-fluid subhead">  	
				
						<div align='center'>
							<h3>UPLOAD BATCH INFORMATION</h3>
						</div>
					
						<form action="" method="POST" enctype="multipart/form-data">
							<br/>
							<div class="form-group">
								
								<h4>Batch Year</h4>
								<select name="year" class="form-control" id="sel1">
									 <option value="2017">2017</option>
									 <option value="2018">2018</option>
									 <option value="2019">2019</option>
									 <option value="2020">2020</option>
									 <option value="2021">2021</option>
									 <option value="2022">2022</option>
									 <option value="2023">2023</option>
									 <option value="2024">2024</option>
									 <option value="2025">2025</option>							 
								 </select>
							</div>
				 				 
					
							 <div class="form-group">
							   <h4>Class</h4>
							   <select name="class" class="form-control" id="sel2">
							   <option value="default">Select</option>
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
							   <option value="11s">11 (SCIENCE)</option>
							   <option value="11c">11 (COMMERCE)</option>
							   <option value="11s">12 (SCIENCE)</option>
							   <option value="11c">12 (COMMERCE)</option>
							   </select>
							 </div>
					 							
							<div id="hide" class="form-group">
							  <h4>Upload File</h4>
							  <input type="file" name="file" class='form-control'>
							</div>
					  
						<br/>
					  
						<div align="center">
							
							<div class="col-md-6">
							<button id='but' name='download' class='btn btn-success btn-block'>Download Template</button>
							</div>
							
							<div class="col-md-6">
							<input type='submit' name='Upload' value='Upload' class='btn btn-success btn-block'/>
							</div>
						</div>
					 <br/>
					 
					</form>
				</div>
				<div>
					<?php

						require_once('../lib/sql/conn.php');
						require_once('../lib/functions/ExcelToDB.php');
						require_once('../lib/functions/check_meta.php');
						if(isset($_POST['upload']) && $_FILES['file']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
						{
							$year = $_POST['year'];
							$class = $_POST['clas'];
							$section = $_POST['section'];
							$test_type = $_POST['temp'];
							$tname = $year.'_'.$class.'_info';
							
							
							$tmp_name = $_FILES['file']['tmp_name'];
							$path="../lib/uploads/";
							$exten = ".xlsx";
							$filename = $path.$tname.$exten;
							$val = metaCheck($year,$class);
							
							
							if($val == 2)
							{
								die("<script>alert('Batch info not uploaded!');</script>");
							}

							//move uploaded file from temp location to Uploads folder
							if(!(move_uploaded_file($tmp_name, $filename))) die("Can't Upload File!");

							//upload excel to database
							if($val==0)
							{
								CreateStudentInfo($tablename);
								UploadStudentInfo($tablename);
							}
							else if($val==1)
							{
								UploadStudentInfo($tablename);
							}	

							$num = 2;
							metaUpdate($year,$class,$num); 
							
						}
					?>
				</div>
			</div>	
				
					<?php
									
					if(isset($_POST["download"]))
					{
						$year = $_POST['year'];
						$clas = $_POST['class'];
						if($clas!='default')
						{
							
						if($clas <= 4)
							$class = 'CLASS 1-4 ';
						else if($clas == 5)
							$class = 'CLASS 5 ';
						else if($clas <= 8)
							$class = 'CLASS 6-8 ';
						else if($clas == 9)
							$class = 'CLASS 9 ';
						else if($clas == '11S')
							$class = 'CLASS 11 SCIENCE ';
						else if($clas == '11C')
							$class = 'CLASS 11 COMMERCE ';
						
						$filename = "CLASS 1-12 STUDENT INFO.xlsx";
						$path = "../files/templates/";
						$download_file = $path.$filename;
						
						header('Content-Description: File Transfer');
						header('Content-Type: application/octet-stream');
						header('Content-Disposition: attachment; filename=CLASS '.$clas.' ('.$year.')_INFO');
						header('Expires: 0');
						header('Cache-Control: must-revalidate');
						header('Pragma: public');
						header('Content-Length: ' . filesize($download_file));
						ob_clean();
						flush();
						readfile($download_file);
						exit;
						}
					}
					?>
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