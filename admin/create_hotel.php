<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="admin_css.css" />
<title>Admin Page-Hotel List</title>
</head>

<body>

<div class="header">
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
	<div class="create_hotel_text">CREATE HOTEL</div>
    <?php
		include("connection.php");
		if (isset($_POST['create_submit']))
		{
			$hotelname=$_POST['hotelname'];
			$location=$_POST['location'];
			$roomrate=$_POST['roomrate'];
			$status=$_POST['status'];
			$query=mysql_query("insert into hotel set name='$hotelname',location='$location',room_rate='$roomrate',status='$status'");
			header("location:hotel_list.php");
		}
		
	?>
	<form class="edit_hotel" method="post">
    	<div class="edit_element">Name : <input type="text" name="hotelname" placeholder="Enter Hotelname" class="text_input"/></div>
        
     	<div class="edit_element">Location : <input type="text" name="location" placeholder="Enter Location" class="text_input1"/></div>
        <div class="edit_element">Room Rate : <input type="text" name="roomrate" placeholder="Enter Room rent" class="text_input2"/></div>
        <div class="edit_element">Status : <input type="radio" name="status" value="a" class="text_input3" />Active  
        									<input type="radio" name="status" value="ia" />Inactive</div>
        <div class="edit_element"><input type="submit" name="create_submit" value="Create" class="savebutton"/></div>
    </form>

</div>
</div>
<div class="footer"><div><a href="admin.php" class="logout">Log Out</a></div>

</body>
</html>