<?php
		
	include("config.php");
	require 'core.inc.php';
	
			if(loggedin())
			{	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Admin manage page</title>
</head>

<body>
You are logged in. <a href = "logout.php" >Log out</a><br><br>
			<h2>Manage the website here</h2>
			<a href="index.php">Home page<a/>
			<h3>To send an email:<a href="sendemail.html">Send an email</a></h3><br/>
			<h3>To add events/news:<a href="add_news.php">Add events or news</a></h3><br/><br/>
			<h3>To add a member/officer :<a href="admin.php">Add members/officers</a></h3><br/><br/>

				
			
</body>

</html>
<?php
			}else{
				header('Location:admin_manage.php');	
			}
	

?>