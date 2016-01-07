<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="admin_css.css" />
<title>Edit Hotel Information</title>
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
	<?php
		include("connection.php");
		$id=$_GET['id'];
		if (isset($_POST['edit_submit']))
		{
			$hotelname=$_POST['hotelname'];
			$location=$_POST['location'];
			$roomrate=$_POST['roomrate'];
			$status=$_POST['status'];
			$query=mysql_query("update hotel set name='$hotelname',location='$location',room_rate='$roomrate',status='$status' where hotel_id='$id'");
			header("location:hotel_list.php");
		}
		$qry=mysql_query("select * from hotel where hotel_id='$id'");
		$rec=mysql_fetch_object($qry);
		
	?>
	<form class="edit_hotel" method="post">
    	<div class="edit_element">Name : <input type="text" name="hotelname" class="text_input" value="<?php  echo $rec->name;?>" /></div>      
     	<div class="edit_element">Location : <input type="text" name="location" class="text_input1" value="<?php echo $rec->location;?>" /></div>
        <div class="edit_element">Room Rate : <input type="text" name="roomrate" class="text_input2" value="<?php echo $rec->room_rate; ?>"/></div>
        <div class="edit_element">Status : <?php if ($rec->status=='a')
												{echo "<input type='radio' name='status' value='a' class='text_input3' checked='checked' />";		                                                 echo "Active  ";echo "<input type='radio' name='status' value='ia' />";echo "Inactive";}
											     else
												 {echo "<input type='radio' name='status' value='a' class='text_input3'  />";		                                                 echo "Active  ";echo "<input type='radio' name='status' value='ia' checked='checked' />"; echo "Inactive";}
											
											 ?></div>
        <div class="edit_element"><input type="submit" name="edit_submit" value="Save" class="savebutton"/></div>
    </form>
</div>
</div>
<div class="footer"><div><a href="admin.php" class="logout">Log Out</a></div>

</body>
</html>