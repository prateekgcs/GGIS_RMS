<?php
session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}

	require_once '../lib/sql/conn.php';
    $conn = connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=SELECT * FROM `0206CS1511`-width, initial-scale=1">
	<title>Student View</title>
	<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../lib/css/style.css" rel="stylesheet">
	
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
	<img class="img-circle img-responsive" width="50%" src="../lib/image/logo.jpg"/>
	</div>
	 <div class="col-sm-9" align="center">
		<h2 style="color: #fff;">GYAN GANGA INTERNATIONAL SCHOOL</h2>
		<h3 style="color: #fff;">RESULT ANALYSIS SYSTEM</h3>
	 </div>
    <div class="collapse navbar-collapse" id="defaultNavbar1">    
      <ul class="nav navbar-nav navbar-right">
         <li><a href="./admin_dashboard.php">Dashboard</a></li>
     
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">
 		
		<div class="col-md-8 col-md-offset-2">
		<div id='print'>
		<div align='center'>
		<h4>RESULT ANALYSIS SYSTEM</h4>
		<h4>STUDENT MARKSHEET</h4>
		<br/>
		</div>
		<?php
			
			$sem = $_GET['sem'];
			$eno = strtolower($_GET['eno']);
			$table_name = substr($eno, 0, 9);
			$table_name .=$sem;
			
			$query = "SELECT * FROM `$table_name` WHERE roll_no = '$eno'";
			$sql=$conn->prepare($query);
						
				if(!($sql->execute()))
				{
					die("Error");
				}
				
			$rowtwo = $sql->fetch(PDO::FETCH_NUM);		
			
			$info = "<table class='table table-striped'>";
			$name = $rowtwo[2];
			
			$info .="<tr><td><b>Name</b></td><td>$name</td></tr>";
			$info .="<tr><td><b>Enrollment Number</b></td><td>$eno</td></tr>";
			$info .="<tr><td><b>Semester</b></td><td>$sem</td></tr>";
			$info .="</table>";
			
			$res = "<table class='table table-striped'>";
			$sgpa = $rowtwo[19];
			$cgpa = $rowtwo[20];
			$rstatus = $rowtwo[21];
			
			$res .="<tr><td><b>SGPA</b></td><td><b>$sgpa</b></td></tr>";
			$res .="<tr><td><b>CGPA</b></td><td><b>$cgpa</b></td></tr>";
			$res .="<tr><td><b>RESULT</b></td><td><b>$rstatus</b></td></tr>";
			$res .="</table>";
			
			$queryone = "SELECT * FROM `$table_name` WHERE s_no=0";
			$sqlone=$conn->prepare($queryone);
						
				if(!($sqlone->execute()))
				{
					die("Error");
				}
				
			$rowone = $sqlone->fetch(PDO::FETCH_NUM);
			
			$table = "<table class='table table-centered table-striped table-bordered'> <tr> <td><b>S. No.</b></td> <td><b>Subject Code</b></td> <td><b>Grade</b></td></tr>";
			
			for($i = 3 ; $i<=17 ; $i++)
			{
				$subcode=$rowone[$i];
				$grade=$rowtwo[$i];
				$j=$i-2;
				if(!($grade==''))
				{
				$table .= "<tr><td>$j</td><td>$subcode</td><td>$grade</td></tr>";
				}
			
			}
			
			$table .="</table>";
			echo $info;
			echo $table;
			echo $res;
			
		?>
		</div>
		</div>
		<div class='col-md-6 col-md-offset-3'>
			<button class='btn btn-danger btn-block' onclick="printDiv('print')">Print</button>
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
<script>
	function printDiv(divName) {
	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;
	
	     document.body.innerHTML = printContents;
	
	     window.print();
	
	     document.body.innerHTML = originalContents;
	}
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="lib/js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="lib/js/bootstrap.js"></script>
</body>
</html>
