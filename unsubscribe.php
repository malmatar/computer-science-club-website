<?php
				include("config.php");
				if(isset($_POST['email']))
				{
					$email = trim($_POST['email']);
					// Check if the e-mail address is in the table
					$query = "SELECT * FROM mailing_list where `email` = '$email'";
					$result = mysqli_query($connect,$query);
					$numRows = $result->num_rows;
					// Delete user from table
					$query = "DELETE FROM mailing_list where `email` = '$email'";
					if($numRows > 0 && mysqli_query($connect,$query))
					{
						header('Refresh: 5; URL=index.php');
						echo "Your name was deleted from our mailing list successfully. You will now be taken back to the home page.";
					}
					else
					{
						echo "We do not have that e-mail address in our database.";
					}	
					mysqli_close($connect);
				}
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Unsubscribe</title>
</head>

<body>
		
  <form action="unsubscribe.php" method="post">
			 Please enter your email: <input name="email" type="text" /> <br/><br/>
			 <input name="Submit" type="submit" value="delete record" />
  </form> 	

		
</body>

</html>
