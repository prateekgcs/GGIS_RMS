<?php
function connect()
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
		return $conn;
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
    
}

connect();
?>
