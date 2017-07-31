<?php
    //session_start();
	/*if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}*/
	?>
	
	<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Download Result</title>
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
					<a href="./admin_dashboard.php"><button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/home.png"/><br/>Home</button></a>
					<br/>
					<button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-7 col-md-offset-1 row">
					<div class="container-fluid subhead">  	
				
						<div align='center'>
							<h2>DOWNLOAD RESULT</h2>
							<br/>
						</div>
					
						<form action="" method="POST" enctype="multipart/form-data">
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
							   <option value="11S">11 (SCIENCE)</option>
							   <option value="11C">11 (COMMERCE)</option>
							   <option value="11S">12 (SCIENCE)</option>
							   <option value="11C">12 (COMMERCE)</option>
							   </select>
							 </div>
					 					 
								<div class="form-group">
							   <h4>Section</h4>
							   <select name="section" class="form-control" id="sel2">
							   <option value="default">Select</option>
							   <option value="a">A</option>
							   <option value="b">B</option>
							   <option value="c">C</option>
							   </select>
							 </div>
					 					 
					 <div class="form-group">
                    <h4>Exam</h4>
                    <select name="sem" class="form-control" id="sel3">
					 <option value="default">Select</option>
                     </select>
                     </div>
					 
					  <br/>
					  
					  <div align="center">
						<input type='submit' name='Download' value='Download' class='btn btn-success btn-block'/>
					</div>
					 <br/>
					 
					</form>
				</div>
			</div>	
				
					<?php
									
					/*if(isset($_POST["download"]))
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
					}*/
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

	$("#sel2").on('change', function() 
	{
			var clas= parseInt($(this).val());		
		
			if(clas==1)
			{
				$("#sel3").load("./upload_template/primary.txt");
			}
			else if(clas<10)
			{
				$("#sel3").load("./upload_template/secondary.txt");
			}
			else
			{
				$("#sel3").load("./upload_template/senior.txt");
			}
			
		});
		
	</script>
	
</body>

</html>