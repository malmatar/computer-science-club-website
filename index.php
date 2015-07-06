<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link href="index.css" rel ="stylesheet" type="text/css"/>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Home</title>
<script type="text/javascript">
<!--
var image1=new Image()
image1.src="images/firstimage.jpg"
var image2=new Image()
image2.src="images/secondimage.jpg"
var image3=new Image()
image3.src="images/thirdimage.jpg"
//-->
</script>
</head>

<body id=home>
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
		<div id="slides">
			<img src="firstcar.gif" name="slide" width="630" height="450" />
			<script type="text/javascript">
			<!--
			//variable that will increment through the images
			var step=1
			function slideit(){
			//if browser does not support the image object, exit.
			if (!document.images)
			return
			document.images.slide.src=eval("image"+step+".src")
			if (step<3)
			step++
			else
			step=1
			//call function "slideit()" every 2.5 seconds
			setTimeout("slideit()",2500)
			}
			slideit()
			//-->
			</script>	
		</div>
		<div id="welcome">
				<form id="myform" method="post" action="addmail.php">
					<table id="table" align="center" >
						<caption><br/><strong>Welcome to the NEIUComputer Science Club website.</strong><br/><br/></caption>		
						<tr><td colspan=2><strong>Please join our mailing list:</strong></td></tr> 
						<tr><td>First Name:</td><td><input  type="text" id="firstname" name="firstname"/></td></tr>
						<tr><td>Last Name:</td><td><input  type="text" id="lastname" name="lastname"/></td></tr>
						<tr><td>Email:</td><td><input  type="text" id="email" name="email"/></td></tr>
						<tr><td></td><td><input type="submit" name="submit" value="submit"/></td></tr>
						

					</table>
											
				</form>
				<p>To unsubscribe: <a href="unsubscribe.php">Unsubscribe</a></p>

		</div>
		<div class="clearFloat"></div>
		<div id="footer"><br/><p>&copy;NEIU 2014 Created by Manya Almatar</p>
		<p>For admin only: <a href="admin_login.php">Log In</a></p></div>
</div>
		
</body>

</html>
