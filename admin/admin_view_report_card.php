<?php
	/*session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
	require_once '../lib/sql/conn.php';
    	include("../lib/fusioncharts/fusioncharts.php");
	$conn = connect();*/

?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Download Result</title>
	<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../lib/css/style.css" rel="stylesheet">
	
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
				<img class="img-responsive" src="../lib/image/logo.png"/>
			</div>
		</div>
		
		<!--BODY-->	
		<div id='report'>
		<div class="container-fluid">
			<div class="ht col-md-10 col-md-offset-1" >
				
				<div class="headmargin" >
				
				<div class='row'>
				
					<div class="col-md-12">
						<table>
						<tr>
						<td width='15%'><img class='img img-responsive' src='../lib/image/cbse.jpg'/></td>
					
						<td><h3><b>Gyan Ganga International School</b></h3>
						<p>Affiliated to C.B.S.E., Delhi, Affiliation No. 1030147<br/>Wardhman Square, By pass Junction Bheraghat Road, P.O.-Tewar, Jabalpur- 482003 (M.P.)<br/>Phone: 9893040336, 9893286946, 9893304495<br/>Website: gyanganga.ac.in, E-mail: gyangangajabalpur@gmail.com</p></td>
				
						<td width='15%'><img class='img img-responsive' src='../lib/image/slogo.jpg'/></td>
						</tr>
						</table>
					</div>
					
				</div>	
				
				<div align='center' class="col-md-12">
					<h3>Report Card</h3>
					<h4>Class: IX <br/>Academic Session: 2017-18</h4>
				</div>
			
				<div id='p' class="col-md-6 mtop">
					<table>
						<tr>
							<td class='left'>Student's Name</td>
							<td min-width="80%" style="border-bottom: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						</tr>
						
						<tr>
							<td class='left'>Father's Name</td>
							<td min-width="80%" style="border-bottom: 1px solid black;"></td>
						</tr>
						<tr>
							<td class='left'>Mother's Name</td>
							<td min-width="80%" style="border-bottom: 1px solid black;"></td>
						</tr>
						<tr>
							<td class='left'>Date of Birth</td>
							<td min-width="80%" style="border-bottom: 1px solid black;"></td>
						</tr>
						<tr>
							<td class='left'>Address</td>
							<td min-width="80%" style="border-bottom: 1px solid black;"></td>
						</tr>
					</table>
			
				</div>
			
			<div id='p' class="col-md-4 mtop">
			
					<table>
						<tr align='center'>
							<td style="border: 1px solid black;">Roll No.</td>
							<td style="border: 1px solid black;">1</td>
						</tr>
						<tr>
							<td colspan='2'>&nbsp;</td>
						</tr>
						
						<tr>
							<td>Admission Number</td>
							<td width='50%' style="border-bottom: 1px solid black;"></td>
						</tr>
						
					</table>
					</div>
				
				
				<br/><br/>
				
				<div class='col-md-12 mtop'>
			
				<table class='table table-centered' border="2">
				<tr class='bold'>
					<td rowspan="2">SCHOLASTIC AREA</td>
					<td colspan="5" rowspan="2">SA 1</td>
					<td colspan="5" rowspan="2">SA 2</td>
					<td colspan="3">OVERALL</td>
				</tr>
				<tr class='bold'>
					<td colspan="3">Term 1 (50)+Term 2 (50)</td>	
				</tr>
				<tr class='bold'>
					<td rowspan="2">Subjects</td>
					<td>Per. Test</td>
					<td>Note Book</td>
					<td>SEA</td>
					<td>Half Yearly</td>
					<td>Total</td>
					<td>Per. Test</td>
					<td>Note Book</td>
					<td>SEA</td>
					<td>Half Yearly</td>
					<td>Total</td>
					<td>Grand Total</td>
					<td rowspan="2">Grade</td>
					<td rowspan="2">Rank</td>
				</tr>
				<tr class='bold'>
					<td>10</td>
					<td>5</td>
					<td>5</td>
					<td>80</td>
					<td>100</td>
					<td>10</td>
					<td>5</td>
					<td>5</td>
					<td>80</td>
					<td>100</td>
					<td>100</td>
				</tr>
				<tr>
					<td class='left'>English</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Hindi</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Maths</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Science</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Social Studies</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="14"><b>8 Point Grading Scale: </b>A1(91% - 100%), A2(81% - 90%), B1(71% - 80%), B2(61% - 70%), C1(51%-60%), C2(41% - 50%), D(33% - 40%), E(32% & Below) *SE=Sub Enrichment</b></td>
				</tr>
			</table>
			</div>
			
			<br/>
			<div id='p' class='col-md-12'>
				<div id='p' style="margin-left: 15px;" class='col-md-4'>
					<table class='table' border="2">
						<tr class='bold'>
							<td style="min-width:70%; background-color:#eee;">Overall Marks</td>
							<td style="min-width:30%">521.5/600</td>
						</tr>
					</table>
				</div>
				
				<div id='p' class='col-md-4'>
				<table class='table' border="2">
					<tr class='bold'>
						<td style="min-width:60%; background-color:#eee;">Percentage</td>
						<td style="min-width:40%">86.92</td>
					</tr>
				</table>
				</div>
				
				<div id='p' class='col-md-2'>
				<table class='table' border="2">
					<tr class='bold'>
						<td style="min-width:60%; background-color:#eee;">Grade</td>
						<td style="min-width:40%">A2</td>
					</tr>
				</table>
				</div>
				
				<div id='p' class='col-md-2'>
				<table class='table' border="2">
					<tr class='bold'>
						<td style="min-width:60%;  background-color:#eee;">Rank</td>
						<td style="min-width:40%">1</td>
					</tr>
				</table>
				</div>
			</div>
			
		
			<div id='p' class='col-md-6 mtop'>
			<table border="2">
				<tr class='bold'>
					<td colspan="3">Co-Scholastic Area<br>(3 Point Grading Scale A,B,C)</td>
				</tr>
				<tr class='bold'>
					<td style="width:250px;" class='left'>Activity</td>
					<td style="width:60px;">T1</td>
					<td style="width:60px;">T2</td>
				</tr>
				<tr>
					<td class='left'>Work Education</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Art Education</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Health & Physical Education</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Scientific Skills</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Thinking Skills</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Social Skills</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Yoga/NCC</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Sports</td>
					<td></td>
					<td></td>
				</tr>
			</table>
			</div>
			
			
			<div id='p' class='col-md-6 mtop'>
			<table border="2">
				<tr class='bold'>
					<td colspan="3">Discipline<br>(3 Point Grading Scale A,B,C)</td>
				</tr>
				<tr class='bold'>
					<td class='left'>Element</td>
					<td style="width:60px;">T1</td>
					<td style="width:60px;">T2</td>
				</tr>
				<tr>
					<td class='left'>Regularity & Punctuality</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Sincerity</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Behaviour & Values</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Respectfulness for Rules & Regulations</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Attitude Towards Teachers</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Attitude Towards School-mates</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Attitude Towards Society</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class='left'>Attitude Towards Nstion</td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</div>
	

	<div class="col-md-12 mtop">
		
		<div id='p' class='col-md-5'>
		<table>
			<tr>
				<td>Attendance</td>
				<td min-width='70%' style="border-bottom: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
		</table>
		</div>
		
		<div id='p' class='col-md-7'>
		<table>
			<tr>
				<td>Remarks</td>
				<td min-width='100%' style="border-bottom: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
		</table>
		</div>
	</div>
	
		<div id='p' class="col-md-12 mtop">
		
			<h4><b>Congratulations! Promoted to next Class.</b></h4>
			
			<div class='row headmargin'>
			<table class="table-responsive table-centered" width="100%" >
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
	
	<script src="../lib/js/jquery.min.js"></script>
	<script src="../lib/js/bootstrap.js"></script>
	
		
