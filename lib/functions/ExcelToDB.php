 <?php
		
			/*if(isset($_POST['upload']) && $_FILES['file']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
			{
				$batch = $_POST['year'];
				$sem = $_POST['sem'];
				$branch = $_POST['branch'];
				

				$tname="0206";
				$tname.=$branch;
				$tname.=$batch;
				$tname.=$sem;

        //query to check sem and batch exists
        $query0 = "SELECT * FROM batch_info WHERE batch_year = ? AND branch = ? AND (`$sem` = 1 OR `$sem` = 2)";
        $sql0 = $conn->prepare($query0);
        $sql0->bindParam(1,$batch);
        $sql0->bindParam(2,$branch);
        if(!($sql0->execute())) die(print_r($sql0->errorInfo()));
        $count = $sql0->rowCount();
        if($count == 0) die("<div style='font-size:20px' class='alert alert-info text-center'> <strong>Add Batch and Semester<strong><br/> Contact Administrator to add Batch and Semester</div> </div> </div> <hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");

        $query1 = "SELECT * FROM batch_info WHERE batch_year = ? AND branch = ? AND `$sem` = 2";
        $sql1 = $conn->prepare($query1);
        $sql1->bindParam(1,$batch);
        $sql1->bindParam(2,$branch);
        if(!($sql1->execute())) die(print_r($sql1->errorInfo()));
        $count = $sql1->rowCount();
        if($count > 0) die("<div style='font-size:20px' class='alert alert-info text-center'> <strong>Data Already Exists!<strong><br/> Result for selected batch has been uploaded earlier. Please truncate existing data in order to upload new data.</div> </div> </div> <hr> <div class='row'> <div class='footer' align='center'><br/><p>Copyright &copy; &middot;Gyan Ganga Group of Institutions&middot; All Rights Reserved</p></div></div><hr></div>");
				
        $tmp_name = $_FILES['file']['tmp_name'];
        $path="../Uploads/";
        $exten = ".xlsx";
        $filename = $path.$tname.$exten;

        //move uploaded file from temp location to Uploads folder
        if(!(move_uploaded_file($tmp_name, $filename))) die("Can't Upload File!");
				
          //upload excel to database
          UploadExcel($tname);  

          $query2 = "UPDATE batch_info SET `$sem` = 2 WHERE batch_year = ? AND branch = ?";
          $sql2 = $conn->prepare($query2);
          $sql2->bindParam(1,$batch);
          $sql2->bindParam(2,$branch);
          if(!($sql2->execute())) die(print_r($sql2->errorInfo()));

          printf("<div style='font-size:20px' class='alert alert-success text-center'> <strong>Upload Successful!<strong><br/> Data has been successfully uploaded to the database.</div>");

      }*/
			
