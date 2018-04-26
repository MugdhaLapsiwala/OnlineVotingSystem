<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Voting System</title>
</head>
<body>
	<form action="" enctype="multipart/form-data" method="post">
    	<div class="table">
			<table align="center" width="100%" cellspacing="20">
            	<tr>
                <td colspan="2">
    				<center><h1 class="label1">Change Password</h1></center>
    			</td></tr>
        <tr><td><?php include("header.php"); ?></td></tr></table>
        <table width="60%" cellspacing="20">
  		   <tr>
    <td><label>Enter Old Password :</label></td>
    <td><input name="opwd" type="password" required autofocus id="txtlogin"/></td>
  </tr>
  <tr>
    <td><label>Enter New Password :</label></td>
    <td><input name="npwd" type="password"  required id="txtlogin"></td>
  </tr>
  <tr>
    <td><label>Enter Confirm Password :</label></td>
    <td><input name="cpwd" type="password"  required id="txtlogin"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="submit" type="submit" value="Change Password"></td>
  </tr>
        </table>
        </div>
        </form>
</body>
</html>
<?php
				if(isset($_POST['submit'])){
					session_start();
					include("../Common/connect.php");
					$npwd=$_POST['npwd'];
					$cpwd=$_POST['cpwd'];
					$n=$_SESSION['fname'];
					$m=$_SESSION['lname'];
					if($npwd!=$cpwd)
						echo "<br/><font color=red size='+2'>Password and confirm Password should match.</font>";
					else{
						$q="update candidate set Password='$npwd' where First_Name='$n' && Last_Name='$m'";						
						$res=mysqli_query($q) or die("\nError Occured".mysqli_error());
    					$num=mysqli_affected_rows();
						if($num>0)	
							echo "<script type='text/javascript'> alert('Password Changed Successfully...'); </script>";
					}
				}
			?>
