<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="admin_css.css" />
<title>Booking Information</title>
</head>

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
	<div class="heading1">Username</div>
    <div class="heading_address">User Address</div>
    <div class="heading_phone">Phone</div>	
    <div class="heading1">Hotel Name</div>
    <div class="heading_date">From</div>
    <div class="heading_date">To</div>
    <div class="heading_count">Children</div>
    <div class="heading_count">Adults</div>
    <div class="tables">
    	<?php
			include("connection.php");
			$qry1="";
			$qry2="";
			$qry3=mysql_query("select * from booking");
			$rec_user="";
			$rec_hotel="";
			$rec_booking="";
			$userid="";
			$hotelid="";
			while($rec_booking=mysql_fetch_object($qry3))
			{
				$userid=$rec_booking->user_id;
				$hotelid=$rec_booking->hotel_id;
				$qry1=mysql_query("select * from user where id='$userid'");
				$qry2=mysql_query("select * from hotel where hotel_id='$hotelid'");
				$rec_user=mysql_fetch_object($qry1);
				$rec_hotel=mysql_fetch_object($qry2);
				echo "<div class='tables_text1'>$rec_user->username</div>";	
				echo "<div class='tables_text_address'>$rec_user->address</div>";
				echo "<div class='tables_text_phone'>$rec_user->ph_no</div>";
				echo "<div class='tables_text1'>$rec_hotel->name</div>";
				echo "<div class='tables_text_date'>$rec_booking->from_date</div>";
				echo "<div class='tables_text_date'>$rec_booking->to_date</div>";
				echo "<div class='tables_text_count'>$rec_booking->children</div>";
				echo "<div class='tables_text_count'>$rec_booking->adult</div>";
			}
		
		?>
        
    </div>
</div>
</div>
<div class="footer"><div><a href="admin.php" class="logout">Log Out</a></div>

</body>
</html>