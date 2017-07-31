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
							<h3>ADD BATCH INFORMATION</h3>
						</div>
					
						<form action="" class='subhead' method="POST" enctype="multipart/form-data">
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
						$year=$_POST['year'];
						$class=$_POST['class'];
						$filename = "CLASS 1-12 STUDENT INFO.xlsx";
						$path = "../files/templates/";
						$download_file = $path.$filename;
						
						header('Content-Description: File Transfer');
						header('Content-Type: application/octet-stream');
						header('Content-Disposition: attachment; filename='.'Class '.$class.'('.$year.')_info.xlsx');
						header('Expires: 0');
						header('Cache-Control: must-revalidate');
						header('Pragma: public');
						header('Content-Length: ' . filesize($download_file));
						ob_clean();
						flush();
						readfile($download_file);
						exit;
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