<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="admin_css.css" />
<title>Edit Your Profile</title>
</head>
<script>
	function success_msg()
	{
		alert("Password Changed successfully!");
		window.location="admin_inner.php";
	}
</script>

<body>
<div class="header"></div>
<div class="main_body">
<div class="sidebar">
	<ul class="sidelink1">
	<li><a href="hotel_list.php" class="sidelink">Create Hotel List</a></li>
    <li><a href="hotel_image_list.php" class="sidelink">Upload Hotel Image</a></li>
    <li><a href="edit_profile.php" class="sidelink">Edit Your Profile</a></li>
    <li><a href="booking_info.php" class="sidelink">View Booking</a></li>
    </ul>
</div>
<div class="main_cont">
	<?php
		include("connection.php");
		$message="";
		if (isset($_POST['edit_profile_sub']))
		{
			$username=$_POST['username'];
			$old_pass=$_POST['old_pass'];
			$new_pass=$_POST['new_pass'];
			$qry=mysql_query("select * from user where username='$username' and password='$old_pass'");
			$num_rows=mysql_num_rows($qry);
			if ($num_rows>0)
			{
				$qry1=mysql_query("update user set password='$new_pass' where username='$username'");
				$message="Password changed successfully!";
				echo "<script>success_msg();</script>";	
			}
			else 
			{
				$message="Incorrect Username / Old Password";
			}	
		}
	
	?>
	<form class="edit_hotel" method="post">
    	<div class="error_msg"><?php echo "$message"; ?></div>
    	<div class="edit_element">Username : <input type="text" name="username" placeholder="Enter Username" class="text_input"/></div>      
     	<div class="edit_element">Old Password : <input type="password" name="old_pass" placeholder="Enter Old Password" class="text_input4"/></div>
        <div class="edit_element">New Password : <input type="password" name="new_pass" placeholder="Enter New Password" class="text_input5"/></div>
        <div class="edit_element"><input type="submit" name="edit_profile_sub" value="Change" class="changebutton"/></div>
    </form>
</div>
</div>
<div class="footer"><div><a href="admin.php" class="logout">Log Out</a></div>
</body>
</html>