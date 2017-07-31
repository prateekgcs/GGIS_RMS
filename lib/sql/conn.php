<?php
function connect()
{

try {
    $link = new PDO("mysql:host=localhost;dbname=ggitsorg_ras;charset=utf8","ggitsorg_ras","123qwe,./");
            //printf("Connection Successful!");
            return $link;
   return $conn;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
}
?>
