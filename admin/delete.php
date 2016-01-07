<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="admin_css.css" />
<title>Hotel-Delete</title>
</head>

<body>

	<?php
		include("connection.php");
		$id=$_GET['id'];
		$query=mysql_query("delete  from hotel where hotel_id='$id'");
		header("location:hotel_list.php");
	?>
</body>
</html>