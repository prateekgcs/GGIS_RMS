<?php
    require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php');
    if(isset($_GET['class'])&&isset($_GET['year'])&&isset($_GET['section'])&&isset($_GET['get_tname'])&&isset($_GET['file'])&&isset($_GET['folder']))
    {
        $class = $_GET['class'];
        $year = $_GET['year'];
        $section = $_GET['section'];
        $get_tname = $_GET['get_tname'];
        $file = $_GET['file'];
        $folder = $_GET['folder'];
        $get_tname = $year.'_'.$class.'_'.strtolower($section).'_'.$get_tname;
        $file = 'admin_view_report_card_'.strtolower($file);
        $info_table = $year.'_'.$class.'_info';
		$path = "./".$folder."/".$file.".php?tname=$get_tname&rollno=";
        $conn = connect();
        $query = "SELECT * FROM `$info_table` WHERE section = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,strtoupper($section));
        if(!$stmt->execute()) die("<script>alert('Cannot fetch student info!');</script>");
        $count = $stmt->rowCount();
        $table = "<table><tr><td>Scholar Number</td><td>Name</td><td>Roll No</td><td>Father's Name</td><td>View</td></tr>";
        while($result = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $scholar_no = $result['scholar_no'];
            $name = $result['name'];
            $roll_no = $result['roll_no'];
            $fname = $result['fname'];
            $table .= "<tr><td>$scholar_no</td><td>$name</td><td>$roll_no</td><td>$fname</td><td><a href='$path$roll_no'><button>View</button></a></td></tr>";
        }
        $table .= "</table>";
        echo $table;
    }
?>