<?php
    require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php');
    function fetchHeadings($tname)
    {
        $conn = connect();
        $tname = strtolower($tname);
        $query = "SELECT * FROM `$tname`";
        $stmt = $conn->prepare($query);
        if(!$stmt->execute()) die("<script>alert('Something went wrong!');</script>");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
?>