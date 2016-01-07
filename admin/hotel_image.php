<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="admin_css.css" />
<title>Upload Hotel Image</title>
<script>
	function success_upload()
	{
		alert("File Uploaded Successfully!!");
		window.location="hotel_image.php";
	}
</script>
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
			if(isset($_POST['file_submit']))
			{
				$temp=$_FILES['file_upload']['tmp_name'];
				$filename=$_FILES['file_upload']['name'];
				$filepath="gallery_images/".$filename;
				move_uploaded_file($temp,$filepath);
				$selected_hotel=$_POST['select_hotel'];
				$qry2=mysql_query("select * from hotel where name='$selected_hotel'");
				$rec1=mysql_fetch_object($qry2);
				$qry1=mysql_query("insert into hotel_image set hotel_id='$rec1->hotel_id', image='$filename', status='$rec1->status'");
				echo "<script>success_upload()</script>";	
			}
		?>
    	<form method="post" enctype="multipart/form-data" class="upload">
        	<select name="select_hotel" class="select_hotel">
            	<option value="" style="display:none">Select Hotel</option>
                <?php
					include("connection.php");
					$qry=mysql_query("select * from hotel");
					$rec="";
					while ($rec=mysql_fetch_object($qry))
					{
						echo "<option value='$rec->name'>$rec->name</option>";
					}
					
				?>
              </select> 
              <label for="file_upload">Choose file to upload:</label><input type="file" name="file_upload" id="file_upload" />
              <br />
              <input type="submit" name="file_submit" class="file_submit" value="Upload"/>
        </form>
</div>
</div>
<div class="footer"><div><a href="admin.php" class="logout">Log Out</a></div>

</body>
</html>