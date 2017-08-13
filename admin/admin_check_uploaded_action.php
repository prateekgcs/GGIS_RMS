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
				
				<div align="center" style="margin-top: 50px; margin-bottom: 15px;" class="col-md-3 subhead sidebarlong">
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
										
										
					<?php

						require_once('../lib/sql/conn.php');
						require_once('../lib/functions/check_uploaded.php');
						require_once('../lib/functions/fetch_bitmap.php');
						require_once('../lib/functions/check_meta.php');
						
						if(isset($_POST['search']))
						{
							$year = $_POST['year'];
							$class = $_POST['clas'];
							$section = strtoupper($_POST['section']);
							$bitmap = getBitMap($year,$class,$section);
							
							if($class<=5)
							{
								$info=(metaCheck($year,$class))?'on.png':'off.png';
								$pt1=(checkOnetoFive($bitmap,'PT-1'))?'on.png':'off.png';
								$pt2=(checkOnetoFive($bitmap,'PT-2'))?'on.png':'off.png';
								$ns1=(checkOnetoFive($bitmap,'NS-1'))?'on.png':'off.png';
								$ns2=(checkOnetoFive($bitmap,'NS-2'))?'on.png':'off.png';
								$sea1=(checkOnetoFive($bitmap,'SEA-1'))?'on.png':'off.png';
								$sea2=(checkOnetoFive($bitmap,'SEA-2'))?'on.png':'off.png';
								$csa1=(checkOnetoFive($bitmap,'CSA-1'))?'on.png':'off.png';
								$csa2=(checkOnetoFive($bitmap,'CSA-1'))?'on.png':'off.png';
								$d1=(checkOnetoFive($bitmap,'D-1'))?'on.png':'off.png';
								$d2=(checkOnetoFive($bitmap,'D-2'))?'on.png':'off.png';
								$sa1=(checkOnetoFive($bitmap,'SA-1'))?'on.png':'off.png';
								$sa2=(checkOnetoFive($bitmap,'SA-2'))?'on.png':'off.png';
								
								printf("
								
								<div align='center'>
									<h4>CHECK UPLOADED DATA</h4>
									<h4>CLASS $class-$section ($year)</h4>
								</div>
								
								</br>
								
								<table class='table table-centered table-bordered table-striped text-center'>
																	
									<tr>
										<td>Batch Information</td>
										<td><img width='35px' src='../lib/image/$info'></td>
									</tr>
									
									<tr>
										
										<td>Periodic Test-1</td>
										<td><img width='35px' src='../lib/image/$pt1'></td>
										
									</tr>
									
									<tr>
										
										<td>Notebook Submission-1</td>
										<td><img width='35px' src='../lib/image/$ns1'></td>
										
									</tr>
									
									<tr>
										
										<td>Subject Enrichment-1</td>
										<td><img width='35px' src='../lib/image/$sea1'></td>
										
									</tr>
									
									<tr>
										
										<td>Co-Scholastic Area-1</td>
										<td><img width='35px' src='../lib/image/$csa1'></td>
										
									</tr>
									
									<tr>
										
										<td>Discipline-1</td>
										<td><img width='35px' src='../lib/image/$d1'></td>
										
									</tr>
									
									<tr>
										
										<td>Summitive Assessment-1</td>
										<td><img width='35px' src='../lib/image/$sa1'></td>
										
									</tr>
									
										<tr>
										
										<td>Periodic Test-2</td>
										<td><img width='35px' src='../lib/image/$pt2'></td>
										
									</tr>
									
									<tr>
										
										<td>Notebook Submission-2</td>
										<td><img width='35px' src='../lib/image/$ns2'></td>
										
									</tr>
									
									<tr>
										
										<td>Subject Enrichment-2</td>
										<td><img width='35px' src='../lib/image/$sea2'></td>
										
									</tr>
									
									<tr>
										
										<td>Co-Scholastic Area-2</td>
										<td><img width='35px' src='../lib/image/$csa2'></td>
										
									</tr>
									
									<tr>
										
										<td>Discipline-2</td>
										<td><img width='35px' src='../lib/image/$d2'></td>
										
									</tr>
									
									<tr>
										
										<td>Summitive Assessment-2</td>
										<td><img width='35px' src='../lib/image/$sa2'></td>
										
									</tr>
									
								</table>
								
								
								");
							}
							
							
							else if($class<=9)
							{
								$info=(metaCheck($year,$class))?'on.png':'off.png';
								$pt1=(checkSixToNine($bitmap,'PT-1'))?'on.png':'off.png';
								$pt2=(checkSixToNine($bitmap,'PT-2'))?'on.png':'off.png';
								$pt3=(checkSixToNine($bitmap,'PT-3'))?'on.png':'off.png';
								$ns=(checkSixToNine($bitmap,'NS'))?'on.png':'off.png';
								$sea=(checkSixToNine($bitmap,'SEA'))?'on.png':'off.png';
								$csa=(checkSixToNine($bitmap,'CSA'))?'on.png':'off.png';
								$d=(checkSixToNine($bitmap,'D'))?'on.png':'off.png';
								$ae=(checkSixToNine($bitmap,'AE'))?'on.png':'off.png';
								
								printf("
								
								<div align='center'>
									<h4>CHECK UPLOADED DATA</h4>
									<h4>CLASS $class-$section ($year)</h4>
								</div>
								
								</br>
								
								<table class='table table-centered table-bordered table-striped text-center'>
																	
									<tr>
										<td>Batch Information</td>
										<td><img width='35px' src='../lib/image/$info'></td>
									</tr>
									
									<tr>
										
										<td>Periodic Test-1</td>
										<td><img width='35px' src='../lib/image/$pt1'></td>
										
									</tr>
									
									<tr>
										
										<td>Periodic Test-2</td>
										<td><img width='35px' src='../lib/image/$pt2'></td>
										
									</tr>
									
									<tr>
										
										<td>Periodic Test-3</td>
										<td><img width='35px' src='../lib/image/$pt3'></td>
										
									</tr>
									
									<tr>
										
										<td>Notebook Submission</td>
										<td><img width='35px' src='../lib/image/$ns'></td>
										
									</tr>
									
									<tr>
										
										<td>Subject Enrichment</td>
										<td><img width='35px' src='../lib/image/$sea'></td>
										
									</tr>
									
									<tr>
										
										<td>Co-Scholastic Area</td>
										<td><img width='35px' src='../lib/image/$csa'></td>
										
									</tr>
									
									<tr>
										
										<td>Discipline</td>
										<td><img width='35px' src='../lib/image/$d'></td>
										
									</tr>
									
									<tr>
										
										<td>Annual Exam</td>
										<td><img width='35px' src='../lib/image/$ae'></td>
										
									</tr>
																		
								</table>
								
								
								");
							}
							
							else
							{
								$info=(metaCheck($year,$class))?'on.png':'off.png';
								$ut1=(checkEleven($bitmap,'UT-1'))?'on.png':'off.png';
								$ut2=(checkEleven($bitmap,'UT-2'))?'on.png':'off.png';
								$ut3=(checkEleven($bitmap,'UT-3'))?'on.png':'off.png';
								$ae=(checkEleven($bitmap,'AE'))?'on.png':'off.png';
								
								printf("
								
								<div align='center'>
									<h4>CHECK UPLOADED DATA</h4>
									<h4>CLASS $class-$section ($year)</h4>
								</div>
								
								</br>
								
								<table class='table table-centered table-bordered table-striped text-center'>
																	
									<tr>
										<td>Batch Information</td>
										<td><img width='35px' src='../lib/image/$info'></td>
									</tr>
									
									<tr>
										
										<td>Unit Test-1</td>
										<td><img width='35px' src='../lib/image/$ut1'></td>
										
									</tr>
									
									<tr>
										
										<td>Unit Test-2</td>
										<td><img width='35px' src='../lib/image/$ut2'></td>
										
									</tr>
									
									<tr>
										
										<td>Unit Test-3</td>
										<td><img width='35px' src='../lib/image/$ut3'></td>
										
									</tr>
									
									
									<tr>
										
										<td>Annual Exam</td>
										<td><img width='35px' src='../lib/image/$ae'></td>
										
									</tr>
																		
								</table>
								
								
								");
							}
						}
							
					?>
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