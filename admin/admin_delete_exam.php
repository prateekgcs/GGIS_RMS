<?php
	require_once('./admin_session_check.php');
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Upload</title>
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
					<a href="./admin_dashboard.php"><button class="btn btn-primary btn-block"><img width="10%" src="../lib/image/home.png"/><br/>Home</button></a><br/>
					<button onclick="location.href='./admin_reset_password.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/reset.png"/><br/>Reset Password</button>
					<br/>
					<button onclick="location.href='../lib/signout.php'" class="btn btn-primary btn-block"><img width="10%" src="../lib/image/power.png"/><br/>Sign Out</button>
				</div>
				
				<div class="col-md-7 col-md-offset-1 row">
					<div class="container-fluid subhead">  	
				
						<div align='center'>
							<h2>DELETE RESULT DATA</h2>
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
							   <select name="clas" class="form-control" id="clas">
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
					 		
							<div class="form-group">
							   <h4>Section</h4>
							   <select name="section" class="form-control" id="section">
							   <option value="a">A</option>
							   <option value="b">B</option>
							   <option value="c">C</option>
							   </select>
							 </div>
							
							<div class="form-group">
								<h4>Result Template</h4>
								<select name="temp" class="form-control" id="temp">
								 <option value="default">Select</option>
								</select>
							</div>
					
							
					  
						<br/>
					  
						<div align="center">

							<input type='submit' name='search' value='Search' class='btn btn-success btn-block'/>
							
						</div>
					 <br/>
					 
					</form>
				</div>
				<div>
					<?php

						require_once('../lib/sql/conn.php');
						require_once('../lib/functions/check_uploaded.php');
						require_once('../lib/functions/fetch_bitmap.php');
						require_once('../lib/functions/ExcelToDB.php');
						require_once('../lib/functions/update_bitmap.php');
						require_once('../lib/functions/check_meta.php');
						if(isset($_POST['search']))
						{
							$year = $_POST['year'];
							$class = $_POST['clas'];
							$section = strtoupper($_POST['section']);
							$test_type = $_POST['temp'];
							$tname = $year.'_'.$class.'_'.strtoupper($section).'_'.$test_type;
							$bitmap = getBitMap($year,$class,$section);
							if(checkAll($bitmap,$test_type,$class))
							{
								printf("<div align='center'>
									<h4>EXAM DETAILS TO BE DELETED:
									</br>
									</br>Year: $year
									</br>Class: $class
									</br>Section: $section
									</br>Test: $test_type
									</h4>
									</br><button onclick=\" confirmBox(); \" class='btn btn-danger btn-block'>Delete</button>
									</br>
									</div>
									<script>
										function confirmBox()
										{
											var r = confirm(\"Are you 🐷?\");
											if (r == true) {
												window.location.href='./admin_delete_exam.php?delete=1&tname=$tname';
											} else {
												window.location.href='./admin_delete_exam.php';
											}
										}
									</script>");
							}
							else
							{
								die("<script>alert('Exam data not found!');</script>");
							}
						}

						if(isset($_GET['delete'])&&isset($_GET['tname']))
						{
							$conn = connect();
							$delete = $_GET['delete'];
							$tname = strtolower($_GET['tname']);
							if($delete)
							{
								$query = "DROP TABLE `$tname`";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Internal Error');</script>");
								$arr = explode("_",$tname);
								$bitmap = getBitMap($arr[0],$arr[1],$arr[2]);
								$num = 0;
								updateAll($bitmap,$arr[3],$arr[0],$arr[1],$arr[2],$num);
								printf("<script>alert('Data deleted succesfully!');window.location.href='./admin_dashboard.php';</script>");
							}
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