<?php
    function connectt()
    {

        try 
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ggis_rms";
            $link = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username,$password);
            //printf("Connection Successful!");
            return $link;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        
    }
    function getBitMap($year,$class,$section)
    {
        $conn = connectt();
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