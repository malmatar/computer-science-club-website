<?php
	include("config.php");
	session_start();
		
	if(isset($_POST['username'])&&isset($_POST['password'])){
			$user = $_POST['username'];
			$pass = $_POST['password'];
			
	
		if(!empty($user)&&!empty($pass)){
				$query="SELECT `id` FROM `admin_login` WHERE `username`='$user' AND `password`= '$pass'";
			if($query_run = mysqli_query($connect, $query)){
				$query_num_rows = mysqli_num_rows($query_run);
				
				if($query_num_rows==0){
					$errorMsg = 'Invalid username/password combination.';
				}else if($query_num_rows==1){
			
					$user_id = mysqli_fetch_row($query_run);
					$_SESSION['user_id'] = 	$user_id[0];
					header('Location:admin_manage.php');	
				}	
			}
			
		}else{
			$errorMsg = 'You must supply a username and password';	
		}
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Admin login</title>
</head>

<body>
<?php if(!empty($errorMsg)) { ?>
<p style="color:red"><?php echo $errorMsg; ?></p>
<?php } ?>
	<form action="admin_login.php" method="post">
			Username:<input type="text" name="username"/><br/><br/>
			Password:<input type="password" name="password"/><br/><br/>
			<input type="submit" value="Log in"/>
	
	
	</form>
	

</body>

</html>
