<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="event.css" rel ="stylesheet" type="text/css"/>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Event</title>

</head>

<body id="event">
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

<?php

include("config.php");
        //load all news from the database and then OREDER them by newsid
               $result = mysqli_query($connect, "SELECT newsid, time, title, DATE_FORMAT(date, '%m/%e/%Y') AS DateFmt, location, text1 FROM news ORDER BY date DESC");

        //a loop and get all news from the database
        	  
              echo '<div id="backg">';	
             while($row = mysqli_fetch_array($result))
             {//begin of loop
               //now print the results:
               echo '<br><br>';
 			   echo '<div class="div1">';
               echo '<p1><br><b> ';
               echo $row['title']. '</b></p1></div><br>';
               
               
               
               echo '<div class = "div2" style = " height : auto; min-height : 50px; height:auto !important;height:30px;">';
               echo '<b>Time: '.'</b>';
               echo $row['time'] . '<br>';
               echo '<b>Date: '.'</b>';
               echo $row['DateFmt'] . '<br>';
			   echo '<b>Location: '.'</b>';
               echo $row['location'] . '<br><br>';
               echo '<p3 class="indent"><b>'. str_replace("\n", "<br/>", $row['text1']) . '</b></p3></div>';
              }
              echo '</div>';
?>
	<div class="clearFloat" ></div>
	<div id="footer"><br/><p><b>&copy;NEIU 2014 Created by Manya Almatar</b></p></div>

</body>

</html>


