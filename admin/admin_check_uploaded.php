<?php
	require_once('./admin_session_check.php');
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Check Upload</title>
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
					<h3>Welcome</br><?php printf($_SESSION['admin_name']); ?></h3>
					<?php echo "Date: ".date("d-m-Y")."<br/>";
					echo "Time: ".date("h:i:sa");
					?>
					<hr/>
					<br/>
					<a href="./admin_dashboard.php"><button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/home.png"/><br/>Home</button></a><br/>
					<button onclick="location.href='./admin_reset_password.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button onclick="location.href='../lib/signout.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-9 row">
					<div class="container-fluid subhead">  	
					
					<div class='col-md-10 col-md-offset-1'>
						<div align='center'>
							<h2>CHECK RESULT DATA</h2>
						</div>
					
						<form action="./admin_check_uploaded_action.php" method="POST" enctype="multipart/form-data">
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
							   <select name="clas" class="form-control" id="clas">
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
							   <option value="12s">12 (SCIENCE)</option>
							   <option value="12c">12 (COMMERCE)</option>
							   </select>
							 </div>
					 		
							<div class="form-group">
							   <h4>Section</h4>
							   <select name="section" class="form-control" id="section">
							   <option value="a">A</option>
							   <option value="b">B</option>
							   <option value="c">C</option>
							   </select>
							 </div>
							
						<br/>
					  
						<div align="center">

							<input type='submit' name='search' value='Search' class='btn btn-success btn-block'/>
							
						</div>
					 <br/>
					 
					</form>
				
				
					</div>	
					</div>
					</div>
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

	$("#clas").on('change', function() 
	{
			var clas= parseInt($(this).val());		
		
			if(clas<=5)
			{
				$("#temp").load("../lib/upload_template/primary.txt");
			}
			else if(clas<10)
			{
				$("#temp").load("../lib/upload_template/secondary.txt");
			}
			else
			{
				$("#temp").load("../lib/upload_template/senior.txt");
			}
			
		});
		
	</script>
	
</body>

</html>