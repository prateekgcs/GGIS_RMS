<?php
	session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
    	require_once('../lib/sql/conn.php');
	include("../lib/fusioncharts/fusioncharts.php");
    	$conn = connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Result Analysis System</title>
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
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
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
  </div>

</nav>
<div class="container-fluid">
  <div class="row">
		
		
		<div class='col-lg-4 '>
		<div align='center' class='jumbotron'>

			<h3>VIEW RESULT</h3>
			<hr size='30'>
			
		<form action='' method='POST'>
		
			<select class='form-control' name='batch'>
				  <option value="131">2013-2017</option>
                     		<option value="141">2014-2019</option>
				<option value ='151'>2015-2019</option>
				<option value ='161'>2016-2020</option>
				<option value ='171'>2017-2021</option>
				<option value ='181'>2018-2022</option>
			</select>
			
			<br/>
			
			<select class='form-control' name='branch' id='branch'>
                       <option value="CE">CE</option>
                       <option value="CS">CSE</option>
		       <option value="EC">EC</option>
		       <option value="EE">EE</option>
		       <option value="EX">EX</option>
		       <option value="IT">IT</option>
		       <option value="ME">ME</option>
			</select>
			
			<br/>
			
			<select class='form-control' name='sem'>
				<option value ='1'>Semester 1</option>
				<option value ='2'>Semester 2</option>
				<option value ='3'>Semester 3</option>
				<option value ='4'>Semester 4</option>
				<option value ='5'>Semester 5</option>
				<option value ='6'>Semester 6</option>
				<option value ='7'>Semester 7</option>
				<option value ='8'>Semester 8</option>
			</select>
			
			<br/>
			
			<button type='submit' style="font-size: 16px; font-family: franklin gothic book" class='btn btn-block btn-success' name='view_all'>View Overall Result</button>
			
			<button type='submit' style="font-size: 16px; font-family: franklin gothic book" class='btn btn-block btn-success' name='view_sub'>View Subject Wise Result</button>
			
			<button type='submit' style="font-size: 16px; font-family: franklin gothic book" class='btn btn-block btn-success' name='view_grade'>View Subject/Grade Wise</button>
			
			<button type='submit' style="font-size: 16px; font-family: franklin gothic book" class='btn btn-block btn-success' name='top10'>View Top 10 (SGPA)</button>
		
		<button type='submit' style="font-size: 16px; font-family: franklin gothic book" class='btn btn-block btn-success' name='top10c'>View Top 10 (CGPA)</button>
		</form>
	
	</div>
		</div>
	
	<div align='center' class='col-md-8 subhead' id="chart-container">
	
<?php

