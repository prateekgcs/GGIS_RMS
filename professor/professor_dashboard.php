<?php
	require_once('./professor_session_check.php');
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Professor Dashboard</title>
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
					<h3>Welcome<br/> <?php printf($_SESSION['prof_name']); ?></h3>
					<?php echo "Date: ".date("d-m-Y")."<br/>";
					echo "Time: ".date("h:i:sa");
					?>
					<hr/>
					<br/><br/>
					<button onclick="location.href='./professor_reset_password.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button onclick="location.href='../lib/signout.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-9 row">
				
					<div class="col-md-5 col-md-offset-1 headmargin">
						<div align="center" class="card">
							<a href="./professor_upload.php">
							<div class="card card1 padd" id="cards">
								<img class="card-img-top" width="20%" src="../lib/image/upload.png">
									<h3 class="card-title">UPLOAD RESULT</h3>
								</div>
							</a>
						</div>				
					</div>
					
					<div class="col-md-5 headmargin">
						<div align="center" class="card">
							<a href="./professor_download.php">
							<div class=" card card2 padd" id="cards">
								<img class="card-img-top" width="20%" src="../lib/image/download.png">
									<h3 class="card-title">DOWNLOAD RESULT</h3>
								</div>
							</a>
						</div>				
					</div>
					
					<div class="col-md-5 col-md-offset-1 ">
						<div align="center" class="card">
							<a href="./professor_generate_report_card.php">
							<div class=" card card3 padd" id="cards">
								<img class="card-img-top" width="20%" src="../lib/image/report.png">
									<h3 class="card-title">GENERATE REPORT CARD</h3>
								</div>
							</a>
						</div>				
					</div>
					
					<div class="col-md-5">
						<div align="center" class="card">
							<a href="./professor_view_individual_result.php">
							<div class=" card card4 padd" id="cards">
								<img class="card-img-top" width="20%" src="../lib/image/result.png">
									<h3 class="card-title">VIEW INDIVIDUAL RESULT</h3>
								</div>
							</a>
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
	
	<script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.js"></script>
		
</body>

</html>
