
<!DOCTYPE html>

<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width'>
	<title>Download Result</title>
	<link href='../../lib/css/bootstrap.css' rel='stylesheet'>
	<link href='../../lib/css/style.css' rel='stylesheet'>
	
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
		
		p
		{
			font-size: 12px;
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

	<div class='container-fluid'>
	
		<!--HEADER-->
		<div class='row header'>
			<div align='center'>
				<img class='img-responsive' src='../../lib/image/logo.png'/>
			</div>
		</div>
		
		<!--BODY-->	
		<div class='headmargin'>
		
						<?php
						if(isset($_GET['tname'])&&isset($_GET['rollno']))
							{
								require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php'); 
								
								$pt1_max = 10;
								$ns1_max = 5;
								$sea1_max = 5;
								$sa1_max = 80;
								$t1_max = 100;

								$tname = $_GET['tname'];
								$arr = explode('_',$tname);
								$year = $arr[0];
								$class = $arr[1];
								$section = strtoupper($arr[2]);
								$arr = explode('-',$arr[3]);
								$test_type = strtoupper($arr[0]);
								$test_no = $arr[1];
								$info_table = $year.'_'.$class.'_info';
								$pt1_table = $year.'_'.$class.'_'.$section.'_pt-1';
								$ns1_table = $year.'_'.$class.'_'.$section.'_ns-1';
								$csa1_table = $year.'_'.$class.'_'.$section.'_csa-1';
								$d1_table = $year.'_'.$class.'_'.$section.'_d-1';
								$sea1_table = $year.'_'.$class.'_'.$section.'_sea-1';

								$conn = connect();
								$tname = strtolower($_GET['tname']);
								
								$query = "SELECT * FROM `$tname`";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong1!');</script>");
								$headings = $stmt->fetch(PDO::FETCH_ASSOC);
								$s1 = $headings['s1'];
								$s2 = $headings['s2'];
								$s3 = $headings['s3'];
								$s4 = $headings['s4'];
								$s5 = $headings['s5'];
								
								$rollno = $_GET['rollno'];

								$query = "SELECT * FROM `$pt1_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong2!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$pt1_m1 = $marks['s1'];
								$pt1_m2 = $marks['s2'];
								$pt1_m3 = $marks['s3'];
								$pt1_m4 = $marks['s4'];
								$pt1_m5 = $marks['s5'];
								$pt1_total = $marks['total'];
								$query = "SELECT * FROM `$pt1_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong2!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$pt1_m1_max = $marks['s1'];
								$pt1_m2_max = $marks['s2'];
								$pt1_m3_max = $marks['s3'];
								$pt1_m4_max = $marks['s4'];
								$pt1_m5_max = $marks['s5'];


								$query = "SELECT * FROM `$ns1_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!3');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$ns1_m1 = $marks['s1'];
								$ns1_m2 = $marks['s2'];
								$ns1_m3 = $marks['s3'];
								$ns1_m4 = $marks['s4'];
								$ns1_m5 = $marks['s5'];
								$ns1_total = $marks['total'];
								$query = "SELECT * FROM `$ns1_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong2!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$ns1_m1_max = $marks['s1'];
								$ns1_m2_max = $marks['s2'];
								$ns1_m3_max = $marks['s3'];
								$ns1_m4_max = $marks['s4'];
								$ns1_m5_max = $marks['s5'];


								$query = "SELECT * FROM `$sea1_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!4');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$sea1_m1 = $marks['s1'];
								$sea1_m2 = $marks['s2'];
								$sea1_m3 = $marks['s3'];
								$sea1_m4 = $marks['s4'];
								$sea1_m5 = $marks['s5'];
								$sea1_total = $marks['total'];
								$query = "SELECT * FROM `$sea1_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong2!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$sea1_m1_max = $marks['s1'];
								$sea1_m2_max = $marks['s2'];
								$sea1_m3_max = $marks['s3'];
								$sea1_m4_max = $marks['s4'];
								$sea1_m5_max = $marks['s5'];


								$query = "SELECT * FROM `$csa1_table` WHERE sch_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!5');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$csa1_m1 = $marks['s1'];
								$csa1_m2 = $marks['s2'];
								$csa1_m3 = $marks['s3'];
								$csa1_m4 = $marks['s4'];
								$csa1_m5 = $marks['s5'];
								$csa1_m6 = $marks['s6'];
								$csa1_m7 = $marks['s7'];
								$csa1_m8 = $marks['s8'];


								$query = "SELECT * FROM `$d1_table` WHERE sch_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$d1_m1 = $marks['s1'];
								$d1_m2 = $marks['s2'];
								$d1_m3 = $marks['s3'];
								$d1_m4 = $marks['s4'];
								$d1_m5 = $marks['s5'];
								$d1_m6 = $marks['s6'];
								$d1_m7 = $marks['s7'];
								$d1_m8 = $marks['s8'];

								$query = "SELECT * FROM `$tname` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$sa1_m1 = $marks['s1'];
								$sa1_m2 = $marks['s2'];
								$sa1_m3 = $marks['s3'];
								$sa1_m4 = $marks['s4'];
								$sa1_m5 = $marks['s5'];
								$sa1_total = $marks['total'];
								$attendance = $marks['attendance'];
								$remarks = $marks['remarks'];
								$query = "SELECT * FROM `$tname` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong2!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$sa1_m1_max = $marks['s1'];
								$sa1_m2_max = $marks['s2'];
								$sa1_m3_max = $marks['s3'];
								$sa1_m4_max = $marks['s4'];
								$sa1_m5_max = $marks['s5'];

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
								$html = "
								<div class='container-fluid' id='report'>
								<div style='border: 2px solid black' class='ht col-md-10 col-md-offset-1' >
									
									<div class='container-fluid'>
									
									<div class='row'>
									
										<div class='col-md-12'>
								<table>
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
							<h4>Class: IX <br/>Academic Session: 2017-18</h4>
						</div>
					
						<div class='row'>
							<div id='p' class='col-md-6 mtop'>
								<table>
									<tr>
										<td class='left'>Student's Name:</td>
										<td width='250px;' style='border-bottom: 1px solid black;'> $name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
					
							<div id='p' class='col-md-4 mtop'>
								
								<table>
									<tr align='center'>
										<td style='border: 1px solid black;'>Roll No.</td>
										<td style='border: 1px solid black;'> $rollno</td>
									</tr>
						
									<tr>
										<td colspan='2'>&nbsp;</td>
									</tr>							

									<tr>
										<td>Admission Number</td>
										<td width='50%' style='border-bottom: 1px solid black;'> $scholar_no</td>
									</tr>
										
								</table>
							</div>
						</div>
						
						<div style='margin-top:20px;' class='container-fluid'>
						<div class='col-md-12'>
					
							<table id='ps' border='2'>
								<tr class='bold'>
									<td>SCHOLASTIC AREA</td>
									<td colspan='7'>Term 1</td>
								</tr>
								
								<tr class='bold'>
									<td rowspan='2'>Subjects</td>
									<td>Per. Test</td>
									<td>Note Book</td>
									<td>SEA</td>
									<td>Half Yearly</td>
									<td>Total</td>
									<td rowspan='2'>Grade</td>
								</tr>
								
								<tr class='bold'>
									<td>$pt1_max</td>
									<td>$ns1_max</td>
									<td>$sea1_max</td>
									<td>$sa1_max</td>
									<td>$t1_max</td>
								</tr>
								
								<tr>
									<td class='left'>$s1</td>
									<td>$pt1_m1</td>
									<td>$ns1_m1</td>
									<td>$sea1_m1</td>
									<td>$sa1_m1</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class='left'>$s2</td>
									<td>$pt1_m2</td>
									<td>$ns1_m2</td>
									<td>$sea1_m2</td>
									<td>$sa1_m2</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class='left'>$s3</td>
									<td>$pt1_m3</td>
									<td>$ns1_m3</td>
									<td>$sea1_m3</td>
									<td>$sa1_m3</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class='left'>$s4</td>
									<td>$pt1_m4</td>
									<td>$ns1_m4</td>
									<td>$sea1_m4</td>
									<td>$sa1_m4</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class='left'>$s5</td>
									<td>$pt1_m5</td>
									<td>$ns1_m5</td>
									<td>$sea1_m5</td>
									<td>$sa1_m5</td>
									<td></td>
									<td></td>
								</tr>
								
								<tr>
									<td colspan='7'><b>8 Point Grading Scale: </b>A1(91% - 100%), A2(81% - 90%), B1(71% - 80%), B2(61% - 70%), C1(51%-60%), C2(41% - 50%), D(33% - 40%), E(32% & Below) *SE=Sub Enrichment</b></td>
								</tr>
							</table>
						</div>
						</div>
					
						<br/>
					
						<div id='p' class='col-md-12'>
							<div id='p' style='margin-left: 15px;' class='col-md-4'>
								<table class='table' border='2'>
									<tr class='bold'>
										<td style='min-width:70%; background-color:#eee;'>Overall Marks</td>
										<td style='min-width:30%'>521.5/600</td>
									</tr>
								</table>
							</div>
							
							<div id='p' class='col-md-4'>
							<table class='table' border='2'>
								<tr class='bold'>
									<td style='min-width:60%; background-color:#eee;'>Percentage</td>
									<td style='min-width:40%'>86.92</td>
								</tr>
							</table>
							</div>
							
							<div id='p' class='col-md-2'>
							<table class='table' border='2'>
								<tr class='bold'>
									<td style='min-width:60%; background-color:#eee;'>Grade</td>
									<td style='min-width:40%'>A2</td>
								</tr>
							</table>
							</div>
							
							<div id='p' class='col-md-2'>
							<table class='table' border='2'>
								<tr class='bold'>
									<td style='min-width:60%;  background-color:#eee;'>Rank</td>
									<td style='min-width:40%'>1</td>
								</tr>
							</table>
							</div>
							
						</div>
					
						<div class='container-fluid'>
						<div style='padding-left: 20px;' class='row'>
					
							<div id='p' class='col-md-6'>
								<table border='2'>
									<tr class='bold'>
										<td colspan='2'>Co-Scholastic Area<br>(3 Point Grading Scale A,B,C)</td>
									</tr>
									<tr class='bold'>
										<td style='width:250px;' class='left'>Activity</td>
										<td style='width:60px;'>Grade</td>
									</tr>
									
									<tr>
										<td class='left'>Work Education</td>
										<td>$csa1_m1</td>
									</tr>
									
									<tr>
										<td class='left'>Art Education</td>
										<td>$csa1_m2</td>
									</tr>
									
									<tr>
										<td class='left'>Health & Physical Education</td>
										<td>$csa1_m3</td>
									</tr>
									<tr>
										<td class='left'>Scientific Skills</td>
										<td>$csa1_m4</td>
									</tr>
									<tr>
										<td class='left'>Thinking Skills</td>
										<td>$csa1_m5</td>
									</tr>
									<tr>
										<td class='left'>Social Skills</td>
										<td>$csa1_m6</td>
									</tr>
									<tr>
										<td class='left'>Yoga/NCC</td>
										<td>$csa1_m7</td>
									</tr>
									<tr>
										<td class='left'>Sports</td>
										<td>$csa1_m8</td>
									</tr>
								</table>
							</div>
						
						
							<div class='col-md-6 mtop'>
							<table border='2'>
								<tr class='bold'>
									<td colspan='2'>Discipline<br>(3 Point Grading Scale A,B,C)</td>
								</tr>
								
								<tr class='bold'>
									<td class='left'>Element</td>
									<td style='width:60px;'>Grade</td>
								</tr>
								
								<tr>
									<td class='left'>Regularity & Punctuality</td>
									<td>$d1_m1</td>
								</tr>
								
								<tr>
									<td class='left'>Sincerity</td>
									<td>$d1_m2</td>
								</tr>
								
								<tr>
									<td class='left'>Behaviour & Values</td>
									<td>$d1_m3</td>
								</tr>
								<tr>
									<td class='left'>Respectfulness for Rules & Regulations</td>
									<td>$d1_m4</td>
								</tr>
								<tr>
									<td class='left'>Attitude Towards Teachers</td>
									<td>$d1_m5</td>
								</tr>
								<tr>
									<td class='left'>Attitude Towards School-mates</td>
									<td>$d1_m6</td>
								</tr>
								<tr>
									<td class='left'>Attitude Towards Society</td>
									<td>$d1_m7</td>
								</tr>
								<tr>
									<td class='left'>Attitude Towards Nstion</td>
									<td>$d1_m8</td>
								</tr>
							</table>
						</div>
					</div>
					</div>

			<div class='row mtop'>
				
				<div class='col-md-4'>
				<table>
					<tr>
						<td>Attendance: </td>
						<td min-width='70%' style='border-bottom: 1px solid black;'> $attendance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
				</table>
				</div>
				
				<div class='col-md-8'>
				<table>
					<tr>
						<td>Remarks: </td>
						<td min-width='80%' style='border-bottom: 1px solid black;'> $remarks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
				</table>
				</div>
			</div>
			
			<div class='row mtop'>
				<h4><b>Congratulations! Promoted to next Class.</b></h4>
			</div>
			
			<div class='row'>
				<div class='row headmargin'>
				
						<table class='table-responsive table-centered t1' width='100%' >
							<tr>
								<td id='p1'>Date: </td>
								<td id='p1'>Class Teacher</td>
								<td id='p1'>Principal</td>
							</tr>
						</table>
						</div>
						</div>
						</div>
						</div>
						</div>";

						echo $html;
					}
				?>
			
		
	
	
	</div>	
	
	<div class='col-md-6 col-md-offset-3 headmargin'>
			<button class='btn btn-danger btn-block' onclick="printDiv('report')">Print</button>
		</div>
	</div>
		
		<!--FOOTER-->
		<div class='footer' align='center'>
			<br/>
			<p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p>
		</div>
	
	<script src='../../lib/js/jquery.min.js'></script>
	<script src='../../lib/js/bootstrap.js'></script>
	
		
</body>

</html>