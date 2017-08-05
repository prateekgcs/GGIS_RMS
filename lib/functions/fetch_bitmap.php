<?php

    require_once("./signout.php");
    
    function getBitMap($year,$class,$section)
    {
        $conn = connect();
        $class = $class.strtoupper($section);
        $query = "SELECT `$class` FROM batch_info WHERE year = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$year);
        if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $bitmap = $result[$class];
        return $bitmap;
    }   
?>