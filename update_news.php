<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>

</head>

<body>

<title>Computer Science Society | Update news</title>
<a href="index.php">Home page<a/><br/>
<a href=add_news.php>Add News</a><br/>
<a href="admin_manage.php">Admin page</a>
<br/><br/>
<?php

include("config.php");
        //load all news from the database and then OREDER them by newsid
              $result = mysqli_query($connect, "SELECT * FROM news ORDER BY newsid DESC");
        //a loop and get all news from the database
        while($row = mysqli_fetch_array($result))
             {//begin of loop
               //now print the results:
               echo "<b>Title: ";
               echo $row['title'];
               echo "</b><br>On: <i>";
               echo $row['dtime'];
               echo "</i><hr align=left width=160>"; 
               echo "<b>Time: ";
               echo $row['time']."<br>";
               echo "<b>Date: ";
               echo $row['date']."<br>";
               echo "<b>Location: ";
               echo $row['location']."<br>";
               echo $row['text1'];
               // Now print the options to (Read,Edit & Delete the news)
               echo "<br><a href=\"edit_news.php?newsid=$row[newsid]\">Edit</a>
                 || <a href=\"delete_news.php?newsid=$row[newsid]\">Delete</a><br><hr>";
             }//end of loop
?>
<!--go Home or Add News. It's HTML not PHP -->

</body>

</html>


