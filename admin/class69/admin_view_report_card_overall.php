<!DOCTYPE html>

<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
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
			font-size:12px;
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
								require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/functions/calculate_grade.php'); 
								
								$pt1_max = 10;
								$pt2_max = 10;
								$pt3_max = 10;
								$ns_max = 5;
								$sea_max = 5;
								$ae_max = 80;
								$t_max = $pt1_max + $ns_max + $sea_max;
								$g_max = $t_max + $ae_max;

								$tname = $_GET['tname'];
								$arr = explode('_',$tname);
								$year = $arr[0];
								$next_year = new DateTime($year);
								$next_year->add(new DateInterval('P1Y'));
								$next_year = $next_year->format('y');
								$class = $arr[1];
								$section = strtoupper($arr[2]);
								//$arr = explode('-',$arr[3]);
								$test_type = strtoupper($arr[3]);
								$test_no = $arr[1];
								
								$info_table = $year.'_'.$class.'_info';
								$pt1_table = $year.'_'.$class.'_'.$section.'_pt-1';
								$pt2_table = $year.'_'.$class.'_'.$section.'_pt-2';
								$pt3_table = $year.'_'.$class.'_'.$section.'_pt-3';
								$ns_table = $year.'_'.$class.'_'.$section.'_ns';
								$csa_table = $year.'_'.$class.'_'.$section.'_csa';
								$d_table = $year.'_'.$class.'_'.$section.'_d';
								$sea_table = $year.'_'.$class.'_'.$section.'_sea';
								$ae_table = $year.'_'.$class.'_'.$section.'_ae';

								$conn = connect();
								
								$query = "SELECT * FROM `$ae_table`";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong1!');</script>");
								$headings = $stmt->fetch(PDO::FETCH_ASSOC);
								$s1 = $headings['s1'];
								$s2 = $headings['s2'];
								$s3 = $headings['s3'];
								$s4 = $headings['s4'];
								$s5 = $headings['s5'];
								$s6 = $headings['s6'];
								
								$rollno = $_GET['rollno'];

								$query = "SELECT * FROM `$pt1_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong21!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$pt1_m1 = $marks['s1'];
								$pt1_m2 = $marks['s2'];
								$pt1_m3 = $marks['s3'];
								$pt1_m4 = $marks['s4'];
								$pt1_m5 = $marks['s5'];
								$pt1_m6 = $marks['s6'];
								$pt1_total = $marks['total'];
								$query = "SELECT * FROM `$pt1_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong21!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$pt1_m1_max = $marks['s1'];
								$pt1_m2_max = $marks['s2'];
								$pt1_m3_max = $marks['s3'];
								$pt1_m4_max = $marks['s4'];
								$pt1_m5_max = $marks['s5'];
								$pt1_m6_max = $marks['s6'];

								$pt1_m1 = (strtoupper($pt1_m1) == 'AB')?'AB':($pt1_m1/$pt1_m1_max)*$pt1_max;
								$pt1_m2 = (strtoupper($pt1_m2) == 'AB')?'AB':($pt1_m2/$pt1_m2_max)*$pt1_max;
								$pt1_m3 = (strtoupper($pt1_m3) == 'AB')?'AB':($pt1_m3/$pt1_m3_max)*$pt1_max;
								$pt1_m4 = (strtoupper($pt1_m4) == 'AB')?'AB':($pt1_m4/$pt1_m4_max)*$pt1_max;
								$pt1_m5 = (strtoupper($pt1_m5) == 'AB')?'AB':($pt1_m5/$pt1_m5_max)*$pt1_max;
								$pt1_m6 = (strtoupper($pt1_m6) == 'AB')?'AB':($pt1_m6/$pt1_m6_max)*$pt1_max;

								$query = "SELECT * FROM `$pt2_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong22!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$pt2_m1 = $marks['s1'];
								$pt2_m2 = $marks['s2'];
								$pt2_m3 = $marks['s3'];
								$pt2_m4 = $marks['s4'];
								$pt2_m5 = $marks['s5'];
								$pt2_m6 = $marks['s6'];
								$pt2_total = $marks['total'];
								$query = "SELECT * FROM `$pt2_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong22!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$pt2_m1_max = $marks['s1'];
								$pt2_m2_max = $marks['s2'];
								$pt2_m3_max = $marks['s3'];
								$pt2_m4_max = $marks['s4'];
								$pt2_m5_max = $marks['s5'];
								$pt2_m6_max = $marks['s6'];

								$pt2_m1 = (strtoupper($pt2_m1) == 'AB')?'AB':($pt2_m1/$pt2_m1_max)*$pt2_max;
								$pt2_m2 = (strtoupper($pt2_m2) == 'AB')?'AB':($pt2_m2/$pt2_m2_max)*$pt2_max;
								$pt2_m3 = (strtoupper($pt2_m3) == 'AB')?'AB':($pt2_m3/$pt2_m3_max)*$pt2_max;
								$pt2_m4 = (strtoupper($pt2_m4) == 'AB')?'AB':($pt2_m4/$pt2_m4_max)*$pt2_max;
								$pt2_m5 = (strtoupper($pt2_m5) == 'AB')?'AB':($pt2_m5/$pt2_m5_max)*$pt2_max;
								$pt2_m6 = (strtoupper($pt2_m6) == 'AB')?'AB':($pt2_m6/$pt2_m6_max)*$pt2_max;

								$query = "SELECT * FROM `$pt3_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong22!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$pt3_m1 = $marks['s1'];
								$pt3_m2 = $marks['s2'];
								$pt3_m3 = $marks['s3'];
								$pt3_m4 = $marks['s4'];
								$pt3_m5 = $marks['s5'];
								$pt3_m6 = $marks['s6'];
								$pt3_total = $marks['total'];
								$query = "SELECT * FROM `$pt3_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong22!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$pt3_m1_max = $marks['s1'];
								$pt3_m2_max = $marks['s2'];
								$pt3_m3_max = $marks['s3'];
								$pt3_m4_max = $marks['s4'];
								$pt3_m5_max = $marks['s5'];
								$pt3_m6_max = $marks['s6'];

								$pt3_m1 = (strtoupper($pt3_m1) == 'AB')?'AB':($pt3_m1/$pt3_m1_max)*$pt3_max;
								$pt3_m2 = (strtoupper($pt3_m2) == 'AB')?'AB':($pt3_m2/$pt3_m2_max)*$pt3_max;
								$pt3_m3 = (strtoupper($pt3_m3) == 'AB')?'AB':($pt3_m3/$pt3_m3_max)*$pt3_max;
								$pt3_m4 = (strtoupper($pt3_m4) == 'AB')?'AB':($pt3_m4/$pt3_m4_max)*$pt3_max;
								$pt3_m5 = (strtoupper($pt3_m5) == 'AB')?'AB':($pt3_m5/$pt3_m5_max)*$pt3_max;
								$pt3_m6 = (strtoupper($pt3_m6) == 'AB')?'AB':($pt3_m6/$pt3_m6_max)*$pt3_max;

								$avg_m1 = averageBestTwo($pt1_m1, $pt2_m1, $pt3_m1);
								$avg_m2 = averageBestTwo($pt1_m2, $pt2_m2, $pt3_m2);
								$avg_m3 = averageBestTwo($pt1_m3, $pt2_m3, $pt3_m3);
								$avg_m4 = averageBestTwo($pt1_m4, $pt2_m4, $pt3_m4);
								$avg_m5 = averageBestTwo($pt1_m5, $pt2_m5, $pt3_m5);
								$avg_m6 = averageBestTwo($pt1_m6, $pt2_m6, $pt3_m6);

								$query = "SELECT * FROM `$ns_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!31');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$ns_m1 = $marks['s1'];
								$ns_m2 = $marks['s2'];
								$ns_m3 = $marks['s3'];
								$ns_m4 = $marks['s4'];
								$ns_m5 = $marks['s5'];
								$ns_m6 = $marks['s6'];
								$ns_total = $marks['total'];
								$query = "SELECT * FROM `$ns_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong31!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$ns_m1_max = $marks['s1'];
								$ns_m2_max = $marks['s2'];
								$ns_m3_max = $marks['s3'];
								$ns_m4_max = $marks['s4'];
								$ns_m5_max = $marks['s5'];
								$ns_m6_max = $marks['s6'];

								$ns_m1 = (strtoupper($ns_m1) == 'AB')?'AB':($ns_m1/$ns_m1_max)*$ns_max;
								$ns_m2 = (strtoupper($ns_m2) == 'AB')?'AB':($ns_m2/$ns_m2_max)*$ns_max;
								$ns_m3 = (strtoupper($ns_m3) == 'AB')?'AB':($ns_m3/$ns_m3_max)*$ns_max;
								$ns_m4 = (strtoupper($ns_m4) == 'AB')?'AB':($ns_m4/$ns_m4_max)*$ns_max;
								$ns_m5 = (strtoupper($ns_m5) == 'AB')?'AB':($ns_m5/$ns_m5_max)*$ns_max;
								$ns_m6 = (strtoupper($ns_m6) == 'AB')?'AB':($ns_m6/$ns_m6_max)*$ns_max;


								$query = "SELECT * FROM `$sea_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!41');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$sea_m1 = $marks['s1'];
								$sea_m2 = $marks['s2'];
								$sea_m3 = $marks['s3'];
								$sea_m4 = $marks['s4'];
								$sea_m5 = $marks['s5'];
								$sea_m6 = $marks['s6'];
								$sea_total = $marks['total'];
								$query = "SELECT * FROM `$sea_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong41!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$sea_m1_max = $marks['s1'];
								$sea_m2_max = $marks['s2'];
								$sea_m3_max = $marks['s3'];
								$sea_m4_max = $marks['s4'];
								$sea_m5_max = $marks['s5'];
								$sea_m6_max = $marks['s6'];

								$sea_m1 = (strtoupper($sea_m1) == 'AB')?'AB':($sea_m1/$sea_m1_max)*$sea_max;
								$sea_m2 = (strtoupper($sea_m2) == 'AB')?'AB':($sea_m2/$sea_m2_max)*$sea_max;
								$sea_m3 = (strtoupper($sea_m3) == 'AB')?'AB':($sea_m3/$sea_m3_max)*$sea_max;
								$sea_m4 = (strtoupper($sea_m4) == 'AB')?'AB':($sea_m4/$sea_m4_max)*$sea_max;
								$sea_m5 = (strtoupper($sea_m5) == 'AB')?'AB':($sea_m5/$sea_m5_max)*$sea_max;
								$sea_m6 = (strtoupper($sea_m6) == 'AB')?'AB':($sea_m6/$sea_m6_max)*$sea_max;

								$query = "SELECT * FROM `$ae_table` WHERE roll_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$rollno);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!51');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$ae_m1 = $marks['s1'];
								$ae_m2 = $marks['s2'];
								$ae_m3 = $marks['s3'];
								$ae_m4 = $marks['s4'];
								$ae_m5 = $marks['s5'];
								$ae_m6 = $marks['s6'];
								$ae_total = $marks['total'];
								$attendance = $marks['attendance'];
								$remarks = $marks['remarks'];
								$query = "SELECT * FROM `$ae_table` WHERE roll_no = '^'";
								$stmt = $conn->prepare($query);
								if(!$stmt->execute()) die("<script>alert('Something went wrong51!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$ae_m1_max = $marks['s1'];
								$ae_m2_max = $marks['s2'];
								$ae_m3_max = $marks['s3'];
								$ae_m4_max = $marks['s4'];
								$ae_m5_max = $marks['s5'];
								$ae_m6_max = $marks['s6'];

								$ae_m1 = (strtoupper($ae_m1) == 'AB')?'AB':($ae_m1/$ae_m1_max)*$ae_max;
								$ae_m2 = (strtoupper($ae_m2) == 'AB')?'AB':($ae_m2/$ae_m2_max)*$ae_max;
								$ae_m3 = (strtoupper($ae_m3) == 'AB')?'AB':($ae_m3/$ae_m3_max)*$ae_max;
								$ae_m4 = (strtoupper($ae_m4) == 'AB')?'AB':($ae_m4/$ae_m4_max)*$ae_max;
								$ae_m5 = (strtoupper($ae_m5) == 'AB')?'AB':($ae_m5/$ae_m5_max)*$ae_max;
								$ae_m6 = (strtoupper($ae_m6) == 'AB')?'AB':($ae_m6/$ae_m6_max)*$ae_max;

								$total_1 = ($avg_m1 + $ns_m1 + $sea_m1);
								$total_2 = ($avg_m1 + $ns_m2 + $sea_m2);
								$total_3 = ($avg_m1 + $ns_m3 + $sea_m3);
								$total_4 = ($avg_m1 + $ns_m4 + $sea_m4);
								$total_5 = ($avg_m1 + $ns_m5 + $sea_m5);
								$total_6 = ($avg_m1 + $ns_m6 + $sea_m6);

								$g_total_1 = $total_1 + $ae_m1;
								$g_total_2 = $total_2 + $ae_m2;
								$g_total_3 = $total_3 + $ae_m3;
								$g_total_4 = $total_4 + $ae_m4;
								$g_total_5 = $total_5 + $ae_m5;
								$g_total_6 = $total_6 + $ae_m6;

								$g1 = calculateGrade($g_total_1);
								$g2 = calculateGrade($g_total_2);
								$g3 = calculateGrade($g_total_3);
								$g4 = calculateGrade($g_total_4);
								$g5 = calculateGrade($g_total_5);
								$g6 = calculateGrade($g_total_6);

								$f_total = $g_total_1 + $g_total_2 + $g_total_3 + $g_total_4 + $g_total_5 + $g_total_6;
								$f_total = number_format($f_total,2);
								$f_max = $g_max * 6;
								$f_percent = ($f_total/$f_max) * 100;
								$f_percent = number_format($f_percent,2);
								$f_grade = calculateGrade($f_percent);

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
	
								$query = "SELECT * FROM `$csa_table` WHERE sch_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$scholar_no);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!5');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$csa_m1 = $marks['s1'];
								$csa_m2 = $marks['s2'];
								$csa_m3 = $marks['s3'];
								$csa_m4 = $marks['s4'];
								$csa_m5 = $marks['s5'];
								$csa_m6 = $marks['s6'];
								$csa_m7 = $marks['s7'];
								$csa_m8 = $marks['s8'];

								$query = "SELECT * FROM `$d_table` WHERE sch_no = ?";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$scholar_no);
								if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
								$marks = $stmt->fetch(PDO::FETCH_ASSOC);
								$d_m1 = $marks['s1'];
								$d_m2 = $marks['s2'];
								$d_m3 = $marks['s3'];
								$d_m4 = $marks['s4'];
								$d_m5 = $marks['s5'];
								$d_m6 = $marks['s6'];
								$d_m7 = $marks['s7'];
								$d_m8 = $marks['s8'];

								$html = "<div class='container-fluid' id='report'>
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
											<h4>Class: IX <br/>Academic Session: $year-$next_year</h4>
										</div>
									
										<div class='row'>
											<div id='p' class='col-md-6 mtop'>
												<table>
									<tr>
										<td class='left'>Student's Name:</td>
										<td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$name</b></td>
									</tr>
									
									<tr>
										<td class='left'>Father's Name:</td>
										<td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$fname</b></td>
									</tr>
									<tr>
										<td class='left'>Mother's Name:</td>
										<td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$mname</b></td>
									</tr>
									<tr>
										<td class='left'>Date of Birth:</td>
										<td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$dob</b></td>
									</tr>
									<tr>
										<td class='left'>Address:</td>
										<td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$address</b></td>
									</tr>
								</table>
											
											</div>
									
											<div id='p' class='col-md-4 mtop'>
												
												<table>
													<tr align='center'>
														<td style='border: 1px solid black;'><b>Roll No.</b></td>
														<td style='border: 1px solid black;'> <b>$rollno</b></td>
													</tr>
													<tr>
														<td colspan='2'>&nbsp;</td>
													</tr>
														
													<tr>
														<td>Admission Number:</td>
														<td width='50%' style='border-bottom: 1px solid black;'> <b>$scholar_no</b></td>
													</tr>
													
												</table>
											</div>
										</div>
										
										<div class='col-md-12 mtop'>
									
											<table border='2'>
					
					<tr class='bold'>
						<td colspan='11'>SCHOLASTIC AREA</td>
					</tr>
					
					<tr class='bold'>
						<td rowspan='2'>Subjects</td>
						<td>PT 1</td>
						<td>PT 2</td>
						<td>PT 3</td>
						<td width='50px'>Average of Best 2 PT</td>
						<td>NS</td>
						<td>SEA</td>
						<td>Total</td>
						<td width='50px'>Annual Exam</td>
						<td width='50px'>Grand Total</td>
						<td rowspan='2'>Grade</td>
					</tr>
					
					<tr class='bold'>
						<td>$pt1_max</td>
						<td>$pt1_max</td>
						<td>$pt1_max</td>
						<td>$pt1_max</td>
						<td>$ns_max</td>
						<td>$sea_max</td>
						<td>$t_max</td>
						<td>$ae_max</td>
						<td>$g_max</td>
					</tr>
					<tr>
						<td class='left'>$s1</td>
						<td>$pt1_m1</td>
						<td>$pt2_m1</td>
						<td>$pt3_m1</td>
						<td>$avg_m1</td>
						<td>$ns_m1</td>
						<td>$sea_m1</td>
						<td>$total_1</td>
						<td>$ae_m1</td>
						<td>$g_total_1</td>
						<td>$g1</td>
					
					</tr>
					<tr>
						<td class='left'>$s2</td>
						<td>$pt1_m2</td>
						<td>$pt2_m2</td>
						<td>$pt3_m2</td>
						<td>$avg_m2</td>
						<td>$ns_m2</td>
						<td>$sea_m2</td>
						<td>$total_2</td>
						<td>$ae_m2</td>
						<td>$g_total_2</td>
						<td>$g2</td>
						
					</tr>
					<tr>
						<td class='left'>$s3</td>
						<td>$pt1_m3</td>
						<td>$pt3_m3</td>
						<td>$pt3_m3</td>
						<td>$avg_m3</td>
						<td>$ns_m3</td>
						<td>$sea_m3</td>
						<td>$total_3</td>
						<td>$ae_m3</td>
						<td>$g_total_3</td>
						<td>$g3</td>
						
					</tr>
					<tr>
						<td class='left'>$s4</td>
						<td>$pt1_m4</td>
						<td>$pt2_m4</td>
						<td>$pt3_m4</td>
						<td>$avg_m4</td>
						<td>$ns_m4</td>
						<td>$sea_m4</td>
						<td>$total_4</td>
						<td>$ae_m4</td>
						<td>$g_total_4</td>
						<td>$g4</td>
					</tr>
					<tr>
						<td class='left'>$s5</td>
						<td>$pt1_m5</td>
						<td>$pt2_m5</td>
						<td>$pt3_m5</td>
						<td>$avg_m5</td>
						<td>$ns_m5</td>
						<td>$sea_m5</td>
						<td>$total_5</td>
						<td>$ae_m5</td>
						<td>$g_total_5</td>
						<td>$g5</td>
						
					</tr>
						<tr>
						<td class='left'>$s6</td>
						<td>$pt1_m6</td>
						<td>$pt2_m6</td>
						<td>$pt3_m6</td>
						<td>$avg_m6</td>
						<td>$ns_m6</td>
						<td>$sea_m6</td>
						<td>$total_6</td>
						<td>$ae_m6</td>
						<td>$g_total_6</td>
						<td>$g6</td>
					</tr>
					<tr>
						<td colspan='11'><b>8 Point Grading Scale: </b>A1(91% - 100%), A2(81% - 90%), B1(71% - 80%), B2(61% - 70%), C1(51%-60%), C2(41% - 50%), D(33% - 40%), E(32% & Below) *SE=Sub Enrichment</b></td>
					</tr>
				</table>
									</div>
									
									<br/>
									<div id='p' class='col-md-12'>
										<div id='p' style='margin-left: 15px;' class='col-md-4'>
											<table class='table' border='2'>
												<tr class='bold'>
													<td style='min-width:70%; background-color:#eee;'>Overall Marks</td>
													<td style='min-width:30%'>$f_total/$f_max</td>
												</tr>
											</table>
										</div>
										
										<div id='p' class='col-md-4'>
										<table class='table' border='2'>
											<tr class='bold'>
												<td style='min-width:60%; background-color:#eee;'>Percentage</td>
												<td style='min-width:40%'>$f_percent</td>
											</tr>
										</table>
										</div>
										
										<div id='p' class='col-md-2'>
										<table class='table' border='2'>
											<tr class='bold'>
												<td style='min-width:60%; background-color:#eee;'>Grade</td>
												<td style='min-width:40%'>$f_grade</td>
											</tr>
										</table>
										</div>
										
										<div id='p' class='col-md-2'>
										<table class='table' border='2'>
											<tr class='bold'>
												<td style='min-width:60%;  background-color:#eee;'>Rank</td>
												<td style='min-width:40%'>__</td>
											</tr>
										</table>
										</div>
									</div>
									
									<div style='padding-left:30px;' class='row'>
		
			<div id='p' class='col-md-6'>
			<table border='2'>
				<tr class='bold'>
					<td colspan='3'>Co-Scholastic Area<br>(5 Point Grading Scale A,B,C)</td>
				</tr>
				<tr class='bold'>
					<td style='width:250px;' class='left'>Activity</td>
					<td style='width:60px;'>Grade</td>
				</tr>
				<tr>
					<td class='left'>Work Education</td>
					<td>$csa_m1</td>
				</tr>
				<tr>
					<td class='left'>Art Education</td>
					<td>$csa_m2</td>
					
				</tr>
				<tr>
					<td class='left'>Health & Physical Education</td>
					<td>$csa_m3</td>
					
				</tr>
				<tr>
					<td class='left'>Scientific Skills</td>
					<td>$csa_m4</td>
					
				</tr>
				<tr>
					<td class='left'>Thinking Skills</td>
					<td>$csa_m5</td>
				
				</tr>
				<tr>
					<td class='left'>Social Skills</td>
					<td>$csa_m6</td>
					
				</tr>
				<tr>
					<td class='left'>Yoga/NCC</td>
					<td>$csa_m7</td>
					
				</tr>
				<tr>
					<td class='left'>Sports</td>
					<td>$csa_m8</td>
					
				</tr>
			</table>
			</div>
			
			
			<div class='col-md-6'>
			<table border='2'>
				<tr class='bold'>
					<td colspan='3'>Discipline<br>(5 Point Grading Scale A,B,C)</td>
				</tr>
				<tr class='bold'>
					<td class='left'>Element</td>
					<td style='width:60px;'>Grade</td>
				</tr>
				<tr>
					<td class='left'>Regularity & Punctuality</td>
					<td>$d_m1</td>
					
				</tr>
				<tr>
					<td class='left'>Sincerity</td>
					<td>$d_m2</td>
					
				</tr>
				<tr>
					<td class='left'>Behaviour & Values</td>
					<td>$d_m3</td>
					
				</tr>
				<tr>
					<td class='left'>Respectfulness for Rules & Regulations</td>
					<td>$d_m4</td>
					
				</tr>
				<tr>
					<td class='left'>Attitude Towards Teachers</td>
					<td>$d_m5</td>
					
				</tr>
				<tr>
					<td class='left'>Attitude Towards School-mates</td>
					<td>$d_m6</td>
					
				</tr>
				<tr>
					<td class='left'>Attitude Towards Society</td>
					<td>$d_m7</td>
					
				</tr>
				<tr>
					<td class='left'>Attitude Towards Nstion</td>
					<td>$d_m8</td>
					
				</tr>
			</table>
		</div>
	</div>

						<div class='col-md-12 mtop'>
							
							<div id='p' class='col-md-5'>
								<table>
									<tr align='center'>
										<td>Attendance:</td>
										<td width= '100px' style='border-bottom: 1px solid black;'> <b> $attendance</b></td>
									</tr>
								</table>
							</div>
							
							<div id='p' class='col-md-7'>
								<table>
									<tr align='center'>
										<td>Remarks:</td>
										<td width='350px' style='border-bottom: 1px solid black;'><b>  $remarks</b> </td>
									</tr>
								</table>
							</div>
							
						</div>
							
								<div class='row'>
									<table style='margin-left: 80px; margin-top: 20px;' class='table-responsive t1'>
										<tr>
											<td><h4><b>Congratulations! Promoted to next Class.</b></h4></td>
										</tr>
									</table>
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