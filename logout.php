<?php
	require 'core.inc.php';
	session_destroy();
	header('Location:admin_login.php');	
	
?>