<?php
	session_start();
	if (!(isset($_SESSION['prof_name']) && isset($_SESSION['prof_username'])))
		printf("<script>window.location.href='../index.php';</script>");	
?>