<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Add news</title>
</head>

<body>

<?php 

	include("config.php");

  	if($_SERVER['REQUEST_METHOD'] == "POST") 
   	{

      $title = ($_POST['title']); 
      $text1 = ($_POST['text1']);  
      $date = 	($_POST['date']);
	  $time =   ($_POST['time']);
	  $location = ($_POST['location']);




       //run the query which adds the data gathered from the form into the database 
       $sql = "INSERT INTO news (title, dtime, text1, date, time, location) 
                       VALUES ('$title',NOW(),'$text1','$date', '$time', '$location')"; 
                          
        //check it the new record is added                  
        if (!mysqli_query($connect,$sql))
   		{
  	 	die('Error: ' . mysqli_error($connect));
   		}
 		echo "1 event added";

		 mysqli_close($connect);
           
  } 

?> 

     
      <br/> 
	  <a href="admin_manage.php">Admin page</a><br/>
      <h3>::Add News</h3> 

      <form method="post" action="add_news.php"> 
	      Title: <input name="title" size="40" maxlength="255"/> 
	      <br/><br/> 
	      Description: <textarea name="text1"  rows="7" cols="30"></textarea> 
	      <br/><br/> 
			<strong><p>Please enter the date in form yyyy/mm/dd<p/><strong/>
	      Date: <input name="date" size="40" maxlength="255"/> 
	      <br/><br/>  
		  Time: <input name="time" size="40" maxlength="255"/> 
	      <br/><br/> 
		  Location: <input name="location" size="40" maxlength="255"/> 
	       <br/><br/> 
	      <input type="submit" name="submit" value="Add News"/> 
	      <br/> 
      
      </form> 
      <br/>
	  <a href="index.php">Home page<a/>
      <a href="update_news.php" >Update page</a> 
      
</body>

</html>

  
  

