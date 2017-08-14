<?php
	require_once('./admin_session_check.php');
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
					<h3>Welcome</br><?php printf($_SESSION['admin_name']); ?></h3>
					<?php echo "Date: ".date("d-m-Y")."<br/>";
					echo "Time: ".date("h:i:sa");
					?>
					<hr/>
					<br/>
					<a href="./admin_dashboard.php"><button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/home.png"/><br/>Home</button></a>
					<br/>
					<button onclick="location.href='./admin_reset_password.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button onclick="location.href='../lib/signout.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-7 col-md-offset-1 row">
					<div class="container-fluid subhead">  	
				
						<div align='center'>
							<h2>GENERATE REPORT CARD</h2>
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
                    <select name="test" class="form-control" id="sel3">
					 <option value="default">Select</option>
                     </select>
                     </div>
					 
					  <br/>
					  
					  <div align="center">
						<input type='submit' name='generate' value='Generate' class='btn btn-success btn-block'/>
					</div>
					 <br/>
					 
					</form>
					<?php
						require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/functions/check_available.php');
						require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/functions/fetch_bitmap.php');
						require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/functions/check_meta.php');
						require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php');
						if(isset($_POST['generate']))
						{
							$year = $_POST['year'];
							$class = $_POST['class'];
							$section = $_POST['section'];
							$test_type = $_POST['test'];

							$val = metaCheck($year,$class);
							if($val<2) die("<script>alert('Batch not craeted!');</script>");

							if($test_type == 'or')
							{	
								$file = 'overall';
								$get_tname = 'ae';
								$check = 'AE';
							}
							else
							{
								$get_tname = $test_type;
								$check = $test_type;
							}
							

							if($test_type == 'pt-1' || $test_type == 'pt-2')
							{
								$file = 'pt';
							}
							else if($test_type == 'ns-1' || $test_type == 'ns-2' || $test_type == 'ns')
							{
								$file = 'ns';
							}
							else if($test_type == 'sea-1' || $test_type == 'sea-2')
							{
								$file = 'sea';
							}
							else if($test_type == 'se')
							{
								$file = 'sea';
								$get_tname = 'sea';
							}
							else if($test_type == 't-1')
							{
								$file = 't1';
								$check = 'sa-1';
								$get_tname = 'sa-1';
							}
							else if($test_type == 't-2')
							{
								$file = 't2';
								$check = 'sa-2';
								$get_tname = 'sa-2';
							}


							if($class<5)
								$folder = 'class14';
							else if($class==5)
								$folder = 'class5';
							else if($class>5 && $class<10)
								$folder = 'class69';
							else if( $class=='11s' || $class=='11c' )
								$folder = 'class11';
							else
								die("<script>alert('Something went wrong!');</script>");

							
							//echo $check;
							$bitmap = getBitMap($year,$class,$section);
							//echo $bitmap;
							$bool = checkAvailable($class,$bitmap,$check);
							//echo $bool;

							if(!$bool)
								die("
								<script>
									alert('Data required to view this report card are not yet uploaded!'); 
								</script>
									");
							

							printf("<script>window.location.href = './admin_generate_report_card_action.php?year=$year&class=$class&section=$section&get_tname=$get_tname&file=$file&folder=$folder'</script>");

						}
					?>
					
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

	$("#sel2").on('change', function() 
	{
			var clas= parseInt($(this).val());		
		
			if(clas<=5)
			{
				$("#sel3").load("../lib/report_card/primary.txt");
			}
			else if(clas<=9)
			{
				$("#sel3").load("../lib/report_card/secondary.txt");
			}
			else
			{
				$("#sel3").load("../lib/report_card/senior.txt");
			}
			
	});
		
	</script>
	
</body>

</html>