	<?php
	include("config.php");

	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email = $_POST['email'];
	

	$email=NULL;
	extract($_POST);
	if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email))
	{
		Print("<p>Invalid email address<br />A valid email has to be in the form<br />Click the back button, enter a valid email and resubmit.<br />Thank you.</p>" );
		die("</body></html>");		
	}
	else
	{
		print("<p>Your email was submitted successfully</p>");
	}
	
	
	
	
	$query = "INSERT INTO mailing_list(first_name, last_name, email)".
			 "VALUES('$first_name', '$last_name', '$email')";

	mysqli_query($connect, $query)
	or die('Error quering the databasse');
	
	echo 'Customer added.' . '' . '<a href ="index.php">Click here to return to the main page</a>'; 
	mysqli_close($connect);
?>