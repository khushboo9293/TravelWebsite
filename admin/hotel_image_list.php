<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Hotel Image</title>
<link rel="stylesheet" type="text/css" href="admin_css.css" />
</head>

<body>

<div class="header">
	<div><a href="hotel_image.php" class="create_hotel" name="create_hotel">Upload Image</a></div>
</div>
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
	<div class="image_list">
    	<?php
			include("connection.php");
			$qry1=mysql_query("select * from hotel_image");
			$rec="";
			$id="";
			while($rec=mysql_fetch_object($qry1))
			{
				$query=mysql_query("select * from hotel where hotel_id=$rec->hotel_id");
				$rec1=mysql_fetch_object($query);
				$id=$rec->id;
				echo "<div class='image'><img src=gallery_images/".$rec->image." title='$rec->image' alt='$rec->image' class='image1'/>&nbsp;&nbsp;";
				echo "$rec1->name";
				echo "<a href='delete_image.php?id=$id' class=images_delete>Delete</a></div>";
			}
		?>
    </div>

</div>
<div class="footer"><div><a href="admin.php" class="logout">Log Out</a></div>
</body>
</html>