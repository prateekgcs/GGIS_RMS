 <?php
 session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) 
	{
		die(header("location: ../index.php"));
	}
    require_once '../lib/ExcelToDB.php';
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
<div style="min-height: 350px;" class="container-fluid">
  <div class="row headmargin">		
		<?php
		
			if(isset($_POST['upload']) && $_FILES['file']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
			{
				$batch = $_POST['year'];
				//$sem = $_POST['sem'];
				$branch = $_POST['branch'];
				

				$tname="0206";
				$tname.=$branch;
				$tname.=$batch;
				//$tname.=$sem;

        //query to check sem and batch exists
        $query0 = "SELECT * FROM batch_info WHERE batch_year = ? AND branch = ?";
        $sql0 = $conn->prepare($query0);
        $sql0->bindParam(1,$batch);
        $sql0->bindParam(2,$branch);
        if(!($sql0->execute())) die(print_r($sql0->errorInfo()));
        $count = $sql0->rowCount();
        if($count == 0) die("<div style='font-size:20px' class='alert alert-info text-center'> <strong>Add Batch and Semester<strong><br/> Contact Administrator to add Batch and Semester</div> </div> </div> <hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");

				
        $tmp_name = $_FILES['file']['tmp_name'];
        $path="../Uploads/";
        $exten = ".xlsx";
        $filename = $path.$tname.$exten;

        //move uploaded file from temp location to Uploads folder
        if(!(move_uploaded_file($tmp_name, $filename))) die("Can't Upload File!");
				
          //upload excel to database
          UploadStudentInfo($tname);  

          printf("div style='font-size:20px' class='alert alert-success text-center'> <strong>Upload Successful!<strong><br/> Data has been successfully uploaded to the database.</div>");

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
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../lib/js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../lib/js/bootstrap.js"></script>
</body>
</html>
