<?php
//session_start();
require('../Common/connect.php');
?>
<html><head>
<!--<link href="../Common/style.css" rel="stylesheet" type="text/css" />-->
<script language="JavaScript" src="js/admin.js">
</script>
</head><body>
<div class="table">
<table align="center" width="100%">
<CAPTION><h3>ADD NEW ADMNSTRATION</h3></CAPTION>
<tr><td colspan="2"><?php include('admin_header.php'); ?></td></tr>
<tr>
<td>
<form action="manage-admins.php" method="post">
<table align="center" width="100%">
<tr><td><h3><b>UPDATE ACCOUNT</b></h3></td></tr>
<tr><td><b>Email Address:</b></td><td><input type="text" name="email"></td></tr>
<tr><td><b>New Password:</b></td><td><input type="password" name="pwd"></td></tr>
<tr><td><b>Confirm New Password:</b></td><td><input type="password" name="cpwd"></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Account"></td></tr>
</table>
</form>
</td>
<td>
<form action="manage-admins.php" method="post">
<table align="center" width="100%">
<tr><td><h3><b>CREATE ACCOUNT</b></h3></td></tr>
<tr><td><b>Admin Name:</b></td><td><input type="text" name="name"></td></tr>
<tr><td><b>Email Address:</b></td><td><input type="text" name="email"></td></tr>
<tr><td><b>Password:</b></td><td><input type="password" name="pwd"></td></tr>
<tr><td><b>Confirm Password:</b></td><td><input type="password" name="cpwd"></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Create Account"></td></tr>
</table>
</form>
</td>
</tr>
</table>
</div>
</body></html>

<?php
if (isset($_POST['submit'])){
	$name = $_POST['name']; 
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$cpwd = $_POST['cpwd'];
	if($pwd!=$cpwd)
		echo "<script type='text/javascript'> alert('Password and Confirm Password should match...'); </script>";
	else{
		$sql = mysqli_query($con,"INSERT INTO admin(Admin_Name, Email_Id, Password) VALUES('$name', '$email', '$pwd')" ) or die( mysqli_error() );
		echo "<script type='text/javascript'> alert('Admin Created...'); </script>";
	}
}
if (isset($_POST['update'])){
	session_start();
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$cpwd=$_POST['cpwd'];
	//$n=$_SESSION['fname'];
	//$m=$_SESSION['lname'];
	if($pwd!=$cpwd)
		echo "<script type='text/javascript'> alert('Password and Confirm Password should match...'); </script>";
	else{
		$sql = mysqli_query($con,"UPDATE admin SET Email_Id='$email', Password='$pwd' WHERE Admin_Name='$n'" ) or die( mysqli_error() );
		echo "<script type='text/javascript'> alert('Updated Successful...'); </script>";
	}
}
?>