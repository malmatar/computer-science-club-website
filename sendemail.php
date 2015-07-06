<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Send email</title>
</head>

<body>
<?php
include("config.php");
print( '<a href="http:index.php">Home page</a>'); 
if(isset($_POST['submit']))
{

	require("class.phpmailer.php");		// modified
	 // config options
	$mail = new PHPMailer();	 // modified
	
			   
	$query = "SELECT * FROM mailing_list";
	$result = mysqli_query($connect, $query)
	
	or die('Error querring the database!');
	
		$mail->IsSMTP();  // modified
		$mail->Host="localhost";//SMTP_HOST; // modified
		$mail->Username="info@neiu.acm.org";//SMTP_USER;//modified
		$mail->Password="lanthanides";//SMTP_PASS;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure = 'tls'; //modified
		$mail->From ="info@neiu.acm.org";	// modified
		$mail->FromName ="Computer Science Society";	// modified
	
	while($row = mysqli_fetch_array($result))
	{
		
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$to = $row['email'];
		$mail->ClearAddresses();  		
		$mail->AddAddress($to);	// modified
	
	
		$mail->Subject= $_POST['subject'];
	
		$mail->Body = "Dear $first_name $last_name,\n" . $_POST['body'];
		$mail->WordWrap = 50;
					
		if(!$mail->Send()) 
		{
			echo 'Message was not sent to ' . $to;
			echo 'Mailer error: ';
		} 
		else 
		{
			echo 'Message has been sent.';
			echo 'Email sent to ' . $to . '<br/>';
		}
			
		
	}
	
	
	mysqli_close($connect);	
}	

/*
require("class.phpmailer.php");
$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "smtp.aol.com"; // SMTP server

$mail->From     = "maniaammatar@yahoo.com";
$mail->AddAddress("adabuk2@hotmail.com");
 
$mail->Subject  = "First PHPMailer Message";
$mail->Body     = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
$mail->WordWrap = 50;
 
if(!$mail->Send()) 
{
	echo 'Message was not sent.';
	echo 'Mailer error: ' . $mail->ErrorInfo;
} 
else 
{
	echo 'Message has been sent.';
}

*/


?>
</body>



</html>
