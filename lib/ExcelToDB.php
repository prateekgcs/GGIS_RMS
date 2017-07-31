 <?php

    function UploadExcel($classname)
    {
        require_once 'sql/conn.php';
        require_once 'PHPExcel.php';
          $link = connect();
          $path="../Uploads/";
          $exten = ".xlsx";
          $sem = $classname;
          $filename = $path.$sem.$exten;

          $excelReader = PHPExcel_IOFactory::createReaderForFile($filename);
          $excelObject = $excelReader->load($filename);
          $worksheet = $excelObject->getActiveSheet();
          $lastRow = $worksheet->getHighestDataRow();
		  
          for($row = 7; $row<=$lastRow; $row++)
          {
            $sno = $worksheet->getCell('A'.$row)->getValue();
            $rollno = $worksheet->getCell('B'.$row)->getValue();
            $name = $worksheet->getCell('C'.$row)->getValue();
            $s1 = $worksheet->getCell('D'.$row)->getValue();
            $s2 = $worksheet->getCell('E'.$row)->getValue();
            $s3 = $worksheet->getCell('F'.$row)->getValue();
            $s4 = $worksheet->getCell('G'.$row)->getValue();
            $s5 = $worksheet->getCell('H'.$row)->getValue();
            $s6 = $worksheet->getCell('I'.$row)->getValue();
            $s7 = $worksheet->getCell('J'.$row)->getValue();
            $s8 = $worksheet->getCell('K'.$row)->getValue();
            $s9 = $worksheet->getCell('L'.$row)->getValue();
            $s10 = $worksheet->getCell('M'.$row)->getValue();
            $s11 = $worksheet->getCell('N'.$row)->getValue();
            $s12 = $worksheet->getCell('O'.$row)->getValue();
            $s13 = $worksheet->getCell('P'.$row)->getValue();
            $s14 = $worksheet->getCell('Q'.$row)->getValue();
            $s15 = $worksheet->getCell('R'.$row)->getValue();
            $r_desc = $worksheet->getCell('S'.$row)->getValue();
            $sgpa = $worksheet->getCell('T'.$row)->getValue();
            $cgpa = $worksheet->getCell('U'.$row)->getValue();
            $r_status = $worksheet->getCell('V'.$row)->getValue();
            $remarks = $worksheet->getCell('W'.$row)->getValue();
			if($rollno != '' && $name != '')
			{
				$queryinsert = "INSERT INTO $sem VALUES ('$sno','$rollno','$name','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s10','$s11','$s12','$s13','$s14','$s15','$r_desc','$sgpa','$cgpa','$r_status','$remarks')";  
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