<?php
session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
	require_once '../lib/sql/conn.php';
    include("../lib/fusioncharts/fusioncharts.php");
	$conn = connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student View</title>
	<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../lib/css/style.css" rel="stylesheet">
	<script type="text/javascript" src="../lib/fusioncharts/js/fusioncharts.js"></script>
	<script type="text/javascript" src="../lib/fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
	
	<style>
		td
		{
			text-align: center;
		}
	</style>
	
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    </div>
	
	<div align="center" class="col-sm-3">
	<img class="img-circle img-responsive" width="50%" src="lib/image/logo.jpg"/>
	</div>
	 <div class="col-sm-9" align="center">
		<h2 style="color: #fff;">GYAN GANGA INTERNATIONAL SCHOOL</h2>
		<h3 style="color: #fff;">RESULT ANALYSIS SYSTEM</h3>
	 </div>
    <div class="collapse navbar-collapse" id="defaultNavbar1">    
      <ul class="nav navbar-nav navbar-right">
         <li><a href="./professor_dashboard.php">Dashboard</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">
 
		<div class="row" align="center">
			<h2>VIEW RESULT</h2>
			<br/>
		</div>
			
		<div class="col-md-8 col-md-offset-2 subhead">
		<?php
			
			if(isset($_POST['view']))
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
			}
		?>
		</div>
		
		<div align='center' class='subhead' id="chart-container">
		</div>
    </div>
  </div>
  <hr>
  <div class="row">
 <div class="footer" align="center">
<br/>
      <p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p>
    </div>
  </div>
  <hr>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="lib/js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="lib/js/bootstrap.js"></script>
</body>
</html>
