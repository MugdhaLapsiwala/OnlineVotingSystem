<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<style type="text/css">
	div.table{
		margin:30px;
		background-color:#CCCCCC;
		border:16px solid black;
		opacity:0.7;
		filter: alpha(opacity=60);
	}
	div.table t{
		margin:5%;
		font-weight:bold;
		color:#FFFFFF;
	}
	body{
		background-image:url(403677920-vote-wallpapers.jpeg);
		background-repeat:no-repeat;
		background-size:100%;
	}
</style>-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Voting System</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div class="table">
	<h1><center>Registeration</center></h1>
	<table align="center" cellpadding="20">
    	<tr>
        	<td><label>Enter Name :</label></td>
            <td><input type="text" name="name" autofocus required placeholder="Full Name"></td>
         </tr>
         <tr>
         	<td><label>Enter Email Id :</label></td>
            <td><input type="text" name="emailid" required placeholder="Email Id"></td>
         </tr>
         <tr>
         	<td><label>Enter Password :</label></td>
            <td><input type="password" name="pwd" required placeholder="Password"></td>
         </tr>
         <tr>
         	<td><label>Confirm Password :</label></td>
            <td><input type="password" name="cpwd" required placeholder="Password"></td>
         </tr>
         <tr>
         	<td colspan="2" align="center"><input name="regis" type="submit" value="Register" id="txtlogin" /></td>
         </tr>
    </table>
</form>
</div>
</body>
</html>
<?php
		if (isset($_POST['regis'])){
			include("../Common/connect.php");
			$name=$_POST['name'];
			$email=$_POST['emailid'];
			$pwd=$_POST['pwd'];
			$cpwd=$_POST['cpwd'];
			if($pwd!=$cpwd)
				echo "<script type='text/javascript'> alert('Password and Confirm Password should match...'); </script>";
			else{
				$sql = mysqli_query($con,"INSERT INTO voter(Voter_Name, Email_Id, Password) VALUES('$name', '$email', '$pwd')" ) or die( mysqli_error() );
				echo "<script type='text/javascript'> alert('Voter Created...'); </script>";
			}
		}
		else
			echo "<script type='text/javascript'> alert('Not registered...'); </script>";
?>