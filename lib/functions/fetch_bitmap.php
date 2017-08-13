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
        if($class > 3 && $class < 11)
            $class = $class.strtoupper($section);
        $query = "SELECT `$class` FROM batch_info WHERE year = ?";
        //printf(("<script>alert('$class');</script>"));
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$year);
        if(!$stmt->execute()) die("<script>alert('Internal Error!');</script>");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $bitmap = $result[$class];
        return $bitmap;
    }  
	
    function checkDependency($year,$class)
    {
        $bitmaps = array(
                    getBitMap($year,$class,'A'),
                    getBitMap($year,$class,'B'),
                    getBitMap($year,$class,'C')
        );
        $bool = 0;
        foreach($bitmaps as $bitmap)
        {
            $arrs = str_split($bitmap);
            foreach($arrs as $arr)
            {
                $bool = $bool + $arr;
            }
        }
        return $bool;
    } 
?>