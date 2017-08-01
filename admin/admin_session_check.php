<?php
	session_start();
	if (!(isset($_SESSION['admin_name']) && isset($_SESSION['admin_username'])))
		printf("<script>window.location.href='../index.php';</script>");	
?>