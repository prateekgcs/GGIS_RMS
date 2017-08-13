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
        $path = __DIR__ . '\..\uploads\\';
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
 
	
	function connecttt()
	{
		try 
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ggis_rms";
			$link = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username,$password, array(
				PDO::ATTR_EMULATE_PREPARES=>false,
				PDO::MYSQL_ATTR_DIRECT_QUERY=>false,
				PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ));
			//printf("Connection Successful!");
			return $link;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
	}
	
	require_once ( __DIR__ . './PHPExcel.php');
?>

	
<?php
	
	function UploadResultAll($class,$test_type,$tablename)
	{
		if($class<5)
			$name = 'UploadResult1to4';
		else if($class == 5)
			$name = 'UploadResult5';
		else if($class>5 && $class<10)
			$name = 'UploadResult6to9';
		else if($class == '11s')
			$name = 'UploadResult11s';
		else if($class == '11c')
			$name = 'UploadResult11c';
        else 
            die("<script>alert('Incorrect Input!');</script>");

		switch($name)
		{
			case 'UploadResult1to4':
			{
				if($test_type == 'PT-1' || $test_type == 'PT-2')
					$name .= 'pt';
				else if($test_type == 'SA-1' || $test_type == 'SA-2')
					$name .= 'sa';
				else if($test_type == 'NS-1' || $test_type == 'NS-2')
					$name .= 'ns';
				else if($test_type == 'SEA-1' || $test_type == 'SEA-2')
					$name .= 'sea';
                else if($test_type == 'D-1' || $test_type == 'D-2')
                    $name = 'UploadResultd';
                else if($test_type == 'CSA-1' || $test_type == 'CSA-2')
                    $name = 'UploadResultcsa';
			}
			break;
			case 'UploadResult5':
			{
				if($test_type == 'PT-1' || $test_type == 'PT-2')
					$name .= 'pt';
				else if($test_type == 'SA-1' || $test_type == 'SA-2')
					$name .= 'sa';
				else if($test_type == 'NS-1' || $test_type == 'NS-2')
					$name .= 'ns';
				else if($test_type == 'SEA-1' || $test_type == 'SEA-2')
					$name .= 'sea';
                else if($test_type == 'D-1' || $test_type == 'D-2')
                    $name = 'UploadResultd';
                else if($test_type == 'CSA-1' || $test_type == 'CSA-2')
                    $name = 'UploadResultcsa';
			}
			break;
			case 'UploadResult6to9':
			{
				if($test_type == 'PT-1' || $test_type == 'PT-2' || $test_type == 'PT-3')
					$name .= 'pt';
				else if($test_type == 'AE')
					$name .= 'ae';
				else if($test_type == 'NS')
					$name .= 'ns';
				else if($test_type == 'SEA')
					$name .= 'sea';	
                else if($test_type == 'D')
                    $name = 'UploadResultd';
                else if($test_type == 'CSA')
                    $name = 'UploadResultcsa';
			}
			break;
            case 'UploadResult11s':
			{
				if($test_type == 'D')
                    $name = 'UploadResultd';
                else if($test_type == 'CSA')
                    $name = 'UploadResultcsa';
			}
			break;
            case 'UploadResult11c':
			{
				if($test_type == 'D')
                    $name = 'UploadResultd';
                else if($test_type == 'CSA')
                    $name = 'UploadResultcsa';
			}
			break;
		}

        call_user_func($name, $tablename);
	}

	// CLASS 1-4
	
    function UploadResult1to4pt($tablename)
    {		  
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `total` VARCHAR(50) NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) 
			  die ("Error1!");
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('H'.$row)->getCalculatedValue();
            $attendance = $worksheet->getCell('I'.$row)->getValue();
            $remarks = $worksheet->getCell('J'.$row)->getValue();
            
			if($rollno != '')
			{
				try
				{
					$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,?)";
					$sqlinsert = $link->prepare($queryinsert);
					$sqlinsert->bindParam(1,$rollno);
					$sqlinsert->bindParam(2,$name);
					$sqlinsert->bindParam(3,$s1);
					$sqlinsert->bindParam(4,$s2);
					$sqlinsert->bindParam(5,$s3);
					$sqlinsert->bindParam(6,$s4);
					$sqlinsert->bindParam(7,$s5);
					$sqlinsert->bindParam(8,$total);
					$sqlinsert->bindParam(9,$attendance);
					$sqlinsert->bindParam(10,$remarks);
					$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult1to4sa($tablename)
    {
        		  
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `total` VARCHAR(50) NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('H'.$row)->getCalculatedValue();
            $attendance = $worksheet->getCell('I'.$row)->getValue();
            $remarks = $worksheet->getCell('J'.$row)->getValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$total);
				$sqlinsert->bindParam(9,$attendance);
				$sqlinsert->bindParam(10,$remarks);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult1to4ns($tablename)
    {
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `total` VARCHAR(50) NOT NULL) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('H'.$row)->getCalculatedValue();
            
			if($rollno != '')
			{
				try
				{				
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$total);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult1to4sea($tablename)
    {
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `total` VARCHAR(50) NOT NULL) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) 
			  die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('H'.$row)->getCalculatedValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$total);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	//CLASS 5
	
	function UploadResult5pt($tablename)
    {  
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL ,`total` VARCHAR(50) NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('I'.$row)->getCalculatedValue();
            $attendance = $worksheet->getCell('J'.$row)->getValue();
            $remarks = $worksheet->getCell('K'.$row)->getValue();
            
			if($rollno != '')
			{
				try
				{
					
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,? ,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$total);
				$sqlinsert->bindParam(10,$attendance);
				$sqlinsert->bindParam(11,$remarks);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult5ns($tablename)
    {  
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL, `total` VARCHAR(50) NOT NULL) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('I'.$row)->getCalculatedValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$total);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }

	function UploadResult5sa($tablename)
    {
          $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL ,`total` VARCHAR(50) NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('I'.$row)->getCalculatedValue();
            $attendance = $worksheet->getCell('J'.$row)->getValue();
            $remarks = $worksheet->getCell('K'.$row)->getValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,? ,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$total);
				$sqlinsert->bindParam(10,$attendance);
				$sqlinsert->bindParam(11,$remarks);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult5sea($tablename)
    {
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL, `total` VARCHAR(50) NOT NULL) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('I'.$row)->getCalculatedValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,? ,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$total);
				$sqlinsert->execute();		
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	// CLASS 6-9
	
	function UploadResult6to9pt($tablename)
    {		  
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL ,`total` VARCHAR(50) NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('I'.$row)->getCalculatedValue();
            $attendance = $worksheet->getCell('J'.$row)->getValue();
            $remarks = $worksheet->getCell('K'.$row)->getValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,? ,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$total);
				$sqlinsert->bindParam(10,$attendance);
				$sqlinsert->bindParam(11,$remarks);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult6to9ns($tablename)
    {		  
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL, `total` VARCHAR(50) NOT NULL) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('I'.$row)->getCalculatedValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,? ,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$total);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult6to9sea($tablename)
    {
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL, `total` VARCHAR(50) NOT NULL) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('I'.$row)->getCalculatedValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,? ,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$total);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult6to9ae($tablename)
    {
 
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL ,`total` VARCHAR(50) NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('I'.$row)->getCalculatedValue();
            $attendance = $worksheet->getCell('J'.$row)->getValue();
            $remarks = $worksheet->getCell('K'.$row)->getValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,? ,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$total);
				$sqlinsert->bindParam(10,$attendance);
				$sqlinsert->bindParam(11,$remarks);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	// CLASS 11
	
	function UploadResult11c($tablename)
    {
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL , `s7` VARCHAR(50) NOT NULL , `s8` VARCHAR(50) NOT NULL, `s9` VARCHAR(50) NOT NULL ,`total` VARCHAR(50) NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            $total = $worksheet->getCell('L'.$row)->getCalculatedValue();
            $attendance = $worksheet->getCell('M'.$row)->getValue();
            $remarks = $worksheet->getCell('N'.$row)->getValue();
            
			if($rollno != '')
			{		
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,?, ?,?, ?,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$s7);
				$sqlinsert->bindParam(10,$s8);
				$sqlinsert->bindParam(11,$s9);
				$sqlinsert->bindParam(12,$total);
				$sqlinsert->bindParam(13,$attendance);
				$sqlinsert->bindParam(14,$remarks);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResult11s($tablename)
    {

		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `roll_no` VARCHAR(5) NOT NULL , `name` VARCHAR(100) NOT NULL , `s1` VARCHAR(50) NOT NULL , `s2` VARCHAR(50) NOT NULL , `s3` VARCHAR(50) NOT NULL , `s4` VARCHAR(50) NOT NULL , `s5` VARCHAR(50) NOT NULL , `s6` VARCHAR(50) NOT NULL , `s7` VARCHAR(50) NOT NULL , `s8` VARCHAR(50) NOT NULL ,`total` VARCHAR(50) NOT NULL , `attendance` INT NOT NULL , `remarks` VARCHAR(500) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
			$total = $worksheet->getCell('K'.$row)->getCalculatedValue();
            $attendance = $worksheet->getCell('L'.$row)->getValue();
            $remarks = $worksheet->getCell('M'.$row)->getValue();
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,?, ?,?, ?,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$s7);
				$sqlinsert->bindParam(10,$s8);
				$sqlinsert->bindParam(11,$total);
				$sqlinsert->bindParam(12,$attendance);
				$sqlinsert->bindParam(13,$remarks);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResultcsa($tablename)
    {

		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `sch_no` VARCHAR(5) NOT NULL , `name` VARCHAR(50) NOT NULL , `s1` VARCHAR(5) NOT NULL , `s2` VARCHAR(5) NOT NULL , `s3` VARCHAR(5) NOT NULL , `s4` VARCHAR(5) NOT NULL , `s5` VARCHAR(5) NOT NULL , `s6` VARCHAR(5) NOT NULL , `s7` VARCHAR(5) NOT NULL , `s8` VARCHAR(5) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) 
			  die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            
			if($rollno != '')
			{
				try
				{
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$s7);
				$sqlinsert->bindParam(10,$s8);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function UploadResultd($tablename)
    {
		  $link = connecttt();
          
		  $queryinsert = " CREATE TABLE `$tablename` ( `sch_no` VARCHAR(5) NOT NULL , `name` VARCHAR(50) NOT NULL , `s1` VARCHAR(5) NOT NULL , `s2` VARCHAR(5) NOT NULL , `s3` VARCHAR(5) NOT NULL , `s4` VARCHAR(5) NOT NULL , `s5` VARCHAR(5) NOT NULL , `s6` VARCHAR(5) NOT NULL , `s7` VARCHAR(5) NOT NULL , `s8` VARCHAR(5) NOT NULL ) ";
		  
		  $sqlinsert = $link->prepare($queryinsert);
		  if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
		  
		  $path = __DIR__ . '\..\uploads\\';
          $exten = ".xlsx";
          $class = $tablename;
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
            
			if($rollno != '')
			{
				try
				{
					
				$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,?)";
				$sqlinsert = $link->prepare($queryinsert);
				$sqlinsert->bindParam(1,$rollno);
				$sqlinsert->bindParam(2,$name);
				$sqlinsert->bindParam(3,$s1);
				$sqlinsert->bindParam(4,$s2);
				$sqlinsert->bindParam(5,$s3);
				$sqlinsert->bindParam(6,$s4);
				$sqlinsert->bindParam(7,$s5);
				$sqlinsert->bindParam(8,$s6);
				$sqlinsert->bindParam(9,$s7);
				$sqlinsert->bindParam(10,$s8);
				$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
	function CreateStudentInfo($tablename)
    {
		$link = connecttt();
          
		$queryinsert = " CREATE TABLE `$tablename` ( `scholar_no` VARCHAR(5) NOT NULL , `roll_no` VARCHAR(5) NOT NULL ,`section` VARCHAR(2) NOT NULL , `name` VARCHAR(50) NOT NULL , `religion` VARCHAR(20) NOT NULL , `gender` VARCHAR(10) NOT NULL , `category` VARCHAR(10) NOT NULL , `fname` VARCHAR(80) NOT NULL , `mname` VARCHAR(80) NOT NULL , `dob` VARCHAR(15) NOT NULL , `address` VARCHAR(150) NOT NULL , `mno` VARCHAR(10) NOT NULL , `bg` VARCHAR(10) NOT NULL , `height` VARCHAR(50) NOT NULL , `weight` VARCHAR(50) NOT NULL , `house` VARCHAR(20) NOT NULL ) ";
		  
		$sqlinsert = $link->prepare($queryinsert);
		if(!($sqlinsert->execute())) die(print_r($queryinsert->errorInfo()));
	}
	
	function UploadStudentInfo($tablename)
    {		
          $link = connecttt();
          $path =  __DIR__ .'\..\uploads\\';
          $exten = ".xlsx";
          $filename = $path.$tablename.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();

          for($row = 7; $row<=$lastRow; $row++)
          {
            $sno = $worksheet->getCell('A'.$row)->getValue();
			$roll_no = $worksheet->getCell('B'.$row)->getValue();
            $section = $worksheet->getCell('C'.$row)->getValue();
            $name = $worksheet->getCell('D'.$row)->getValue();
			$religion = $worksheet->getCell('E'.$row)->getValue();
            $gender = $worksheet->getCell('F'.$row)->getValue();
            $category = $worksheet->getCell('G'.$row)->getValue();
			$fname = $worksheet->getCell('H'.$row)->getValue();
            $mname = $worksheet->getCell('I'.$row)->getValue();
            $dob = $worksheet->getCell('J'.$row)->getValue();
            $address = $worksheet->getCell('K'.$row)->getValue();
            $mno = $worksheet->getCell('L'.$row)->getValue();
            $bg = $worksheet->getCell('M'.$row)->getValue();
			$height = $worksheet->getCell('N'.$row)->getValue();
            $weight = $worksheet->getCell('O'.$row)->getValue();
            $house = $worksheet->getCell('P'.$row)->getValue();
			            
			if($sno!='')
			{
				try
				{
					$queryinsert = "INSERT INTO `".$tablename."` VALUES (?,?, ?,?, ?,?, ?,?, ?,?, ?,?, ?,?, ?,?)";
					$sqlinsert = $link->prepare($queryinsert);
					$sqlinsert->bindParam(1,$sno);
					$sqlinsert->bindParam(2,$roll_no);
					$sqlinsert->bindParam(3,$section);
					$sqlinsert->bindParam(4,$name);
					$sqlinsert->bindParam(5,$religion);
					$sqlinsert->bindParam(6,$gender);
					$sqlinsert->bindParam(7,$category);
					$sqlinsert->bindParam(8,$fname);
					$sqlinsert->bindParam(9,$mname);
					$sqlinsert->bindParam(10,$dob);
					$sqlinsert->bindParam(11,$address);
					$sqlinsert->bindParam(12,$mno);
					$sqlinsert->bindParam(13,$bg);
					$sqlinsert->bindParam(14,$height);
					$sqlinsert->bindParam(15,$weight);
					$sqlinsert->bindParam(16,$house);
					$sqlinsert->execute();
				} 
				catch(PDOException $error) 
				{
					echo 'Queryfailed: ' . $error->getMessage();
					die();
				}
			}
          }
		  echo "<script>alert('Result Uploaded Successfully!'); window.location.href='./admin_dashboard.php';</script>";
    }
	
 ?>