?>
 
 
 <?php
	
	// CLASS 1-4
	
    function UploadResult1to4pt($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `total` DOUBLE NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
            $total = $worksheet->getCell('H'.$row)->getValue();
            $attendance = $worksheet->getCell('I'.$row)->getValue();
            $remarks = $worksheet->getCell('J'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','$total','$attendance','$remarks')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResult1to4sa($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `total` DOUBLE NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
            $total = $worksheet->getCell('H'.$row)->getValue();
            $attendance = $worksheet->getCell('I'.$row)->getValue();
            $remarks = $worksheet->getCell('J'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','$total','$attendance','$remarks')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResult1to4ns($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `total` DOUBLE NOT NULL) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
            $total = $worksheet->getCell('H'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','$total')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }

	function UploadResult1to4sea($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `total` DOUBLE NOT NULL) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
            $total = $worksheet->getCell('H'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','$total')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	//CLASS 5
	
	function UploadResult5pt($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL ,`total` DOUBLE NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
            $total = $worksheet->getCell('I'.$row)->getValue();
            $attendance = $worksheet->getCell('J'.$row)->getValue();
            $remarks = $worksheet->getCell('K'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','$total','$attendance','$remarks')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResult5ns($tablename)
    {
		require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL, `total` DOUBLE NOT NULL) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
            $total = $worksheet->getCell('I'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','$total')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }

	function UploadResult5sa($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL ,`total` DOUBLE NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
            $total = $worksheet->getCell('I'.$row)->getValue();
            $attendance = $worksheet->getCell('J'.$row)->getValue();
            $remarks = $worksheet->getCell('K'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','$total','$attendance','$remarks')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResult5sea($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL, `total` DOUBLE NOT NULL) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
            $total = $worksheet->getCell('I'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','$total')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	// CLASS 6-9
	
		function UploadResult6to9pt($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL ,`total` DOUBLE NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
            $total = $worksheet->getCell('I'.$row)->getValue();
            $attendance = $worksheet->getCell('J'.$row)->getValue();
            $remarks = $worksheet->getCell('K'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','$total','$attendance','$remarks')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResult6to9ns($tablename)
    {
		require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL, `total` DOUBLE NOT NULL) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
            $total = $worksheet->getCell('I'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','$total')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResult6to9sea($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL, `total` DOUBLE NOT NULL) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
            $total = $worksheet->getCell('I'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','$total')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResult6to9ae($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL ,`total` DOUBLE NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
            $total = $worksheet->getCell('I'.$row)->getValue();
            $attendance = $worksheet->getCell('J'.$row)->getValue();
            $remarks = $worksheet->getCell('K'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','$total','$attendance','$remarks')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	// CLASS 11
	
	function UploadResult11c($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL , `s7` DOUBLE NOT NULL , `s8` DOUBLE NOT NULL, `s9` DOUBLE NOT NULL ,`total` DOUBLE NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
			$s7 = $worksheet->getCell('I'.$row)->getValue();
			$s8 = $worksheet->getCell('J'.$row)->getValue();
			$s9 = $worksheet->getCell('K'.$row)->getValue();
            $total = $worksheet->getCell('L'.$row)->getValue();
            $attendance = $worksheet->getCell('M'.$row)->getValue();
            $remarks = $worksheet->getCell('N'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','s7','s8','s9','$total','$attendance','$remarks')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResult11s($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` DOUBLE NOT NULL , `s2` DOUBLE NOT NULL , `s3` DOUBLE NOT NULL , `s4` DOUBLE NOT NULL , `s5` DOUBLE NOT NULL , `s6` DOUBLE NOT NULL , `s7` DOUBLE NOT NULL , `s8` DOUBLE NOT NULL ,`total` DOUBLE NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
			$s6 = $worksheet->getCell('H'.$row)->getValue();
			$s7 = $worksheet->getCell('I'.$row)->getValue();
			$s8 = $worksheet->getCell('J'.$row)->getValue();
			$total = $worksheet->getCell('K'.$row)->getValue();
            $attendance = $worksheet->getCell('L'.$row)->getValue();
            $remarks = $worksheet->getCell('M'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','s6','s7','s8','$total','$attendance','$remarks')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResultcos($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `sch_no` VARCHAR(5) NOT NULL , `name` VARCHAR(50) NOT NULL , `f1` VARCHAR(5) NOT NULL , `f2` VARCHAR(5) NOT NULL , `f3` VARCHAR(5) NOT NULL , `f4` VARCHAR(5) NOT NULL , `f5` VARCHAR(5) NOT NULL , `f6` VARCHAR(5) NOT NULL , `f7` VARCHAR(5) NOT NULL , `f8` VARCHAR(5) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
            $total = $worksheet->getCell('H'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','$total')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function UploadResultdis($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		  
		  $link = connect();
          
		  $queryinsert = " CREATE TABLE $tablename ( `sch_no` VARCHAR(5) NOT NULL , `name` VARCHAR(50) NOT NULL , `f1` VARCHAR(5) NOT NULL , `f2` VARCHAR(5) NOT NULL , `f3` VARCHAR(5) NOT NULL , `f4` VARCHAR(5) NOT NULL , `f5` VARCHAR(5) NOT NULL , `f6` VARCHAR(5) NOT NULL , `f7` VARCHAR(5) NOT NULL , `f8` VARCHAR(5) NOT NULL ) ";
		  
		  $sqlcreate = $link->prepare($querycreate);
		  if(!($sqlinsert->execute())) die ("Error!");
		  
		  $path="../Uploads/";
          $exten = ".xlsx";
          $class = $classname;
          $filename = $path.$class.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 6; $row<=$lastRow; $row++)
          {
            $rollno = $worksheet->getCell('A'.$row)->getValue();
            $name = $worksheet->getCell('B'.$row)->getValue();
            $s1 = $worksheet->getCell('C'.$row)->getValue();
            $s2 = $worksheet->getCell('D'.$row)->getValue();
            $s3 = $worksheet->getCell('E'.$row)->getValue();
            $s4 = $worksheet->getCell('F'.$row)->getValue();
            $s5 = $worksheet->getCell('G'.$row)->getValue();
            $total = $worksheet->getCell('H'.$row)->getValue();
            
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $tablename VALUES ('$rollno','$name','$s1','$s2','$s3','$s4','$s5','$total')";  
				$sqlinsert = $link->prepare($queryinsert);
				if(!($sqlinsert->execute())) die ("Error!");
			}
          }
    }
	
	function CreateStudentInfo($tablename)
    {
        require_once '../sql/conn.php';
		$link = connect();
          
		$queryinsert = " CREATE TABLE $tablename ( `sno` INT NOT NULL , `scholar_no` VARCHAR(5) NOT NULL , `name` VARCHAR(50) NOT NULL , `religion` VARCHAR(20) NOT NULL , `gender` VARCHAR(10) NOT NULL , `category` VARCHAR(10) NOT NULL , `fname` VARCHAR(80) NOT NULL , `mname` VARCHAR(80) NOT NULL , `dob` VARCHAR(15) NOT NULL , `address` VARCHAR(150) NOT NULL , `mno` VARCHAR(10) NOT NULL , `bg` VARCHAR(10) NOT NULL , `height` DOUBLE NOT NULL , `weight` DOUBLE NOT NULL , `house` VARCHAR(20) NOT NULL ) ";
		  
		$sqlcreate = $link->prepare($querycreate);
		if(!($sqlinsert->execute())) die ("Error!");
	}
	
	function UploadStudentInfo($tablename)
    {
        require_once '../sql/conn.php';
        require_once './PHPExcel.php';
		
          $link = connect();
          $path="../../Uploads/";
          $exten = ".xlsx";
          $filename = $path.$tablename.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();

          for($row = 6; $row<=$lastRow; $row++)
          {
            $sno = $worksheet->getCell('A'.$row)->getValue();
            $admno = $worksheet->getCell('B'.$row)->getValue();
            $name = $worksheet->getCell('C'.$row)->getValue();
			$religion = $worksheet->getCell('D'.$row)->getValue();
            $gender = $worksheet->getCell('E'.$row)->getValue();
            $category = $worksheet->getCell('F'.$row)->getValue();
			$fname = $worksheet->getCell('G'.$row)->getValue();
            $mname = $worksheet->getCell('H'.$row)->getValue();
            $dob = $worksheet->getCell('I'.$row)->getValue();
            $address = $worksheet->getCell('J'.$row)->getValue();
            $mno = $worksheet->getCell('K'.$row)->getValue();
            $bg = $worksheet->getCell('L'.$row)->getValue();
			$height = $worksheet->getCell('M'.$row)->getValue();
            $weight = $worksheet->getCell('N'.$row)->getValue();
            $house = $worksheet->getCell('O'.$row)->getValue();
          
            $queryinsert = "INSERT INTO `".$tablename."` VALUES ('$sno','$admno','$name','$religion','$category','$fname','$mname','$dob','$address','$mno','$bg','height','weight','house')"; 			
			$sqlinsert = $link->prepare($queryinsert);
            if(!($sqlinsert->execute())) 
				die ($sqlinsert->errorInfo());
          }
    }
	
 ?>