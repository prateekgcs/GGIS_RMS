<?php
session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
    require_once '../lib/PHPExcel.php';
    require_once '../lib/sql/conn.php';
    $conn = connect();
 ?>
  
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Result Analysis System</title>
	<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link href="../lib/css/style.css" rel="stylesheet">

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
				
					<div align='center'>
					<h2>VIEW RESULT</h2>
					</div>  		
  
<?php
		  
			  $output=" ";
                           
			  if(isset($_POST['view']))
              {
					$branch = $_POST['branch'];
					$sem = $_POST['sem'];
					$batch = $_POST['batch'];

					$tname = '0206'.$branch.$batch.$sem;

					$query = "SELECT * FROM `$tname`";
					
					$stmt = $conn->prepare($query);

					if(!($stmt->execute())) 
					  die("Error!");
					
					$output .= "  
					<table class='table table-striped table-responsive table-bordered' bordered='1'>";  
                     

				   while($row = $stmt->fetch(PDO::FETCH_ASSOC))  
				   {  
					   $sno = $row['s_no'];
					   $rollno = $row['roll_no'];
					   $name = $row['name'];
					   $s1 = $row['s1'];
					   $s2 = $row['s2'];
					   $s3 = $row['s3'];
					   $s4 = $row['s4'];
					   $s5 = $row['s5']; 
					   $s6 = $row['s6'];
					   $s7 = $row['s7'];
					   $s8 = $row['s8'];
					   $s9 = $row['s9'];
					   $s10 = $row['s10']; 
					   $s11 = $row['s11'];
					   $s12 = $row['s12'];
					   $s13 = $row['s13'];
					   $s14 = $row['s14'];
					   $s15 = $row['s15'];
					   $r_desc = $row['r_desc'];
					   $sgpa = $row['sgpa'];
					   $cgpa = $row['cgpa'];
					   $r_status = $row['r_status'];
					   $remarks = $row['remarks'];
						
						if($sno==0)
						{
							$output .= "<tr>
									<td><b>Sno</b></td>
									<td><b>$rollno</b></td>
									<td><b>$name</b></td>
									<td><b>$s1</b></td>
									<td><b>$s2</b></td>
									<td><b>$s3</b></td>
									<td><b>$s4</b></td>
									<td><b>$s5</b></td>
									<td><b>$s6</b></td>
									<td><b>$s7</b></td>
									<td><b>$s8</b></td>
									<td><b>$s9</b></td>
									<td><b>$s10</b></td>
									<td><b>$s11</b></td>
									<td><b>$s12</b></td>
									<td><b>$s13</b></td>
									<td><b>$s14</b></td>
									<td><b>$s15</b></td>
									<td><b>$r_desc</b></td>
									<td><b>$sgpa</b></td>
									<td><b>$cgpa</b></td>
									<td><b>$r_status</b></td>
									<td><b>$remarks</b></td>
								   </tr>";
						}  
						else
						{
					   $output .= "<tr>
									<td>$sno</td>
									<td>$rollno</td>
									<td>$name</td>
									<td>$s1</td>
									<td>$s2</td>
									<td>$s3</td>
									<td>$s4</td>
									<td>$s5</td>
									<td>$s6</td>
									<td>$s7</td>
									<td>$s8</td>
									<td>$s9</td>
									<td>$s10</td>
									<td>$s11</td>
									<td>$s12</td>
									<td>$s13</td>
									<td>$s14</td>
									<td>$s15</td>
									<td>$r_desc</td>
									<td>$sgpa</td>
									<td>$cgpa</td>
									<td>$r_status</td>
									<td>$remarks</td>
								   </tr>";
				   }  
				   }
				   $output .= "</table>";  	
					   echo $output;		   
		   }
			else if(isset($_POST['download']))
              {
					$branch = $_POST['branch'];
					$sem = $_POST['sem'];
					$batch = $_POST['batch'];

					$tname = '0206'.$branch.$batch.$sem;
					
					header("Location: ./result_download.php?tname=".$tname."");
			  }
			 
?>

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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="lib/js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="lib/js/bootstrap.js"></script>
</body>
</html>