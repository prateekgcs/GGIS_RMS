<?php
	/*session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../../index.php"));
	}
	require_once '../../lib/sql/conn.php';
    	include("../../lib/fusioncharts/fusioncharts.php");
	$conn = connect();*/

?>

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
				
						<div align='center' class="col-md-12">
							<h3>Report Card</h3>
							<h4>Class: IX <br/>Academic Session: 2017-18 <br/><b>Subject Enrichment-1</b></h4>
						</div>
			
						<div class='row'>
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
						</div>
				
				
						<div class='col-md-12 mtop'>
						
							<table class='table table-centered' border="2">
								<tr>
									<td class='bold'>SCHOLASTIC AREA</td>
									<td class='bold'>Periodic Test (Term 1)</td>
								</tr>
								<tr>
									<td class='bold'>Subjects</td>
									<td class='bold'>MM 10</td>
								</tr>
								<tr>
									<td>English</td>
									<td></td>
								</tr>
								<tr>
									<td>Hindi</td>
									<td></td>
								</tr>
								<tr>
									<td>Maths</td>
									<td></td>
								</tr>
								<tr>
									<td>Science</td>
									<td></td>
								</tr>
								<tr>
									<td>Social Science</td>
									<td></td>
								</tr>
								
								<tr>
									<td>Total</td>
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
	
	<script src="../../lib/js/jquery.min.js"></script>
	<script src="../../lib/js/bootstrap.js"></script>
	
		
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