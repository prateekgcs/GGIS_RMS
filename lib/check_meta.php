<?php
    require_once('./sql/conn.php');
    $conn = connect();
    function metaCheck($year,$class)
    {
        $class = strtoupper($class);
        $query = "SELECT `$class` FROM meta_info WHERE year = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$year);
        if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $val = $result['$class'];
        return $val;
    }

    function metaUpdate($year,$class,$num)
    {
        $class = strtoupper($class);
        $query = "UPDATE meta_info SET `$class` = ? WHERE year = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$num);
        $stmt->bindParam(2,$year);
        if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
    }
?>