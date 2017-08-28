<?php
    require_once('../lib/sql/conn.php');
    $conn = connect();
    $query = "SELECT * FROM professor_info";
    $stmt = $conn->prepare($query);
    if((!$stmt->execute())) die("<script>alert('Internal error: Can't fetch data');</script>");
    $table = "<table>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Class</th>
                    <th>Section</th>
                </tr>";
    while($result = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $name = ucwords($result['fname'].' '.$result['mname'].' '.$result['lname']);
        $gender = ($result['gender'] == 0)?'Male':'Female';
        $email  = $result['email'];
        $contact = $result['contact'];
        $class = $result['class'];
        $section = $result['section'];
        $table .= "<tr><td>$name</td><td>$gender</td><td>$email</td><td>$contact</td><td>$class</td><td>$section</td></tr>";
    }
    $table .= "</table>";
    printf($table);
?>    