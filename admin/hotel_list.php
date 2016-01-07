<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="admin_css.css" />
<title>Admin Page-Hotel List</title>
</head>

<body>

<div class="header">
	<div><a href="create_hotel.php" class="create_hotel" name="create_hotel">Create Hotel</a></div>
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
	<div class="heading">Name</div>
    <div class="heading">Location</div>
    <div class="heading">Room Rent</div>
    <div class="heading">Status</div>
    <div class="heading">Action</div>
    <div class="tables">
    	<?php
			include("connection.php");
			$query=mysql_query("select * from hotel");
			$rec="";
			$id="";
			while($rec=mysql_fetch_object($query))
			{
				$id=$rec->hotel_id;
				echo "<div class=tables_text>$rec->name</div>","<div class=tables_text>$rec->location</div>";
				echo "<div class=tables_text>$rec->room_rate</div>","<div class=tables_text>$rec->status</div>";
				echo "<div class=tables_text><a href='hotel_list_edit.php?id=$id' class=tables_link>Edit</a>/
					  <a href='delete.php?id=$id' class=tables_link>Delete</a></div>";
			}
		?>
    </div>
</div>
</div>
<div class="footer"><div><a href="admin.php" class="logout">Log Out</a></div>

</body>
</html>