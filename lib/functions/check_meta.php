<?php
    require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php');
    
    function metaCheck($year,$class)
    {
        $conn = connect();
        $class = strtoupper($class);
        $query = "SELECT `$class` FROM meta_info WHERE year = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$year);
        if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
        $result = $stmt->fetch(PDO::FETCH_NUM);
        $val = $result[0];
        return $val;
    }

    function metaUpdate($year,$class,$num)
    {   
        $conn = connect();
        $class = strtoupper($class);
        $query = "UPDATE meta_info SET `$class` = ? WHERE year = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$num);
        $stmt->bindParam(2,$year);
        if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
    }
?>