if(isset($_POST['view_all']))
    {
			$tname="0206";
			$branch=strtolower($_POST['branch']);
			$batch=$_POST['batch'];
			$sem=$_POST['sem'];
			
			$tname.=$branch;
			$tname.=$batch;
			$tname.=$sem;
			
			$query = "SELECT r_status, COUNT(*) AS COUNT FROM `$tname` WHERE r_status NOT IN ('Result Status') GROUP BY r_status";
			
			$sql = $conn->prepare($query);
			
			$branch=strtoupper($branch);
			
			if(!($sql->execute())) die ("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-info text-center'> <strong>Result does not exist!<strong><br/> The result for requested semester has not been uploaded.</div> </div>    </div></div></div></div></div><hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
			
			if ($sql->rowCount() > 0) 
			{
				$arrData = array("chart" => array(
					  "caption" => "OVERALL RESULT",
					  "subcaption" => "$branch SEM $sem",
					  "showValues" => "1",
					  "baseFontSize" => "15",
					  "showBorder"=> "1",
					  "outCnvBaseFontSize" => "25",
					  "borderColor"=> "#666666",
					  "borderThickness"=> "4",
					  "borderAlpha"=> "80",
					  "theme" => "fint"
					 )
				    );
        	          $arrData["data"] = array();
			 $count=0;		
			   while($row = $sql->fetch(PDO::FETCH_ASSOC)) 
			   {
			   	
					array_push($arrData["data"], array(
					"label" => $row["r_status"],
					"value" => $row["COUNT"]
					)
					);
			    }
				
				$jsonEncodedData = json_encode($arrData);
				
				$columnChart = new FusionCharts("doughnut3d", "myFirstChart" , 750, 450, "chart-container", "json", $jsonEncodedData);

				$columnChart->render();
			}
	}
	
	else if(isset($_POST['view_sub']))
    {
			$tname="0206";
			$branch=strtolower($_POST['branch']);
			$batch=$_POST['batch'];
			$sem=$_POST['sem'];
			
			$tname.=$branch;
			$tname.=$batch;
			$tname.=$sem;
			
			$queryone = "SELECT * FROM `$tname` WHERE s_no = 0";
			
			$sqlone = $conn->prepare($queryone);
			
			$branch=strtoupper($branch);
			
			if(!($sqlone->execute())) die ("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-info text-center'> <strong>Result does not exist!<strong><br/> The result for requested semester has not been uploaded.</div> </div>    </div></div></div></div></div><hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
			
			$row = $sqlone->fetch(PDO::FETCH_NUM);
			$k=0;
			$theory = array();
			
			for($i=1;$i<=15;$i++)
			{
				$j= $i+2;
				if(strpos($row[$j], '[T]') !== false)
				{
					$theory[$k]=$row[$j];
					$theory_index[$k]=$j;
					$k++;
				}
			}
			
			$arrData = array("chart" => array(
					  "caption" => "SUBJECT WISE RESULT",
					  "subcaption" => "$branch SEM $sem",
					  "yAxisMaxValue"=> "100",
					  "showValues" => "1",
					  "baseFontSize" => "15",
					  "showBorder"=> "1",
					  "outCnvBaseFontSize" => "15",
					  "borderColor"=> "#666666",
					  "borderThickness"=> "4",
					  "borderAlpha"=> "80",
					  "theme" => "fint"
					 )
				    );
					
        	$arrData["data"] = array();
					
			$query1 = "SELECT COUNT(*) AS COUNT FROM `$tname`";
				
				$sql1 = $conn->prepare($query1);
				
				if(!$sql1->execute()) die("ERROR");
				
				$row1 = $sql1->fetch(PDO::FETCH_ASSOC);
				
				$total=$row1["COUNT"]-1;
				
			for($i=0 ; $i<$k ; $i++)
			{
				$j=$i+1;
				$query = "SELECT COUNT(*) AS COUNT FROM `$tname` WHERE s$j NOT IN ('F','F(ABS)','F (ABS)') ";
				
				$sql = $conn->prepare($query);
				
				if(!$sql->execute()) die("ERROR");
				
				$row = $sql->fetch(PDO::FETCH_ASSOC);
				
				$pass=$row["COUNT"]-1;
				$per = round((($pass/$total) * 100),2);
				
				array_push($arrData["data"], array(
					"label" => $theory[$i],
					"value" => $per
					)
					);
			}
			
				//echo json_encode($arrData);
				$jsonEncodedData = json_encode($arrData);
				
				$columnChart = new FusionCharts("column3d", "all_subjects" , 750, 450, "chart-container", "json", $jsonEncodedData);

				$columnChart->render();
	}
	
	else if(isset($_POST['top10']))
    {
			$tname="0206";
			$branch=strtolower($_POST['branch']);
			$batch=$_POST['batch'];
			$sem=$_POST['sem'];
			
			$tname.=$branch;
			$tname.=$batch;
			$tname.=$sem;
			
			$queryone = "SELECT * FROM `$tname` ORDER BY sgpa DESC LIMIT 10";
			
			$sqlone = $conn->prepare($queryone);
			
			$branch=strtoupper($branch);
			
			if(!($sqlone->execute())) die ("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-info text-center'> <strong>Result does not exist!<strong><br/> The result for requested semester has not been uploaded.</div> </div>    </div></div></div></div></div><hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
				
			$table = "<table class='table table-centered table-striped table-bordered'> <tr> <td><b>S.no</b></td> <td><b>Name</b></td> <td><b>SGPA</b></td> <td><b>CGPA</b></td></tr>";
			
			for($i=1 ; $i<=10 ; $i++)
			{
				$rowtwo = $sqlone->fetch(PDO::FETCH_ASSOC);
						
						$sgpa=$rowtwo['sgpa'];
						$cgpa=$rowtwo['cgpa'];
						$name=$rowtwo['name'];
						$dname=ucwords(strtolower($name));
						
						$table .= "<tr><td>$i</td><td>$dname</td><td>$sgpa</td><td>$cgpa</td></tr>";
			}
			
			$table .= "</table>";
			echo "<h3 class='text_center'>TOP 10 STUDENTS BY SGPA</h3><br/>";
			echo $table;
			
	}
	else if(isset($_POST['top10c']))
    {
			$tname="0206";
			$branch=strtolower($_POST['branch']);
			$batch=$_POST['batch'];
			$sem=$_POST['sem'];
			
			$tname.=$branch;
			$tname.=$batch;
			$tname.=$sem;
			
			$queryone = "SELECT * FROM `$tname` ORDER BY cgpa DESC LIMIT 10";
			
			$sqlone = $conn->prepare($queryone);
			
			$branch=strtoupper($branch);
			
			if(!($sqlone->execute())) die ("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-info text-center'> <strong>Result does not exist!<strong><br/> The result for requested semester has not been uploaded.</div> </div>    </div></div></div></div></div><hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
				
			$table = "<table class='table table-centered table-striped table-bordered'> <tr> <td><b>S.no</b></td> <td><b>Name</b></td> <td><b>CGPA</b></td></tr>";
			
			for($i=1 ; $i<=10 ; $i++)
			{
				$rowtwo = $sqlone->fetch(PDO::FETCH_ASSOC);
						
						$cgpa=$rowtwo['cgpa'];
						$name=$rowtwo['name'];
						$dname=ucwords(strtolower($name));
						
						$table .= "<tr><td>$i</td><td>$dname</td><td>$cgpa</td></tr>";
			}
			
			$table .= "</table>";
			echo "<h3 class='text_center'>TOP 10 STUDENTS BY CGPA</h3><br/>";
			echo $table;
			
	}
	else if(isset($_POST['view_grade']))
    {
			$tname="0206";
			$branch=strtolower($_POST['branch']);
			$batch=$_POST['batch'];
			$sem=$_POST['sem'];
			
			$tname.=$branch;
			$tname.=$batch;
			$tname.=$sem;
			
			$table = "<table class='table table-centered table-striped table-bordered'> <tr> <td><b>S.no</b></td> <td><b>Subject</b></td> <td><b>A+</b></td> <td><b>A</b></td> <td><b>B+</b></td> <td><b>B</b></td> <td><b>C+</b></td> <td><b>C</b></td> <td><b>D</b></td> <td><b>D##</b></td> <td><b>F</b></td> <td><b>F(ABS)</b></td><td><b>A+##</b></td> <td><b>A##</b></td> <td><b>B+##</b></td> <td><b>B##</b></td> <td><b>C+##</b></td> <td><b>C##</b></td> </tr>";
			
			for($i=1 ; $i<=15 ; $i++)
			{
			
			$queryone = "SELECT s$i FROM `$tname` WHERE s_no=0";
			
			$sqlone = $conn->prepare($queryone);
			
			if(!($sqlone->execute())) die ("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-info text-center'> <strong>Result does not exist!<strong><br/> The result for requested semester has not been uploaded.</div> </div>    </div></div></div></div></div><hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
				
			$rowtwo = $sqlone->fetch(PDO::FETCH_NUM);
			
       		$subject = $rowtwo[0];
			
			if($subject !== '' && $subject !== "S $i" && $subject !== "S$i")
			{
			
			$grade = array("A+"=>"0","A"=>"0","B+"=>"0","B"=>"0","C+"=>"0","C"=>"0","D"=>"0","D##"=>"0","F"=>"0","F (ABS)"=>"0","A+##"=>"0","A##"=>"0","B+##"=>"0","B##"=>"0","C+##"=>"0","C##"=>"0");
			
			$queryone = "SELECT s$i,COUNT(*) AS COUNT FROM `$tname` GROUP BY s$i";
			
			$sqlone = $conn->prepare($queryone);
			
			if(!($sqlone->execute())) die ("<div style='min-height: 200px;'><div style='font-size:20px; margin-top: 80px;' class='alert alert-info text-center'> <strong>Result does not exist!<strong><br/> The result for requested semester has not been uploaded.</div> </div>    </div></div></div></div></div><hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
				
			while($rowtwo = $sqlone->fetch(PDO::FETCH_ASSOC))
			{
				$g=$rowtwo["s$i"];
				$c=$rowtwo["COUNT"];
				$grade["$g"]="$c";
			}
						
			$table .= "<tr> <td>$i</td> <td>$subject</td> <td>{$grade['A+']}</td> <td>{$grade['A']}</td> <td>{$grade['B+']}</td> <td>{$grade['B']}</td> <td>{$grade['C+']}</td> <td>{$grade['C']}</td> <td>{$grade['D']}</td> <td>{$grade['D##']}</td> <td>{$grade['F']}</td> <td>{$grade['F (ABS)']}</td><td>{$grade['A+##']}</td> <td>{$grade['A##']}</td> <td>{$grade['B+##']}</td> <td>{$grade['B##']}</td> <td>{$grade['C+##']}</td> <td>{$grade['C##']}</td> </tr>";
			}
			}
			$table .= "</table>";
			echo "<h3>GRADE WISE RESULT</h3><h3>$tname</h3>";
			echo $table;
	}
?>

</div>

</div>

</div>
			
		</div>
  <hr/>
  <div class="row">
 <div class="footer" align="center">
<br/>
      <p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p>
    </div>
  </div>
  <hr>
</div>

<script src="../lib/js/jquery.min.js"></script>
<script src="../lib/js/bootstrap.js"></script>

</body>
</html>