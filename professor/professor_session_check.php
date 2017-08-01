<?php
	session_start();
	if (!(isset($_SESSION['prof_name']) && isset($_SESSION['prof_username']) && isset($_SESSION['prof_class']) && isset($_SESSION['prof_section'])))
		printf("<script>window.location.href='../index.php';</script>");	
?>