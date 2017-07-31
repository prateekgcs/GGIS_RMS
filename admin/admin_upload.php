<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
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
				
				<div align="center" class="col-md-3 subhead sidebar">
					<h3>Welcome, Prateek</h3>
					<?php echo "Date: ".date("d-m-Y")."<br/>";
					echo "Time: ".date("h:i:sa");
					?>
					<hr/>
					<br/>
					<a href="./admin_dashboard.php"><button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/home.png"/><br/>Home</button></a><br/>
					<button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-7 col-md-offset-1 row">
					<div class="container-fluid subhead">  	
				
						<div align='center'>
							<h2>UPLOAD RESULT</h2>
						</div>
					
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								
								<h4>Batch Year</h4>
								<select name="year" class="form-control" id="sel1">
									 <option value="141">2017</option>
									 <option value="151">2018</option>
									 <option value="161">2019</option>
									 <option value="171">2020</option>
									 <option value="181">2021</option>
									 <option value="141">2022</option>
									 <option value="151">2023</option>
									 <option value="161">2024</option>
									 <option value="171">2025</option>							 
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
							   <option value="11S">11 (SCIENCE)</option>
							   <option value="11C">11 (COMMERCE)</option>
							   </select>
							 </div>
					 					 
					 <div class="form-group">
                    <h4>Result Template</h4>
                    <select name="sem" class="form-control" id="sel3">
					 <option value="default">Select</option>
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

	$("#sel2").on('change', function() 
	{
			var clas= parseInt($(this).val());		
		
			if(clas==1)
			{
				$("#sel3").load("./primary.txt");
			}
			else if(clas<10)
			{
				$("#sel3").load("./secondary.txt");
			}
			else
			{
				$("#sel3").load("./senior.txt");
			}
			
		});
		
	</script>
	
</body>

</html>