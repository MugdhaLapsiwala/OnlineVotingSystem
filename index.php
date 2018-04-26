<html>
<head>
<!--<style>
	div.table{
		margin:30px;
		background-color:#CCCCCC;
		border:16px solid black;
		opacity:0.6;
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


<form method="post" enctype="multipart/form-data" action="">
<div class="table">
<center><h1>Online Voting System</h1></center>
<table align="center" width="40%" cellspacing="10">
	<tr>
    	<td><label>Enter Email Id : </label></td>
        <td><input type="text" name="email" placeholder="Enter your Email-Id here"/></td>
    </tr>
    <tr>
    	<td><label>Enter Password : </label></td>
        <td><input type="password" name="pwd" placeholder="Enter your Password here"/></td>
    </tr>
    <tr>
    	<td colspan="2"><center><input type="submit" name="Login" value="Login"/></center></td>
    </tr>
    <tr>
    	<td colspan="2"><center><a href="forgetpwd.php">Forget Password</a></center></td>
    </tr>
    <tr>
    	<td colspan="2"><center><a href="register.php">Not yet Registered? Register Now</a></center></td>
    </tr>
    <tr>
    <td colspan="2">
		<center>&copy; All Rights Reserved</center></td>
  </tr>
  <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
</table>
</div>
</form>
</body>
</html>
<?php
		if (isset($_POST['Login'])){
			include("../Common/connect.php");
			//session_start();
			$email=$_POST['email'];
			$pwd=$_POST['pwd'];
			$q="select count(*) from voter where Email_id='$email' and Password='$pwd'";
			$res=mysqli_query($con,$q) or die("Query Failed::".mysqli_error());
			$num=mysqli_num_rows($res);
			if($num>0){
				$qry="select Voter_Name from voter where Email_id='$email'";
				$res=mysqli_query($con,$qry) or die("Query Failed:".mysqli_error());
				//$n=mysqli_result::fetch_assoc($res,$);
				
				//$n=mysqli_result($res,$row=0,$field=0);
				//$m=mysqli_result($res,$row=0,$field=1);
				$_SESSION['email']=$email;
				$_SESSION['name']=$n;
				//$_SESSION['lname']=$m;
				if($email=='' || $pwd==''){
					echo "<script type='text/javascript'> alert('Please enter email and password...'); </script>";
				}
				else{
					header("Location: ../Common/home.php");
					echo "<script type='text/javascript'> alert('Successfully Logged In...'); </script>";
				}
			}
			else
				echo "<script type='text/javascript'> alert('Register First.'); </script>";
		}
?>
<?php /*?><?php
		if (isset($_POST['forgetpwd'])){
				include("../Common/connect.php");
				session_start();
				$email=$_POST['email'];
				$_SESSION['email']=$email;
				$q=mysql_query("select Sec_Que from voter where Email_Id='$email'");
				$res=mysql_query($q) or die("Query Failed:".mysql_error());
				$n=mysql_result($res,0,0);
				$_SESSION['sq']=$n;
				echo "$n";
				echo "<script type='text/javascript'> alert('Please Enter Email-Id...'); </script>";
				header("Location: ../Common/forgetpwd.php");
			}
?><?php */?>