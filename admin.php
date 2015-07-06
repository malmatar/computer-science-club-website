<?php
include("config.php");
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
/* needs to be enabled to allow only admin to see this page
if(empty($_SESSION['user_id'])){
	die("<a href=\"admin_login.php\">Please login first</a>");	
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<link href="index.css" rel ="stylesheet" type="text/css"/>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

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
	
		
				
                <?php
				if(!empty($_GET['rid'])){
					$studentinfo=mysqli_fetch_array(mysqli_query($connect,"select * from students where id='$_GET[rid]' "));
					if(!empty($studentinfo['picture'])){
					if(file_exists("uploaded_images/".$studentinfo['picture'])){
						unlink("uploaded_images/".$studentinfo['picture']);
					}
					}
					mysqli_query($connect,"update students set picture='' where id='$_GET[rid]'");
				}
				if(!empty($_POST['delete'])){
					if(isset($_POST['student'])){
					$selected_students=$_POST['student'];
					foreach($selected_students as $k=>$v){
						$studentinfo=mysqli_fetch_array(mysqli_query($connect,"select * from students where id='".$v."' "));
						if(!empty($studentinfo['picture'])){
						if(file_exists("uploaded_images/".$studentinfo['picture'])){
							unlink("uploaded_images/".$studentinfo['picture']);
						}
						}						
						mysqli_query($connect,"delete from students where id='".$v."'");
					}
					print "<br><br><center>Successfully done!<br></center>";
					}	
				}
	
				if(!empty($_POST['update1'])){
					
				if(isset($_POST['student'])){
					$selected_students=$_POST['student'];
					foreach($selected_students as $k=>$v){					
					
					
					
					
					
					
						$sql_query=mysqli_query($connect,"select * from students where id='$v' ");
						while($student=mysqli_fetch_array($sql_query)){
							$var_name_img="img_m".$student['id'];
							
							if(isset($_FILES[$var_name_img]['tmp_name'])){
								
							if( (is_uploaded_file($_FILES[$var_name_img]['tmp_name']))  ){	
							
							###################################
										$image=$_FILES[$var_name_img]['name'];
										if($image!="")
										{
										$rnd=rand(100000,999999);
										
										$dir="uploaded_images/";
										
										$filename = stripslashes($_FILES[$var_name_img]['name']);
							$extension = getExtension($filename);
										$sysfilename="$rnd.".$extension;
							
										$target=$dir.$sysfilename;
										$isupl = copy($_FILES[$var_name_img]['tmp_name'], $target);
										$query="update students set picture='$sysfilename' where id='".$student['id']."' ";
										mysqli_query($connect,$query);
										$uploaded="ok";
										}
										else
										{
										$sysfilename="";
										}
									#################################
							}		
							}
							
							
						}
					}
				}
						print "<br><br><center>Successfully updated!<br></center>";
				}	
				?>
                <?php
				if(isset($_GET['ac']) and $_GET['ac']=="edit"){
					print " <br clear=\"all\" /> ";
					if(!empty($_POST['upd'])){
							$query="update students set category='".$_POST['category']."',title='".$_POST['title']."', name='".$_POST['name']."', email='".$_POST['email']."', type='".$_POST['type']."', acm_email='".$_POST['acm_email']."', interest='".$_POST['interest']."', acm_confirm ='".$_POST['acm_confirm']."' where id='".$_GET['id']."' ";
							mysqli_query($connect,$query);		
							print "<center>Information updated successfully. <br> <a href=\"?\">Click here</a> to return</center>";				
					}
					
					
					$editdetails_query=mysqli_query($connect,"select * from students where id='".$_GET['id']."' ");
					$editdetails=mysqli_fetch_array($editdetails_query);
					?>
                     <br clear="all" />
                    <form method="post">
                    <table id="table_regularfont"  width="100%" align="center" border="1" cellpadding="4" cellspacing="0" >
                    	<tr><td>Name:</td><td><input type="text" name="name" value="<?php print $editdetails['name']; ?>" /></td></tr>
                        <tr><td>Email:</td><td><input type="text" name="email" value="<?php print $editdetails['email']; ?>" /></td></tr>
                        <tr><td>ACM Web:</td><td><select name="acm_confirm"><option>---</option><option <?php if($editdetails['acm_confirm']=='Yes') print " selected=\"selected\" "; ?> >Yes</option><option <?php if($editdetails['acm_confirm']=='No') print " selected=\"selected\" "; ?> >No</option></select></td></tr>
                        <tr><td>ACM Email:</td><td><input type="text" name="acm_email" value="<?php print $editdetails['acm_email']; ?>" /></td></tr>
                        <tr><td>Student Type:</td><td><select name="type"><option>---</option><option <?php if($editdetails['type']=='Grad') print " selected=\"selected\" "; ?> >Grad</option><option <?php if($editdetails['type']=='Undergrad') print " selected=\"selected\" "; ?> >Undergrad</option></select></td></tr>
                        <tr><td>Interests:</td><td><textarea name="interest"><?php print $editdetails['interest']; ?></textarea></td></tr>
                    	<tr><td>Category:</td><td><select name="category"><option>---</option><option <?php if($editdetails['category']=="Officer"){ print " selected=\"selected\" "; } ?> >Officer</option><option <?php if($editdetails['category']=="Member"){ print " selected=\"selected\" "; } ?> >Member</option></select></td></tr>
                        <tr><td>Title:</td><td><input type="text" name="title" value="<?php print $editdetails['title']; ?>" /></td></tr>
                        <tr><td colspan="2"><input type="submit" name="upd" value="Update" /></td></tr>
                    </table>
                    </form>
                    <?php
					
				}else{
				
				?>
                <br clear="all" />
                <form id="myform" method="post" enctype="multipart/form-data">
					<table id="table_regularfont"  width="1600" align="center" border="1" cellpadding="4" cellspacing="0" >
                    	<tr><td>#</td><td width="200">Name</td><td width="200">Email</td><td>Student Type</td><td>ACM</td><td width="200">ACM Email</td><td width="500">Interests</td><td>Title</td><td>Officer/Member</td><td>Picture</td><td>Action</td></tr>
                        <?php
						$sql_query=mysqli_query($connect,"select * from students ");
						while($student=mysqli_fetch_array($sql_query)){
						?>
                        <tr><td><input type="checkbox" name="student[]" value="<?php print $student['id']; ?>" /></td><td><?php print $student['name']; ?></td><td><?php print $student['email']; ?></td><td><?php print $student['type']; ?></td><td><?php print $student['acm_confirm']; ?></td><td><?php print $student['acm_email']; ?></td><td><?php print $student['interest']; ?></td>
                        
                        <td><?php print $student['title']; ?></td><td><?php print $student['category']; ?>
                        
                        </td><td><?php if(!empty($student['picture'])){ print "<img width=\"25\" height=\"25\" src=\"uploaded_images/".$student['picture']."\" /><br>
						<a href=\"?rid=$student[id]\">Delete Picture</a><br>
						"; } ?><input type="file" name="img_m<?php print $student['id']; ?>" /></td><td><a href="?ac=edit&id=<?php print $student['id']; ?>">Edit</a></td></tr>
                        <?php } ?>
                      
                        <tr><td colspan="4"><input type="submit" name="delete" value="Delete selected students" /><input type="submit" name="update1" value="Add a picture for the selected student" /> </td></tr>

					</table>
											
				</form>
				<?php
				}
				?>
				<br />
                Notes: Leave the image field empty if you are not going to upload/update a picture<br />

		
		<div class="clearFloat"></div>
		<div id="footer"><br/><p>&copy;NEIU 2014 Created by Manya Almatar</p>
		<p>For admin only: <a href="admin_login.php">Log In</a></p></div>
</div>
		
</body>

</html>