</body>

</html>
	
		<?php
			
			/*if(isset($_POST['view']))
			{
			$eno = strtolower($_POST['eno']);
			$rno = strtoupper($_POST['eno']);
			$batch_year = substr($eno, 6, 3);
			$branch = substr($eno, 4, 2);
			$query="SELECT * FROM batch_info WHERE batch_year = '$batch_year' AND branch = '$branch'";
			$sql=$conn->prepare($query);
			if(!($sql->execute()))
			{
				die("Error1");
			}
			
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			
			$table = "<table class='table table-centered table-striped table-bordered'> <tr> <td><b>Semester</b></td> <td><b>SGPA</b></td> <td><b>CGPA</b></td> <td><b>Result</b></td> <td><b>Marksheet</b></td> </tr>";
			
			$arrData = array("chart" => array(
					  "caption" => "OVERALL RESULT",
					  "subcaption" => "$rno",
					  "showValues" => "1",
					  "baseFontSize" => "15",
					  "showBorder"=> "1",
					  "outCnvBaseFontSize" => "18",
					  "borderColor"=> "#666666",
					  "borderThickness"=> "4",
					  "borderAlpha"=> "80",
					  "yAxisMaxValue"=> "10",
					  "theme" => "fint"
					 )
				    );
        	        $arrData["data"] = array();
			
			for($i=8 ; $i>0 ; $i--)
			{
				if ( $row[$i] == 2 )
				{
						$j=$i;
						$table_name = substr($eno, 0, 9);
						$table_name .= $i;
						$query = "SELECT * FROM `$table_name` WHERE roll_no = '$eno'";
						//echo $query;
						$sql=$conn->prepare($query);
						if(!($sql->execute()))
						{
							die("Error2");
						}
						
						$rowtwo = $sql->fetch(PDO::FETCH_ASSOC);
						
						$sgpa=$rowtwo['sgpa'];
						$cgpa=$rowtwo['cgpa'];
						$rstatus=$rowtwo['r_status'];
						
						array_push($arrData["data"], array(
							"label" => "SEM $i",
							"value" => "$cgpa"
						)
						);						
						
						$table .= "<tr><td>$i</td><td>$sgpa</td><td>$cgpa</td><td>$rstatus</td><td><a href='./student_view_marksheet.php?sem=$j&eno=$eno'>View</a></td></tr>";
				}					
			}
			
			$table .="</table>";
			
			echo $table;
			
			$jsonEncodedData = json_encode($arrData);
				
				$columnChart = new FusionCharts("column3d", "myFirstChart" , 750, 550, "chart-container", "json", $jsonEncodedData);

				$columnChart->render();
			}*/
		?>