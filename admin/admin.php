<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="admin_css.css" />
</head>

<body>
<?php
	$message="";
	$conn=mysql_connect("localhost","root","");
	mysql_select_db("travelweb",$conn);
	if (isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$pass=$_POST['password'];
		$query=mysql_query("select * from user where username='$username' and password='$pass'");
		$num_rows=mysql_num_rows($query);
		if($num_rows>0)
		{
			$rec=mysql_fetch_object($query);
			$_SESSION['username']= $rec->username;
			header("location:admin_inner.php");
		}
		else
		{
			$message="Incorrect Username/Password";
		}
	}
?>
<div class="header"></div>
<div class="main_body">
	<div class="admin_login">
    	<div class="text">ADMIN LOGIN</div>
        <form method="post" class="admin">
        <div class="error_msg"><?php echo "$message"; ?></div>
        <div class="admin_text">Username :&nbsp;&nbsp; <input type="text" name="username" size="30" placeholder="Enter Username"/></div>
        <br />
        <div class="admin_text1">Password :&nbsp;&nbsp; <input type="password" name="password" size="30" placeholder="Enter Password"/></div>
        <br />
        <input type="submit" name="submit" value="Login" class="login" />
        </form>
    </div>
</div>
<div class="footer"></div>
</html>