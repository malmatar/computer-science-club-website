<?php



	ob_start();
	session_start();
	$current_file = $_SERVER['SCRIPT_NAME'];
	function loggedin()
	{
		if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
			return true;
		}else{
			return false;
		}
	
	}
	function getuserfield($field)
	{
		 $query = "SELECT `$field` FROM `admin_login` WHERE `id` = '".$_SESSION['user_id']."'";
		 if($query_run = mysqli_query($query)){
		 	return mysqli_result($query_run, 0, $field);
		 }
	}
?>