<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<form action="" enctype="multipart/form-data" method="post">
    	<div class="table">
			<table align="center" width="100%" cellspacing="20">
            	<tr>
                <td colspan="2">
    				<center><h1 class="label1">Manage Profile</h1></center>
    			</td></tr>
        <tr><td><?php include("header.php"); ?></td></tr></table>
        <table width="60%" cellspacing="20">
  		<tr>
    <td><label>First Name :</label></td>
    <td><input name="fname" type="text"></td>
  </tr>
  <tr>
    <td><label>Last Name :</label></td>
    <td><input name="lname" type="text"></td>
  </tr>
  <tr>
    <td><label>Security Question :</label></td>
    <td><select name="sque">
      <option>What is your favourite color ?</option>
      <option>What is your favourite cartoon ?</option>
      <option>What is your birth place ?</option>
      <option>Who is your favourite teacher ? </option>
    </select></td>
  </tr>
  <tr>
    <td><label>Security Answer :</label></td>
    <td><input name="sans" type="text"></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td colspan="2" align="center"><input name="Update" type="submit" value="Update"></td>
  </tr>
        </table>
        </div>
    </form>
</body>
</html>
<?php
	echo "<font color='white'>";
		if (isset($_POST['Update'])){
			session_start();
			include("../Common/connect.php");
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$sque=$_POST['sque'];
			$sans=$_POST['sans'];
			$n=$_SESSION['fname'];
			$m=$_SESSION['lname'];
			//echo "$n&nbsp;$m";
			$q="update voter set First_Name='$fname',Last_Name='$lname',Sec_Que='$sque',Sec_Ans='$sans' where First_Name='$n' && Last_Name='$m'";						
			$res=mysqli_query($con,$q) or die("\nError Occured".mysqli_error());
    		$num=mysqli_affected_rows();
			if($num>0)	
				echo "<script type='text/javascript'> alert('Updated Successful...'); </script>";
			else
				echo "<script type='text/javascript'> alert('Update Unsuccessful...'); </script>";
	}
	echo "</font>";
?>
