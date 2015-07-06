<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Computer Science Society | Edit news</title>
</head>

<body>


<?php


include("config.php");
//$newsid = (isset($_GET['newsid']) ? $_GET['newsid'] : null);
$newsid =  ($_REQUEST['newsid']); // is used for both $_GET/$_POST variables

if(isset($_POST['submit']))
{

      $title =  ereg_replace( "\n",'|', ($_POST['title']));
      $text1 =  ($_POST['text1']);
	  $date = 	($_POST['date']);
	  $time =   ($_POST['time']);
	  $location = ($_POST['location']);


      $result = mysqli_query($connect, "UPDATE news SET title='$title', text1='$text1', date='$date', time='$time', location='$location' WHERE newsid='$newsid' ");

          echo "<b>Thank you! News UPDATED Successfully!";
          
}
elseif($newsid)
{

        $result = mysqli_query($connect, "SELECT * FROM news WHERE newsid='$newsid' ");
        $row = mysqli_fetch_assoc($result);
             
                $title = $row["title"];
                $text1 = $row["text1"];
				$time = $row["time"];
				$date = $row["date"];
				$location = $row["location"];
				
?>
<br/>
<h3>::Edit News</h3>

<form method="post" action="edit_news.php">
<input type="hidden" name="newsid" value="<?php echo $row['newsid']?>"/>

Title: <input name="title" size="40" maxlength="255" value="<?php echo $title; ?>"/>
<br/><br/>
Description: <textarea name="text1"  rows="7" cols="30"><?php echo $text1; ?></textarea>
<br/><br/>
Time: <input name="time" size="40" maxlength="255" value="<?php echo $time; ?>"/>
<br/><br/>
Date: <input name="date" size="40" maxlength="255" value="<?php echo $date; ?>"/>
<br/><br/>
Location: <input name="location" size="40" maxlength="255" value="<?php echo $location; ?>"/>
<br/><br/>

<input type="submit" name="submit" value="Update News"/>
</form>
             
<?php
}//end else
 ?>   
 <br/><a href="update_news.php" >Update page</a> 
     
</body>

</html>

