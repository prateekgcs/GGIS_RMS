<?php
	require_once('./professor_session_check.php');
 ?>

 <!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Result</title>
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
					<a href="./professor_dashboard.php"><button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/home.png"/><br/>Home</button></a><br/>
					<button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button onclick="location.href='../lib/signout.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-7 col-md-offset-1 row">
					<div class="container-fluid subhead">  	
				
						<div align='center'>
							<h2>UPLOAD RESULT</h2>
						</div>
					
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								
								<h4>Batch Year</h4>
								<select name="year" class="form-control" id="year">
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
							   <input type="text" value="<?php printf($_SESSION['prof_class']); ?>" name="class" class="form-control" id="class" readonly/>
							 </div>
					 		
							<div class="form-group">
							   <h4>Section</h4>
							   <input type="text" value="<?php printf($_SESSION['prof_section']); ?>" name="section" class="form-control" id="section" readonly/>
							 </div>
							
							<div class="form-group">
								<h4>Result Template</h4>
								<select name="sem" class="form-control" id="template">
								 <!--option value="default">Select</option-->
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
			</div>	
				
					<?php
									
					if(isset($_POST["download"]))
					{
						$sem = $_POST['sem'];
						$year = $_POST['year'];
						$class = $_POST['class'];
						
						if($class!='default')
						{
							if($class <= 4)
								$class = 'CLASS 1-4 ';
							else if($class == 5)
								$class = 'CLASS 5 ';
							else if($class <= 8)
								$class = 'CLASS 6-8 ';
							else if($class == 9)
								$class = 'CLASS 9 ';
							else if($class == '11S')
								$class = 'CLASS 11 SCIENCE ';
							else if($class == '11C')
								$class = 'CLASS 11 COMMERCE ';
							
							$filename = $class.$sem.'.xlsx';
							$path = "../deb/";
							$download_file = $path.$filename;
							
							header('Content-Description: File Transfer');
							header('Content-Type: application/octet-stream');
							header('Content-Disposition: attachment; filename='.basename($download_file));
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
	
	<script>

	window.onload = function() 
	{
			var clas= parseInt($('#class').val());		
		
			if(clas<=5)
			{
				$("#template").load("../lib/upload_template/primary.txt");
			}
			else if(clas<10)
			{
				$("#template").load("../lib/upload_template/secondary.txt");
			}
			else
			{
				$("#template").load("../lib/upload_template/senior.txt");
			}
			
		}
		
	</script>
	
</body>

</html>