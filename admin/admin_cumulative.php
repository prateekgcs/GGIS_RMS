<form action='' method='GET'>
     YEAR: <input type='number' name='year'></br></br>
     CLASS: <input type='number' name='class' min='1' max='12'></br></br>
     SECTION: <input type='text' name='section'></br></br>
    <input type='submit' name='view' value='View'></br></br>
</form>

<?php

	$html="";
    if(isset($_GET['view']))
    {
        $year = $_GET['year'];
        $class = $_GET['class'];
        $section = strtolower($_GET['section']);

        $table_name = $year.'_'.$class.'_info';

        require_once('../lib/sql/conn.php');
        $conn = connect();
        $query0 = "SELECT * FROM `$table_name` WHERE section = ?";
        $stmt0 = $conn->prepare($query0);
        $stmt0->bindParam(1, $section);
        if((!$stmt0->execute())) die("<script>alert('Internal error: Can't fetch data');</script>");
        while($result0 = $stmt0->fetch(PDO::FETCH_ASSOC))
        {
            $roll_no = $result0['roll_no'];
            
                require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php'); 
                require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/functions/calculate_grade.php'); 
                
                $pt1_max = 10;
                $ns1_max = 5;
                $sea1_max = 5;
                $sa1_max = 80;
                $t1_max = $pt1_max + $ns1_max + $sea1_max + $sa1_max;

                $pt2_max = 10;
                $ns2_max = 5;
                $sea2_max = 5;
                $sa2_max = 80;
                $t2_max = $pt2_max + $ns2_max + $sea2_max + $sa2_max;

                $g_max = $t1_max + $t2_max;
                
                $next_year = new DateTime($year);
                $next_year->add(new DateInterval('P1Y'));
                $next_year = $next_year->format('y');

                $info_table = $year.'_'.$class.'_info';
                $pt1_table = $year.'_'.$class.'_'.$section.'_pt-1';
                $ns1_table = $year.'_'.$class.'_'.$section.'_ns-1';
                $csa1_table = $year.'_'.$class.'_'.$section.'_csa-1';
                $d1_table = $year.'_'.$class.'_'.$section.'_d-1';
                $sea1_table = $year.'_'.$class.'_'.$section.'_sea-1';
                $sa1_table = $year.'_'.$class.'_'.$section.'_sa-1';

                $pt2_table = $year.'_'.$class.'_'.$section.'_pt-2';
                $ns2_table = $year.'_'.$class.'_'.$section.'_ns-2';
                $csa2_table = $year.'_'.$class.'_'.$section.'_csa-2';
                $d2_table = $year.'_'.$class.'_'.$section.'_d-2';
                $sea2_table = $year.'_'.$class.'_'.$section.'_sea-2';
                $sa2_table = $year.'_'.$class.'_'.$section.'_sa-2';

                $conn = connect();
                
                $query = "SELECT * FROM `$sa2_table`";
				
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong, sa2_table!');</script>");
                $headings = $stmt->fetch(PDO::FETCH_ASSOC);
                $s1 = $headings['s1'];
                $s2 = $headings['s2'];
                $s3 = $headings['s3'];
                $s4 = $headings['s4'];
                $s5 = $headings['s5'];
                $s6 = $headings['s6'];
                
                //$roll_no = $_GET['rollno'];

                $query = "SELECT * FROM `$pt1_table` WHERE roll_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong21!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $pt1_m1 = $marks['s1'];
                $pt1_m2 = $marks['s2'];
                $pt1_m3 = $marks['s3'];
                $pt1_m4 = $marks['s4'];
                $pt1_m5 = $marks['s5'];
                $pt1_m6 = $marks['s6'];
                $pt1_total = $marks['total'];
                $query = "SELECT * FROM `$pt1_table` WHERE roll_no = '^'";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong21!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $pt1_m1_max = $marks['s1'];
                $pt1_m2_max = $marks['s2'];
                $pt1_m3_max = $marks['s3'];
                $pt1_m4_max = $marks['s4'];
                $pt1_m5_max = $marks['s5'];
                $pt1_m6_max = $marks['s6'];

                $pt1_m1 = (strtoupper($pt1_m1) == 'AB')?'AB':($pt1_m1/$pt1_m1_max)*$pt1_max;
                $pt1_m2 = (strtoupper($pt1_m2) == 'AB')?'AB':($pt1_m2/$pt1_m2_max)*$pt1_max;
                $pt1_m3 = (strtoupper($pt1_m3) == 'AB')?'AB':($pt1_m3/$pt1_m3_max)*$pt1_max;
                $pt1_m4 = (strtoupper($pt1_m4) == 'AB')?'AB':($pt1_m4/$pt1_m4_max)*$pt1_max;
                $pt1_m5 = (strtoupper($pt1_m5) == 'AB')?'AB':($pt1_m5/$pt1_m5_max)*$pt1_max;
                $pt1_m6 = (strtoupper($pt1_m6) == 'AB')?'AB':($pt1_m6/$pt1_m6_max)*$pt1_max;

                $query = "SELECT * FROM `$pt2_table` WHERE roll_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong22!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $pt2_m1 = $marks['s1'];
                $pt2_m2 = $marks['s2'];
                $pt2_m3 = $marks['s3'];
                $pt2_m4 = $marks['s4'];
                $pt2_m5 = $marks['s5'];
                $pt2_m6 = $marks['s6'];
                $pt2_total = $marks['total'];
                $query = "SELECT * FROM `$pt2_table` WHERE roll_no = '^'";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong22!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $pt2_m1_max = $marks['s1'];
                $pt2_m2_max = $marks['s2'];
                $pt2_m3_max = $marks['s3'];
                $pt2_m4_max = $marks['s4'];
                $pt2_m5_max = $marks['s5'];
                $pt2_m6_max = $marks['s6'];

                $pt2_m1 = (strtoupper($pt2_m1) == 'AB')?'AB':($pt2_m1/$pt2_m1_max)*$pt2_max;
                $pt2_m2 = (strtoupper($pt2_m2) == 'AB')?'AB':($pt2_m2/$pt2_m2_max)*$pt2_max;
                $pt2_m3 = (strtoupper($pt2_m3) == 'AB')?'AB':($pt2_m3/$pt2_m3_max)*$pt2_max;
                $pt2_m4 = (strtoupper($pt2_m4) == 'AB')?'AB':($pt2_m4/$pt2_m4_max)*$pt2_max;
                $pt2_m5 = (strtoupper($pt2_m5) == 'AB')?'AB':($pt2_m5/$pt2_m5_max)*$pt2_max;
                $pt2_m6 = (strtoupper($pt2_m6) == 'AB')?'AB':($pt2_m6/$pt2_m6_max)*$pt2_max;

                $query = "SELECT * FROM `$ns1_table` WHERE roll_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!311');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $ns1_m1 = $marks['s1'];
                $ns1_m2 = $marks['s2'];
                $ns1_m3 = $marks['s3'];
                $ns1_m4 = $marks['s4'];
                $ns1_m5 = $marks['s5'];
                $ns1_m6 = $marks['s6'];
                $ns1_total = $marks['total'];
                $query = "SELECT * FROM `$ns1_table` WHERE roll_no = '^'";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong312!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $ns1_m1_max = $marks['s1'];
                $ns1_m2_max = $marks['s2'];
                $ns1_m3_max = $marks['s3'];
                $ns1_m4_max = $marks['s4'];
                $ns1_m5_max = $marks['s5'];
                $ns1_m6_max = $marks['s6'];

                $ns1_m1 = (strtoupper($ns1_m1) == 'AB')?'AB':($ns1_m1/$ns1_m1_max)*$ns1_max;
                $ns1_m2 = (strtoupper($ns1_m2) == 'AB')?'AB':($ns1_m2/$ns1_m2_max)*$ns1_max;
                $ns1_m3 = (strtoupper($ns1_m3) == 'AB')?'AB':($ns1_m3/$ns1_m3_max)*$ns1_max;
                $ns1_m4 = (strtoupper($ns1_m4) == 'AB')?'AB':($ns1_m4/$ns1_m4_max)*$ns1_max;
                $ns1_m5 = (strtoupper($ns1_m5) == 'AB')?'AB':($ns1_m5/$ns1_m5_max)*$ns1_max;
                $ns1_m6 = (strtoupper($ns1_m6) == 'AB')?'AB':($ns1_m6/$ns1_m6_max)*$ns1_max;


                $query = "SELECT * FROM `$ns2_table` WHERE roll_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!32');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $ns2_m1 = $marks['s1'];
                $ns2_m2 = $marks['s2'];
                $ns2_m3 = $marks['s3'];
                $ns2_m4 = $marks['s4'];
                $ns2_m5 = $marks['s5'];
                $ns2_m6 = $marks['s6'];
                $ns2_total = $marks['total'];
                $query = "SELECT * FROM `$ns2_table` WHERE roll_no = '^'";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong32!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $ns2_m1_max = $marks['s1'];
                $ns2_m2_max = $marks['s2'];
                $ns2_m3_max = $marks['s3'];
                $ns2_m4_max = $marks['s4'];
                $ns2_m5_max = $marks['s5'];
                $ns2_m6_max = $marks['s6'];

                $ns2_m1 = (strtoupper($ns2_m1) == 'AB')?'AB':($ns2_m1/$ns2_m1_max)*$ns2_max;
                $ns2_m2 = (strtoupper($ns2_m2) == 'AB')?'AB':($ns2_m2/$ns2_m2_max)*$ns2_max;
                $ns2_m3 = (strtoupper($ns2_m3) == 'AB')?'AB':($ns2_m3/$ns2_m3_max)*$ns2_max;
                $ns2_m4 = (strtoupper($ns2_m4) == 'AB')?'AB':($ns2_m4/$ns2_m4_max)*$ns2_max;
                $ns2_m5 = (strtoupper($ns2_m5) == 'AB')?'AB':($ns2_m5/$ns2_m5_max)*$ns2_max;
                $ns2_m6 = (strtoupper($ns2_m6) == 'AB')?'AB':($ns2_m6/$ns2_m6_max)*$ns2_max;


                $query = "SELECT * FROM `$sea1_table` WHERE roll_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!41');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $sea1_m1 = $marks['s1'];
                $sea1_m2 = $marks['s2'];
                $sea1_m3 = $marks['s3'];
                $sea1_m4 = $marks['s4'];
                $sea1_m5 = $marks['s5'];
                $sea1_m6 = $marks['s6'];
                $sea1_total = $marks['total'];
                $query = "SELECT * FROM `$sea1_table` WHERE roll_no = '^'";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong41!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $sea1_m1_max = $marks['s1'];
                $sea1_m2_max = $marks['s2'];
                $sea1_m3_max = $marks['s3'];
                $sea1_m4_max = $marks['s4'];
                $sea1_m5_max = $marks['s5'];
                $sea1_m6_max = $marks['s6'];

                $sea1_m1 = (strtoupper($sea1_m1) == 'AB')?'AB':($sea1_m1/$sea1_m1_max)*$sea1_max;
                $sea1_m2 = (strtoupper($sea1_m2) == 'AB')?'AB':($sea1_m2/$sea1_m2_max)*$sea1_max;
                $sea1_m3 = (strtoupper($sea1_m3) == 'AB')?'AB':($sea1_m3/$sea1_m3_max)*$sea1_max;
                $sea1_m4 = (strtoupper($sea1_m4) == 'AB')?'AB':($sea1_m4/$sea1_m4_max)*$sea1_max;
                $sea1_m5 = (strtoupper($sea1_m5) == 'AB')?'AB':($sea1_m5/$sea1_m5_max)*$sea1_max;
                $sea1_m6 = (strtoupper($sea1_m6) == 'AB')?'AB':($sea1_m6/$sea1_m6_max)*$sea1_max;

                $query = "SELECT * FROM `$sea2_table` WHERE roll_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!42');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $sea2_m1 = $marks['s1'];
                $sea2_m2 = $marks['s2'];
                $sea2_m3 = $marks['s3'];
                $sea2_m4 = $marks['s4'];
                $sea2_m5 = $marks['s5'];
                $sea2_m6 = $marks['s6'];
                $sea2_total = $marks['total'];
                $query = "SELECT * FROM `$sea2_table` WHERE roll_no = '^'";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong42!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $sea2_m1_max = $marks['s1'];
                $sea2_m2_max = $marks['s2'];
                $sea2_m3_max = $marks['s3'];
                $sea2_m4_max = $marks['s4'];
                $sea2_m5_max = $marks['s5'];
                $sea2_m6_max = $marks['s6'];

                $sea2_m1 = (strtoupper($sea2_m1) == 'AB')?'AB':($sea2_m1/$sea2_m1_max)*$sea2_max;
                $sea2_m2 = (strtoupper($sea2_m2) == 'AB')?'AB':($sea2_m2/$sea2_m2_max)*$sea2_max;
                $sea2_m3 = (strtoupper($sea2_m3) == 'AB')?'AB':($sea2_m3/$sea2_m3_max)*$sea2_max;
                $sea2_m4 = (strtoupper($sea2_m4) == 'AB')?'AB':($sea2_m4/$sea2_m4_max)*$sea2_max;
                $sea2_m5 = (strtoupper($sea2_m5) == 'AB')?'AB':($sea2_m5/$sea2_m5_max)*$sea2_max;
                $sea2_m6 = (strtoupper($sea2_m6) == 'AB')?'AB':($sea2_m6/$sea2_m6_max)*$sea2_max;


                $query = "SELECT * FROM `$sa1_table` WHERE roll_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!51');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $sa1_m1 = $marks['s1'];
                $sa1_m2 = $marks['s2'];
                $sa1_m3 = $marks['s3'];
                $sa1_m4 = $marks['s4'];
                $sa1_m5 = $marks['s5'];
                $sa1_m6 = $marks['s6'];
                $sa1_total = $marks['total'];
                $query = "SELECT * FROM `$sa1_table` WHERE roll_no = '^'";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong51!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $sa1_m1_max = $marks['s1'];
                $sa1_m2_max = $marks['s2'];
                $sa1_m3_max = $marks['s3'];
                $sa1_m4_max = $marks['s4'];
                $sa1_m5_max = $marks['s5'];
                $sa1_m6_max = $marks['s6'];

                $sa1_m1 = (strtoupper($sa1_m1) == 'AB')?'AB':($sa1_m1/$sa1_m1_max)*$sa1_max;
                $sa1_m2 = (strtoupper($sa1_m2) == 'AB')?'AB':($sa1_m2/$sa1_m2_max)*$sa1_max;
                $sa1_m3 = (strtoupper($sa1_m3) == 'AB')?'AB':($sa1_m3/$sa1_m3_max)*$sa1_max;
                $sa1_m4 = (strtoupper($sa1_m4) == 'AB')?'AB':($sa1_m4/$sa1_m4_max)*$sa1_max;
                $sa1_m5 = (strtoupper($sa1_m5) == 'AB')?'AB':($sa1_m5/$sa1_m5_max)*$sa1_max;
                $sa1_m6 = (strtoupper($sa1_m6) == 'AB')?'AB':($sa1_m6/$sa1_m6_max)*$sa1_max;


                $query = "SELECT * FROM `$sa2_table` WHERE roll_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!52');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $sa2_m1 = $marks['s1'];
                $sa2_m2 = $marks['s2'];
                $sa2_m3 = $marks['s3'];
                $sa2_m4 = $marks['s4'];
                $sa2_m5 = $marks['s5'];
                $sa2_m6 = $marks['s6'];
                $sa2_total = $marks['total'];
                $attendance = $marks['attendance'];
                $remarks = $marks['remarks'];
                $query = "SELECT * FROM `$sa2_table` WHERE roll_no = '^'";
                $stmt = $conn->prepare($query);
                if(!$stmt->execute()) die("<script>alert('Something went wrong52!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $sa2_m1_max = $marks['s1'];
                $sa2_m2_max = $marks['s2'];
                $sa2_m3_max = $marks['s3'];
                $sa2_m4_max = $marks['s4'];
                $sa2_m5_max = $marks['s5'];
                $sa2_m6_max = $marks['s6'];

                $sa2_m1 = (strtoupper($sa2_m1) == 'AB')?'AB':($sa2_m1/$sa2_m1_max)*$sa2_max;
                $sa2_m2 = (strtoupper($sa2_m2) == 'AB')?'AB':($sa2_m2/$sa2_m2_max)*$sa2_max;
                $sa2_m3 = (strtoupper($sa2_m3) == 'AB')?'AB':($sa2_m3/$sa2_m3_max)*$sa2_max;
                $sa2_m4 = (strtoupper($sa2_m4) == 'AB')?'AB':($sa2_m4/$sa2_m4_max)*$sa2_max;
                $sa2_m5 = (strtoupper($sa2_m5) == 'AB')?'AB':($sa2_m5/$sa2_m5_max)*$sa2_max;
                $sa2_m6 = (strtoupper($sa2_m6) == 'AB')?'AB':($sa2_m6/$sa2_m6_max)*$sa2_max;


                $total1_1 = (($pt1_m1 + $ns1_m1 + $sea1_m1 + $sa1_m1)/$t1_max)*100;
                $total1_2 = (($pt1_m2 + $ns1_m2 + $sea1_m2 + $sa1_m2)/$t1_max)*100;
                $total1_3 = (($pt1_m3 + $ns1_m3 + $sea1_m3 + $sa1_m3)/$t1_max)*100;
                $total1_4 = (($pt1_m4 + $ns1_m4 + $sea1_m4 + $sa1_m4)/$t1_max)*100;
                $total1_5 = (($pt1_m5 + $ns1_m5 + $sea1_m5 + $sa1_m5)/$t1_max)*100;
                $total1_6 = (($pt1_m6 + $ns1_m6 + $sea1_m6 + $sa1_m6)/$t1_max)*100;

                $total2_1 = (($pt2_m1 + $ns2_m1 + $sea2_m1 + $sa2_m1)/$t2_max)*100;
                $total2_2 = (($pt2_m2 + $ns2_m2 + $sea2_m2 + $sa2_m2)/$t2_max)*100;
                $total2_3 = (($pt2_m3 + $ns2_m3 + $sea2_m3 + $sa2_m3)/$t2_max)*100;
                $total2_4 = (($pt2_m4 + $ns2_m4 + $sea2_m4 + $sa2_m4)/$t2_max)*100;
                $total2_5 = (($pt2_m5 + $ns2_m5 + $sea2_m5 + $sa2_m5)/$t2_max)*100;
                $total2_6 = (($pt2_m6 + $ns2_m6 + $sea2_m6 + $sa2_m6)/$t2_max)*100;

                $g_total_1 = (($total1_1 + $total2_1)/$g_max)*100;
                $g_total_2 = (($total1_2 + $total2_2)/$g_max)*100;
                $g_total_3 = (($total1_3 + $total2_3)/$g_max)*100;
                $g_total_4 = (($total1_4 + $total2_4)/$g_max)*100;
                $g_total_5 = (($total1_5 + $total2_5)/$g_max)*100;
                $g_total_6 = (($total1_6 + $total2_6)/$g_max)*100;

                $g1 = calculateGrade($g_total_1);
                $g2 = calculateGrade($g_total_2);
                $g3 = calculateGrade($g_total_3);
                $g4 = calculateGrade($g_total_4);
                $g5 = calculateGrade($g_total_5);
                $g6 = calculateGrade($g_total_6);

                $f_total = $g_total_1 + $g_total_2 + $g_total_3 + $g_total_4 + $g_total_5 + $g_total_6;
                $f_total = number_format($f_total,2);
                $f_max = $t1_max * 6;
                $f_percent = ($f_total/$f_max) * 100;
                $f_percent = number_format($f_percent,2);
                $f_grade = calculateGrade($f_percent);

                $query = "SELECT * FROM `$info_table` WHERE roll_no = ? AND section = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$roll_no);
                $stmt->bindParam(2,$section);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $name = $result['name'];
                $fname = $result['fname'];
                $mname = $result['mname'];
                $dob = $result['dob'];
                $address = $result['address'];
                $scholar_no = $result['scholar_no'];

                $query = "SELECT * FROM `$csa1_table` WHERE sch_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$scholar_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!5');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $csa1_m1 = $marks['s1'];
                $csa1_m2 = $marks['s2'];
                $csa1_m3 = $marks['s3'];
                $csa1_m4 = $marks['s4'];
                $csa1_m5 = $marks['s5'];
                $csa1_m6 = $marks['s6'];
                $csa1_m7 = $marks['s7'];
                $csa1_m8 = $marks['s8'];


                $query = "SELECT * FROM `$csa2_table` WHERE sch_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$scholar_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!5');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $csa2_m1 = $marks['s1'];
                $csa2_m2 = $marks['s2'];
                $csa2_m3 = $marks['s3'];
                $csa2_m4 = $marks['s4'];
                $csa2_m5 = $marks['s5'];
                $csa2_m6 = $marks['s6'];
                $csa2_m7 = $marks['s7'];
                $csa2_m8 = $marks['s8'];


                $query = "SELECT * FROM `$d1_table` WHERE sch_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$scholar_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $d1_m1 = $marks['s1'];
                $d1_m2 = $marks['s2'];
                $d1_m3 = $marks['s3'];
                $d1_m4 = $marks['s4'];
                $d1_m5 = $marks['s5'];
                $d1_m6 = $marks['s6'];
                $d1_m7 = $marks['s7'];
                $d1_m8 = $marks['s8'];

                $query = "SELECT * FROM `$d2_table` WHERE sch_no = ?";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$scholar_no);
                if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
                $marks = $stmt->fetch(PDO::FETCH_ASSOC);
                $d2_m1 = $marks['s1'];
                $d2_m2 = $marks['s2'];
                $d2_m3 = $marks['s3'];
                $d2_m4 = $marks['s4'];
                $d2_m5 = $marks['s5'];
                $d2_m6 = $marks['s6'];
                $d2_m7 = $marks['s7'];
                $d2_m8 = $marks['s8'];


                $html .= "<div class='container-fluid' id='report'>
                    <div style='border: 2px solid black' class='ht col-md-10 col-md-offset-1' >
                        
                        <div class='container-fluid' >
                        
                        <div class='row'>
                        
                            <div class='col-md-12'>
                                <table>
                                <tr>
                                <td width='15%'><img class='img img-responsive' src='../../lib/image/cbse.png'/></td>
                            
                                <td><h3><b>Gyan Ganga International School</b></h3>
                                <p>Affiliated to C.B.S.E., Delhi, Affiliation No. 1030147<br/>Wardhman Square, By pass Junction Bheraghat Road, P.O.-Tewar, Jabalpur- 482003 (M.P.)<br/>Phone: 9893040336, 9893286946, 9893304495<br/>Website: gyanganga.ac.in, E-mail: gyangangajabalpur@gmail.com</p></td>
                        
                                <td width='15%'><img class='img img-responsive' src='../../lib/image/slogo.png'/></td>
                                </tr>
                                </table>
                            </div>
                            
                        </div>	
                        
                        <div align='center' class='col-md-12'>
                            <h3>Report Card</h3>
                            <h4>Class: IX <br/>Academic Session: $year-$next_year</h4>
                        </div>
                    
                        <div class='row'>
                            <div id='p' class='col-md-6 mtop'>
                                <table>
                    <tr>
                        <td class='left'>Student's Name:</td>
                        <td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$name</b></td>
                    </tr>
                    
                    <tr>
                        <td class='left'>Father's Name:</td>
                        <td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$fname</b></td>
                    </tr>
                    <tr>
                        <td class='left'>Mother's Name:</td>
                        <td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$mname</b></td>
                    </tr>
                    <tr>
                        <td class='left'>Date of Birth:</td>
                        <td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$dob</b></td>
                    </tr>
                    <tr>
                        <td class='left'>Address:</td>
                        <td class='left' width='250px;' style='border-bottom: 1px solid black;'> <b>$address</b></td>
                    </tr>
                </table>
                            
                            </div>
                    
                            <div id='p' class='col-md-4 mtop'>
                                
                                <table>
                                    <tr align='center'>
                                        <td style='border: 1px solid black;'><b>Roll No.</b></td>
                                        <td style='border: 1px solid black;'> <b>$roll_no</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'>&nbsp;</td>
                                    </tr>
                                        
                                    <tr>
                                        <td>Admission Number:</td>
                                        <td width='50%' style='border-bottom: 1px solid black;'> <b>$scholar_no</b></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                        
                        <div class='container-fluid mtop'>
                    
                            <table class='table table-responsive' border='2'>
                            <tr class='bold'>
                                <td >SCHOLASTIC AREA</td>
                                <td colspan='5'>SA 1</td>
                                <td colspan='5'>SA 2</td>
                                <td colspan='2'>OVERALL</td>
                            </tr>
                            
                            <tr class='bold'>
                                <td rowspan='2'>Subjects</td>
                                <td>Per. Test</td>
                                <td>Note Book</td>
                                <td>SEA</td>
                                <td>Half Yearly</td>
                                <td>Total</td>
                                <td>Per. Test</td>
                                <td>Note Book</td>
                                <td>SEA</td>
                                <td>Half Yearly</td>
                                <td>Total</td>
                                <td>Grand Total</td>
                                <td rowspan='2'>Grade</td>
                            </tr>
                            
                            <tr class='bold'>
                                <td>$pt1_max</td>
                                <td>$ns1_max</td>
                                <td>$sea1_max</td>
                                <td>$sa1_max</td>
                                <td>$t1_max</td>
                                <td>$pt2_max</td>
                                <td>$ns2_max</td>
                                <td>$sea2_max</td>
                                <td>$sa2_max</td>
                                <td>$t2_max</td>
                                <td>$t2_max</td>
                            </tr>
                            <tr>
                                <td class='left'>$s1</td>
                                <td>$pt1_m1</td>
                                <td>$ns1_m1</td>
                                <td>$sea1_m1</td>
                                <td>$sa1_m1</td>
                                <td>$total1_1</td>
                                <td>$pt2_m1</td>
                                <td>$ns2_m1</td>
                                <td>$sea2_m1</td>
                                <td>$sa2_m1</td>
                                <td>$total2_1</td>
                                <td>$g_total_1</td>
                                <td>$g1</td>
                                
                            </tr>
                            <tr>
                                <td class='left'>$s2</td>
                                <td>$pt1_m2</td>
                                <td>$ns1_m2</td>
                                <td>$sea1_m2</td>
                                <td>$sa1_m2</td>
                                <td>$total1_2</td>
                                <td>$pt2_m2</td>
                                <td>$ns2_m2</td>
                                <td>$sea2_m2</td>
                                <td>$sa2_m2</td>
                                <td>$total2_2</td>
                                <td>$g_total_2</td>
                                <td>$g2</td>
                                
                            </tr>
                            <tr>
                                <td class='left'>$s3</td>
                                <td>$pt1_m3</td>
                                <td>$ns1_m3</td>
                                <td>$sea1_m3</td>
                                <td>$sa1_m3</td>
                                <td>$total1_3</td>
                                <td>$pt2_m3</td>
                                <td>$ns2_m3</td>
                                <td>$sea2_m3</td>
                                <td>$sa2_m3</td>
                                <td>$total2_3</td>
                                <td>$g_total_3</td>
                                <td>$g3</td>
                            
                            </tr>
                            <tr>
                                <td class='left'>$s4</td>
                                <td>$pt1_m4</td>
                                <td>$ns1_m4</td>
                                <td>$sea1_m4</td>
                                <td>$sa1_m4</td>
                                <td>$total1_4</td>
                                <td>$pt2_m4</td>
                                <td>$ns2_m4</td>
                                <td>$sea2_m4</td>
                                <td>$sa2_m4</td>
                                <td>$total2_4</td>
                                <td>$g_total_4</td>
                                <td>$g4</td>
                                
                            </tr>
                            <tr>
                                <td class='left'>$s5</td>
                                <td>$pt1_m5</td>
                                <td>$ns1_m5</td>
                                <td>$sea1_m5</td>
                                <td>$sa1_m5</td>
                                <td>$total1_5</td>
                                <td>$pt2_m5</td>
                                <td>$ns2_m5</td>
                                <td>$sea2_m5</td>
                                <td>$sa2_m5</td>
                                <td>$total2_5</td>
                                <td>$g_total_5</td>
                                <td>$g5</td>
                                
                            </tr>
                            <tr>
                                <td class='left'>$s6</td>
                                <td>$pt1_m6</td>
                                <td>$ns1_m6</td>
                                <td>$sea1_m6</td>
                                <td>$sa1_m6</td>
                                <td>$total1_6</td>
                                <td>$pt2_m6</td>
                                <td>$ns2_m6</td>
                                <td>$sea2_m6</td>
                                <td>$sa2_m6</td>
                                <td>$total2_6</td>
                                <td>$g_total_6</td>
                                <td>$g6</td>
                            
                            </tr>
                            <tr>
                                <td colspan='14'><b>8 Point Grading Scale: </b>A1(91% - 100%), A2(81% - 90%), B1(71% - 80%), B2(61% - 70%), C1(51%-60%), C2(41% - 50%), D(33% - 40%), E(32% & Below) *SE=Sub Enrichment</b></td>
                            </tr>
                        </table>
                    </div>
                
                    <div id='p' class='col-md-12'>
                        <div id='p' style='margin-left: 15px;' class='col-md-4'>
                            <table class='table' border='2'>
                                <tr class='bold'>
                                    <td style='min-width:70%; background-color:#eee;'>Overall Marks</td>
                                    <td style='min-width:30%'>$f_total/$f_max</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div id='p' class='col-md-4'>
                        <table class='table' border='2'>
                            <tr class='bold'>
                                <td style='min-width:60%; background-color:#eee;'>Percentage</td>
                                <td style='min-width:40%'>$f_percent</td>
                            </tr>
                        </table>
                        </div>
                        
                        <div id='p' class='col-md-2'>
                        <table class='table' border='2'>
                            <tr class='bold'>
                                <td style='min-width:60%; background-color:#eee;'>Grade</td>
                                <td style='min-width:40%'>$f_grade</td>
                            </tr>
                        </table>
                        </div>
                        
                        <div id='p' class='col-md-2'>
                        <table class='table' border='2'>
                            <tr class='bold'>
                                <td style='min-width:60%;  background-color:#eee;'>Rank</td>
                                <td style='min-width:40%'>__</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    
                    <div style='padding-left:30px;' class='row'>

                    <div id='p' class='col-md-6'>
                    <table border='2'>
                        <tr class='bold'>
                            <td colspan='3'>Co-Scholastic Area<br>(3 Point Grading Scale A,B,C)</td>
                        </tr>
                        <tr class='bold'>
                            <td style='width:250px;' class='left'>Activity</td>
                            <td style='width:60px;'>T1</td>
                            <td style='width:60px;'>T2</td>
                        </tr>
                        <tr>
                            <td class='left'>Work Education</td>
                            <td>$csa1_m1</td>
                            <td>$csa2_m1</td>
                        </tr>
                        <tr>
                            <td class='left'>Art Education</td>
                            <td>$csa1_m2</td>
                            <td>$csa2_m2</td>
                        </tr>
                        <tr>
                            <td class='left'>Health & Physical Education</td>
                            <td>$csa1_m3</td>
                            <td>$csa2_m3</td>
                        </tr>
                        <tr>
                            <td class='left'>Scientific Skills</td>
                            <td>$csa1_m4</td>
                            <td>$csa2_m4</td>
                        </tr>
                        <tr>
                            <td class='left'>Thinking Skills</td>
                            <td>$csa1_m5</td>
                            <td>$csa2_m5</td>
                        </tr>
                        <tr>
                            <td class='left'>Social Skills</td>
                            <td>$csa1_m6</td>
                            <td>$csa2_m6</td>
                        </tr>
                        <tr>
                            <td class='left'>Yoga/NCC</td>
                            <td>$csa1_m7</td>
                            <td>$csa2_m7</td>
                        </tr>
                        <tr>
                            <td class='left'>Sports</td>
                            <td>$csa1_m8</td>
                            <td>$csa2_m8</td>
                        </tr>
                    </table>
                    </div>
                    
                    
                    <div id='p' class='col-md-6'>
                    <table border='2'>
                        <tr class='bold'>
                            <td colspan='3'>Discipline<br>(3 Point Grading Scale A,B,C)</td>
                        </tr>
                        <tr class='bold'>
                            <td class='left'>Element</td>
                            <td style='width:60px;'>T1</td>
                            <td style='width:60px;'>T2</td>
                        </tr>
                        <tr>
                            <td class='left'>Regularity & Punctuality</td>
                            <td>$d1_m1</td>
                            <td>$d2_m1</td>
                        </tr>
                        <tr>
                            <td class='left'>Sincerity</td>
                            <td>$d1_m2</td>
                            <td>$d2_m2</td>
                        </tr>
                        <tr>
                            <td class='left'>Behaviour & Values</td>
                            <td>$d1_m3</td>
                            <td>$d2_m3</td>
                        </tr>
                        <tr>
                            <td class='left'>Respectfulness for Rules & Regulations</td>
                            <td>$d1_m4</td>
                            <td>$d2_m4</td>
                        </tr>
                        <tr>
                            <td class='left'>Attitude Towards Teachers</td>
                            <td>$d1_m5</td>
                            <td>$d2_m5</td>
                        </tr>
                        <tr>
                            <td class='left'>Attitude Towards School-mates</td>
                            <td>$d1_m6</td>
                            <td>$d2_m6</td>
                        </tr>
                        <tr>
                            <td class='left'>Attitude Towards Society</td>
                            <td>$d1_m7</td>
                            <td>$d2_m7</td>
                        </tr>
                        <tr>
                            <td class='left'>Attitude Towards Nstion</td>
                            <td>$d1_m8</td>
                            <td>$d2_m8</td>
                        </tr>
                    </table>
                </div>
            </div>

        <div class='col-md-12 mtop'>
            
            <div id='p' class='col-md-5'>
                <table>
                    <tr align='center'>
                        <td>Attendance:</td>
                        <td width= '100px' style='border-bottom: 1px solid black;'> <b> $attendance</b></td>
                    </tr>
                </table>
            </div>
            
            <div id='p' class='col-md-7'>
                <table>
                    <tr align='center'>
                        <td>Remarks:</td>
                        <td width='350px' style='border-bottom: 1px solid black;'><b>  $remarks</b> </td>
                    </tr>
                </table>
            </div>
            
        </div>
            
                <div class='row mtop'>
                    <table style='margin-left: 30px;' class='table-responsive t1'>
                        <tr>
                            <td><h4><b>Congratulations! Promoted to next Class.</b></h4></td>
                        </tr>
                    </table>
                </div>
        
        
            <div class='row'>
                <div class='row headmargin'>
                
                        <table class='table-responsive table-centered t1' width='100%' >
                            <tr>
                                <td id='p1'>Date: </td>
                                <td id='p1'>Class Teacher</td>
                                <td id='p1'>Principal</td>
                            </tr>
                        </table>
                    
                </div>
            </div>	
            
            </div>
            </div>
        </div></br></br></table>";
    }
   echo $html;
}
?>
