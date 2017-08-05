 <?php

    function UploadExcel1to4pt($tablename)
    {
        require_once '../sql/conn.php';
        require_once '../PHPExcel.php';
		  
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
	
	
	function UploadStudentInfo($tablename)
    {
        require_once 'sql/conn.php';
        require_once 'PHPExcel.php';
          $link = connect();
          $path="../Uploads/";
          $exten = ".xlsx";
          $filename = $path.$tablename.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();

          for($row = 7; $row<=$lastRow; $row++)
          {
            $fname = $worksheet->getCell('A'.$row)->getValue();
            $mname = $worksheet->getCell('B'.$row)->getValue();
            $lname = $worksheet->getCell('C'.$row)->getValue();
            $gender = $worksheet->getCell('D'.$row)->getValue();
            $category = $worksheet->getCell('E'.$row)->getValue();
			$enrollment_no = $worksheet->getCell('F'.$row)->getValue();
            $email = $worksheet->getCell('G'.$row)->getValue();
            $contact = $worksheet->getCell('H'.$row)->getValue();
            $department = $worksheet->getCell('I'.$row)->getValue();
            $section = $worksheet->getCell('J'.$row)->getValue();
            $password = $worksheet->getCell('K'.$row)->getValue();
          
            $queryinsert = "INSERT INTO `".$tablename."` VALUES ('$fname','$mname','$lname','$gender','$category','$enrollment_no','$email','$contact','$department','$section','$password')"; 			
			$sqlinsert = $link->prepare($queryinsert);
            if(!($sqlinsert->execute())) die ($sqlinsert->errorInfo());
          }
    }
	
	function UploadProfessorInfo($tablename)
    {
        require_once 'sql/conn.php';
        require_once 'PHPExcel.php';
          $link = connect();
          $path="../Uploads/";
          $exten = ".xlsx";
          $filename = $path.$tablename.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();

          for($row = 2; $row<=$lastRow; $row++)
          {
            $fname = $worksheet->getCell('A'.$row)->getValue();
            $mname = $worksheet->getCell('B'.$row)->getValue();
            $lname = $worksheet->getCell('C'.$row)->getValue();
            $enrollment_no = $worksheet->getCell('D'.$row)->getValue();
            $email = $worksheet->getCell('E'.$row)->getValue();
            $contact = $worksheet->getCell('F'.$row)->getValue();
            $batch_year = $worksheet->getCell('G'.$row)->getValue();
            $department = $worksheet->getCell('H'.$row)->getValue();
            $section = $worksheet->getCell('I'.$row)->getValue();
            $password = $worksheet->getCell('J'.$row)->getValue();
          
            $queryinsert = "INSERT INTO `".$tablename."_info` VALUES ('$fname','$mname','$lname','$enrollment_no','$email','$contact','$batch_year','$department','$section','$password')"; 			
            $sqlinsert = $link->prepare($queryinsert);
            if(!($sqlinsert->execute())) die ($sqlinsert->errorInfo());
          }
    }
 ?>