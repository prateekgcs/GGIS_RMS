<form action='' method='GET'>
     YEAR: <input type='number' name='year'></br></br>
     CLASS: <input type='number' name='class' min='1' max='12'></br></br>
     SECTION: <input type='text' name='section'></br></br>
    <input type='submit' name='view' value='View'></br></br>
</form>

<?php
    if(isset($_GET['view']))
    {
        $year = $_GET['year'];
        $class = $_GET['class'];
        $section = $_GET['section'];

        $table_name = $year.'_'.$class.'_info';

        require_once('../lib/sql/conn.php');
        $conn = connect();
        $query = "SELECT * FROM `$table_name` WHERE section = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $section);
        if((!$stmt->execute())) die("<script>alert('Internal error: Can't fetch data');</script>");
        $table = "<table>
                    <tr>
                        <th>Name</th>
                        <th>Scholar Number</th>
                        <th>Roll Number</th>
                        <th>Category</th>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Blood Group</th>
                        <th>House</th>
                    </tr>";
        while($result = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $name = ucwords($result['name']);
            $fname = ucwords($result['fname']);
            $mname = ucwords($result['mname']);
            $category  = $result['category'];
            $roll_no = $result['roll_no'];
            $scholar_no = $result['scholar_no'];
            $dob = $result['dob'];
            $address = $result['address'];
            $contact = $result['mno'];
            $bg = $result['bg'];
            $house = $result['house'];
            $table .= "<tr><td>$name</td><td>$scholar_no</td><td>$roll_no</td><td>$category</td><td>$fname</td><td>$mname</td><td>$dob</td><td>$address</td><td>$contact</td><td>$bg</td><td>$house</td></tr>";
        }
        $table .= "</table>";
        printf($table);

    }
?>
