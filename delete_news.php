<?php


		include("config.php");
		
				//$newsid = (isset($_GET['newsid']) ? $_GET['newsid'] : null); 
				$newsid =  ($_REQUEST['newsid']);       
		        $result = mysqli_query($connect,"DELETE FROM news WHERE newsid='$newsid' ");
		
		header("Refresh: 5; URL=update_news.php");
		echo "<b>News Deleted!<b><br>";
		                     
		?> 
<title>news</title>
		<a href="update_news.php" >Update page</a> 
		               
