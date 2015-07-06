<?php
include("config.php");
require("class.phpmailer.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<link href="index.css" rel ="stylesheet" type="text/css"/>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Register</title>
<style type="text/css">
	.error {color: #FF0000;
		padding-left:10px;
		font-size:large;}
	#h2{margin-left:50px;}
</style>

</head>

<body id="register">
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
	
		<div>
                <?php
				$reg_box="y";
				if(!empty($_POST['submit'])){
					print "<br><br><center>";
					if(empty($_POST['name'])) print "Please enter your name!<br>";
					elseif(empty($_POST['email'])) print "Please enter your Email!<br>";
					elseif(empty($_POST['type'])) print "Please choose if you are undergrad or grad student!<br>";
					elseif(empty($_POST['interest'])) print "Please enter your interests!<br>";
					else{
						print "The registration was successful. Thank you."."<br/>";
						print( '<a href="http:index.php">Home page</a>'); 
						mysqli_query($connect,"insert into students(name,email,type,acm_confirm,acm_email,interest) values('".$_POST['name']."','".$_POST['email']."','".$_POST['type']."','".$_POST['acm_confirm']."','".$_POST['acm_email']."','".$_POST['interest']."')");
						$reg_box="n"; //don't show registration box upon successful registration
						$mail = new PHPMailer();	 
	
						if(isset($_REQUEST['name'])){$name = $_REQUEST['name'];}
						if(isset($_REQUEST['email'])){$email = $_REQUEST['email'];}
						
						$mail->IsSMTP();  // modified
						$mail->Host="localhost";//SMTP_HOST; // modified
						$mail->Username="info@neiu.acm.org";//SMTP_USER;//modified
						$mail->Password="lanthanides";//SMTP_PASS;
						$mail->SMTPAuth=false;
						$mail->SMTPSecure = 'tls'; //modified
						$mail->From ="info@neiu.acm.org";	// modified
						$mail->FromName =$name;	// modified 	
						$mail->AddAddress("info@neiu.acm.org", " ");
				
						$mail->IsHTML(true);
				
						$mail->Subject = "A new member has registered to the website!";
				
				
						$mail->Body    = "Please add the following member<br>" . $name . '<br>' . $email;
						$mail->Send();


					}
					print "</center>";
						
				}
				if($reg_box!="n"){
				?>
				<h1>Signe up to become a member</h1>
				<p><strong><span class="error">* required field.</span></strong></p>
				<form id="myform" method="post">
					<table id="table" width="700" align="center" >
					
					
					
                        <tr><td width="500">Name:</td><td><input  type="text" name="name"value="<?php if(isset($_POST['submit'])) print $_POST['name']; ?>" /><span class="error">* </span></td></tr>
						<tr><td>Email:</td><td><input  type="text" name="email"value="<?php if(isset($_POST['submit'])) print $_POST['email']; ?>"  /><span class="error">* </span></td></tr>
						
											
						<?php
							$type = $_POST["type"];
						?>
							    						
						<tr><td>Student type:</td><td><select name="type"><option value="">Please select</option><option <?php if(isset($type)&&$type=="Undergrad")echo "selected";?>>Undergrad</option><option <?php if(isset($type)&&$type=="Grad")echo "selected";?>>Grad</option></select><span class="error">* </span></td></tr>                       
						 <tr><td >Do you have an ACM Web Account?(optional)</td><td>
                        <div id="wrapper">
						<label fr="acm-confirm">Yes</label><input type="radio" value="yes" name="acm_confirm" />
						<div class="details"><input type="text" value="ACM EMAIL" name="acm_email" /></div>
						<label fr="acm-confirm">No</label><input checked="checked" type="radio" value="no" name="acm_confirm" />
						<div class="details">Some instructions</div>
						</div></td></tr>
						<tr><td colspan="2">Something interests you:</td></tr>
                        <tr><td colspan="2"><textarea cols="30" name="interest" rows="6"><?php if(isset($_POST['submit'])) print $_POST['interest']; ?></textarea><span class="error">* </span></td></tr>
						<tr><td colspan="2"><input type="submit" value="Submit" name="submit" /></td></tr>
						
					</table>
											

											
				</form>
                <?php
				}
				?>
				<br />

		</div>
		<div class="clearFloat"></div>
		<div id="footer"><br/><p>&copy;NEIU 2014 Created by Manya Almatar</p>
		<p>For admin only: <a href="admin_login.php">Log In</a></p></div>
</div>
		
</body>

</html>
