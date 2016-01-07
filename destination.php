<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design.css" />
<title>Search Destinations</title>
<link rel="stylesheet" href="css/basic-jquery-slider.css">
<script src="jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
<script src="jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
<script src="cat_slider/js/basic-jquery-slider.js"></script>       
<script>
$(document).ready(function() {
$('#banner').bjqs({
'animation' : 'slide',
'width' : 1000,
'height' : 373
});
});
</script>
</head>

<body>
<div class="main_body">
<div class="header">
<div class="logo">COMPANY NAME</div>
<div class="search">
	<form action="destination.php" method="post">
    <input type="text" name="text" id="text" size="40" placeholder=" What are you looking for?" />
    <input type="image" src="images/go_button.jpg" name="submit" value="Go" class="search_button"/>
    </form>
</div>
</div>
<div class="menu1">
	<ul class="menubar1">
    	<li><a href="aboutus.html" class="menulink" >About Us</a></li>
        <li><a href="properties.html" class="menulink" >Location of Properties</a></li>
        <li><a href="currentoffers.html" class="menulink" >Current Offers</a></li>
        <li><a href="futureprojects.html" class="menulink">Future Projects</a></li>
        <li><a href="traveldesk.html" class="menulink">Travel Desk</a></li>
        <li><a href="contactus.html" class="menulink">Contact Us</a></li>
    </ul>
</div>
<div class="banner1">
<div id="banner" style="margin-top:0px;">
<!-- start Basic Jquery Slider -->
<ul class="bjqs">
  <li><a href="#"><img src="images1/banner6.jpg" width="1000" height="370" ></a></li>
  <li><a href="#"><img src="images1/banner_1.jpg" width="1000" height="370" ></a></li>
  <li><a href="#"><img src="images1/banner_2.jpg" width="1000" height="370" ></a></li>
  <li><a href="#"><img src="images1/banner_3.jpg" width="1000" height="370" ></a></li>
  <li><a href="#"><img src="images1/banner_4.jpg" width="1000" height="370" ></a></li>
  <li><a href="#"><img src="images1/banner_5.jpg" width="1000" height="370" ></a></li>
  <li><a href="#"><img src="images1/banner_6.jpg" width="1000" height="370" ></a></li>
  <li><a href="#"><img src="images1/banner_7.png" width="1000" height="370" ></a></li>
</ul>
<!-- end Basic jQuery Slider -->
</div>
</div>
<div class="main_cont">
	<div class="search_result">SEARCH RESULTS</div>
	<?php
		include("connection.php");
		$qry1=mysql_query("select * from hotel");
		$rec1="";
		$rec2="";
		$text=$_POST['text'];
		$counter=0;
		while($rec1=mysql_fetch_object($qry1))
		{
			$qry2=mysql_query("select * from hotel_image where hotel_id=$rec1->hotel_id");
			$rec2=mysql_fetch_object($qry2);
			if (strcasecmp($text,$rec1->name)==0||strcasecmp($text,$rec1->location)==0)
			{
				echo "<div class='search_image'><img src=admin/gallery_images/".$rec2->image." 
				      name='$rec2->image' alt='$rec2->image' class='image_result'>";
				echo "<div class='image_text'>$rec1->name, $rec1->location</div></div>";
				echo "<div style='clear:both'></div>";
				$counter++;
			}
		}
		if(!$counter) echo "<div class='result_text'>No Results found!!</div>";
    ?>
</div>
<div style="clear:both"></div>
<div class="footer">
	<ul class="footer1">
    	<li><a href="index.html" class="footerlink" >Home</a></li>
     	<li><a href="#" class="footerlink" >Site Map</a></li>
        <li><a href="privacy.html" class="footerlink" >Privacy Policy</a></li>
        <li><a href="contactus.html" class="footerlink1" >Contact Us</a></li>
    </ul>
</div>
</div>
</body>
</html>