<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Email</title>
</head>

<body>
<?php
		require("class.phpmailer.php");		// modified
	 	$mail = new PHPMailer();	 // modified
	
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'] ;
		$message = $_REQUEST['message'] ;

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

		$mail->Subject = "You have received feedback from your website!";


		$mail->Body    = $email . $message;
		$mail->AltBody = $message;

		if(!$mail->Send())
		{
		  echo "Message could not be sent. <p>";
		  echo "Mailer Error: " . $mail->ErrorInfo;
		  exit;
		}
			
			echo "Message has been sent" . "<br/>";
			print( '<a href="http:index.php">Home page</a>'); 
			
			
?>




</body>

</html>
