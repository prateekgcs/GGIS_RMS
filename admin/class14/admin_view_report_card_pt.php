<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Download Result</title>
	<link href="../../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../../lib/css/style.css" rel="stylesheet">
	
	<style>
		.bold
		{
			font-weight: bold;
			background-color:#eee;
		}		
		.left
		{
			text-align: left;
		}
		a:hover
		{
			text-decoration: none;
		}
		
		.ht
		{
			background-color: white;
			color: #000;
		}
		
		td
		{
			font-size: 15px;
			text-align: center;
		}
		
		.table td
		{
			border: black solid 1px !important;
		}
		
	</style>
	
	<script>
	function printDiv(divName) 
{

	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;
	
	     document.body.innerHTML = printContents;
	
	     window.print();
	
	     document.body.innerHTML = originalContents;
	}
</script>
	
</head>

<body>

	<div class="container-fluid">
	
		<!--HEADER-->
		<div class="row header">
			<div align="center">
				<img class="img-responsive" src="../../lib/image/logo.png"/>
			</div>
		</div>
		
		<!--BODY-->	
			<div class="container-fluid" id='report'>
				<div style="border: 2px solid black" class="ht col-md-10 col-md-offset-1" >
				<div class='headmargin'>
					<div class='container-fluid'>
					
						<div class='row'>
				
							<div class="col-md-12">
							<?php 
							if(isset($_GET['tname'])&&isset($_GET['rollno']))
							{
								require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php'); 
								$conn = connect();
								$tname = strtolower($_GET['tname']);
								
								$query = "SELECT * FROM `$tname`";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
								$headings = $stmt->fetch(PDO::FETCH_ASSOC);
								$s1 = $headings['s1'];
								$s2 = $headings['s2'];
								$s3 = $headings['s3'];
								$s4 = $headings['s4'];
								$s5 = $headings['s5'];
								
								$rollno = $_GET['rollno'];
								$query = "SELECT * FROM `$tname` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$m1 = $marks['s1'];
								$m2 = $marks['s2'];
								$m3 = $marks['s3'];
								$m4 = $marks['s4'];
								$m5 = $marks['s5'];
								$total = $marks['total'];
								$attendance = $marks['attendance'];
								$remarks = $marks['remarks'];

								$arr = explode('_',$tname);
								$year = $arr[0];
								$class = $arr[1];
								$section = strtoupper($arr[2]);
								$arr = explode('-',$arr[3]);
								$test_type = strtoupper($arr[0]);
								$test_no = $arr[1];

								$info_table = $year.'_'.$class.'_info';

								$query = "SELECT * FROM `$info_table` WHERE roll_no = ? AND section = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								$stmt->bindParam(2,$section);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
								$result = $stmt->fetch(PDO::FETCH_ASSOC);

								$name = $result['name'];
								$fname = $result['fname'];
								$mname = $result['mname'];
								$dob = $result['dob'];
								$address = $result['address'];
								$scholar_no = $result['scholar_no'];

								$html0 = "<table>
									<tr>
									<td width='15%'><img class='img img-responsive' src='../../lib/image/cbse.png'/></td>
								
									<td><h3><b>Gyan Ganga International School</b></h3>
									<p>Affiliated to C.B.S.E., Delhi, Affiliation No. 1030147<br/>Wardhman Square, By pass Junction Bheraghat Road, P.O.-Tewar, Jabalpur- 482003 (M.P.)<br/>Phone: 9893040336, 9893286946, 9893304495<br/>Website: gyanganga.ac.in, E-mail: gyangangajabalpur@gmail.com</p></td>
							
									<td width='15%'><img class='img img-responsive' src='../../lib/image/slogo.png'/></td>
									</tr>
								</table>
							</div>
					
						</div>	
				
						<div align='center' class='col-md-12'>
							<h3>Report Card</h3>
							<h4>Class: IX <br/>Academic Session: 2017-18 <br/><b>Periodic Test-$test_no</b></h4>
						</div>
			
						<div class='row'>
							<div id='p' class='col-md-6 mtop'>
								<table>
									<tr>
										<td class='left'>Student's Name:</td>
										<td width='250px;' style='border-bottom: 1px solid black;'> $name</td>
									</tr>
									
									<tr>
										<td class='left'>Father's Name:</td>
										<td width='250px;' style='border-bottom: 1px solid black;'> $fname</td>
									</tr>
									<tr>
										<td class='left'>Mother's Name:</td>
										<td width='250px;' style='border-bottom: 1px solid black;'> $mname</td>
									</tr>
									<tr>
										<td class='left'>Date of Birth:</td>
										<td width='250px;' style='border-bottom: 1px solid black;'> $dob</td>
									</tr>
									<tr>
										<td class='left'>Address:</td>
										<td width='250px;' style='border-bottom: 1px solid black;'> $address</td>
									</tr>
								</table>
						
							</div>
			
							<div class='col-md-4 mtop'>
							
								<table>
									<tr align='center'>
										<td style='border: 1px solid black;'>Roll No.</td>
										<td style='border: 1px solid black;'> $rollno</td>
									</tr>
									<tr>
										<td colspan='2'>&nbsp;</td>
									</tr>
										
									<tr>
										<td>Admission Number:</td>
										<td width='50%' style='border-bottom: 1px solid black;'> $scholar_no</td>
									</tr>
									
								</table>
							</div>
						</div>";
											
						
						$html1 ="
								<div class='col-md-12 mtop'>
								
									<table class='table table-centered' border='2'>
										<tr>
											<td class='bold'>SCHOLASTIC AREA</td>
											<td class='bold'>Periodic Test (Term 1)</td>
										</tr>
										<tr>
											<td class='bold'>Subjects</td>
											<td class='bold'>MM 10</td>
										</tr>
										<tr>
											<td>$s1</td>
											<td>$m1</td>
										</tr>
										<tr>
											<td>$s2</td>
											<td>$m2</td>
										</tr>
										<tr>
											<td>$s3</td>
											<td>$m3</td>
										</tr>
										<tr>
											<td>$s4</td>
											<td>$m4</td>
										</tr>
										<tr>
											<td>$s5</td>
											<td>$m5</td>
										</tr>
									
										<tr>
											<td>TOTAL</td>
											<td>$total</td>
										</tr>
									</table>
								</div>";

						$html2 = "<div class='col-md-12 mtop'>
							
							<div id='p' class='col-md-5'>
								<table>
									<tr>
										<td>Attendance:</td>
										<td min-width='70%%' style='border-bottom: 1px solid black;'>  $attendance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									</tr>
								</table>
							</div>
							
							<div id='p' class='col-md-7'>
								<table>
									<tr>
										<td>Remarks:</td>
										<td min-width='100%%' style='border-bottom: 1px solid black;'>  $remarks &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									</tr>
								</table>
							</div>
						</div>
	
						<div id='p' class='col-md-12 mtop'>
							
							<div class='row headmargin'>
								<table class='table-responsive table-centered' width='100%'>
									<tr>
										<td id='p1'>Date: </td>
										<td id='p1'>Class Teacher</td>
										<td id='p1'>Principal</td>
									</tr>
								</table>";
						
							echo $html0;
							echo $html1;
							echo $html2;

							}	
						?>
							</div>
							
						</div>
					</div>	
				</div>	
			</div>
		</div>
	
		<div class='col-md-6 col-md-offset-3 headmargin'>
			<button class='btn btn-danger btn-block' onclick="printDiv('report')">Print</button>
		</div>
	</div>
		
		<!--FOOTER-->
		<div class="footer" align="center">
			<br/>
			<p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p>
		</div>
	
	<script src="../../lib/js/jquery.min.js"></script>
	<script src="../../lib/js/bootstrap.js"></script>
	
		
</body>

</html>