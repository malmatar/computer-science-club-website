<?php
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<link href="index.css" rel ="stylesheet" type="text/css"/>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Officers</title>

</head>

<body id="officers">
<div id="myDiv">
	<div id="header">
    	<div id="logo"> 
	        <img src="images/blue_banner1.png"
	        alt="" width="1000" height="200"/>         
	     </div>
	</div>
</div>
<div id="wrapper">
	<div id="nav">
		<ul>
		<li><a class="home" href="index.php">Home</a>
		</li></ul>
		
		<ul>
		<li><a class="about" href="about.php">About us</a>
		<ul>
		<li><a class="members" href="members.php">Members</a>
		<ul>
		<li><a class="officers" href="officers.php">Officers</a>
		</li></ul></li></ul></li></ul>
		
		<ul>
		<li><a class="event" href="event.php">Events</a>
		</li></ul>
		
		<ul>
		<li><a class="register" href="register.php">Membership</a>
		</li></ul>
		
		<ul>
		<li><a class="contactUs" href="contactUs.php">Contact us</a>
		</li></ul>	
		
		
	</div>
</div>


<div id="backg">
<h1  align="center"> Officers page</h1>
	<br clear="all" />
		
	
					<table  id="table_regularfont"  width="100%" align="center" border="1" cellpadding="4" cellspacing="1" >
                    	<tr><td width ="130"><strong>Name</strong></td><td width="130"><strong>Picture</strong></td><td width="160"><strong>Email</strong></td><td width="480"><strong>Interests</strong></td><td width = "120"><strong>Title</strong></td></tr>
					
                        <?php
						$sql_query=mysqli_query($connect,"select * from students where category='Officer' ");
						while($student=mysqli_fetch_array($sql_query)){
						?>
                        <tr><td width="130"><?php print $student['name']; ?></td><td width="130"><?php if(!empty($student['picture'])){ ?><img width="100" height="100" src="uploaded_images/<?php print $student['picture']; ?>" /><?php } ?></td><td width="160"><?php print $student['email']; ?></td><td width="500"><?php print $student['interest']; ?></td><td width="120"><?php print $student['title']; ?></td></tr>
                        <?php } ?>
					</table>
	
				<br />

		
		<div class="clearFloat"></div>
		<div id="footer"><br/><p>&copy;NEIU 2014 Created by Manya Almatar</p>
		<p>For admin only: <a href="admin_login.php">Log In</a></p></div>
</div>
		
</body>

</html>
