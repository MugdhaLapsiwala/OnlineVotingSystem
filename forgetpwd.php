<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<form action="" enctype="multipart/form-data" method="post">
    	<div class="table">
			<table align="center" width="100%" cellspacing="20">
            	<tr>
                	<td colspan="2">
    					<center><h1 class="label1">Forgot Password</h1></center>
    				</td>
                </tr>
            </table>
        <table width="60%" cellspacing="20">
  			<tr>
            	<td><label>Enter your Email Id :</label></td>
                <td><input name="email" type="text"></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><input name="submit" type="submit" value="Click here to know your Password.">
            </tr>
            <tr>
    			<!--<td><label>Your Security Question :</label></td>-->
    			<td>
         	<?php	
				if(isset($_POST['submit'])){
					include("../Common/connect.php");
					$email=$_POST['email'];
					$sql= "SELECT  Password FROM voter WHERE Email_Id ='$email'"; 
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					$nor=mysqli_num_rows($query);
					if($nor){
						function makepassword($length){
							$validchar="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
							$validcharnum=strlen($validchar);
							$result="";
							for($i=0;$i<$length;$i++){
								$index = mt_rand(0,$validcharnum - 1);
								$result .= $validchar[$index];
							} 
							return $result;
						}
						$random=makepassword(10);
						$final=mysqli_query($con,"update voter set Password='$random' where Email_Id='$email'");
						if($final){
							echo "<br/>Your Password is:".$random;
						}
					}
					else{
						echo "<br/>Email not found.";
					}
					
			}
		?>
    </td>
  </tr>
  <!--<tr>
    <td><label>Enter Security Answer :</label></td>
    <td><input name="sans" type="text"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="Done" type="submit" value="Done">-->
    <?php /*?><?php
	if(isset($_POST['Done'])){
		$ans=$_POST['sans'];
		include("../Common/connect.php");
		$q=mysql_query("select Password from voter where Sec_Ans='$ans'");
		//$res=mysql_query($q);
		$nor=mysql_num_rows($q);
		$pass=mysql_result($q,0,0);
		//echo "$nor";
		//echo "<font color='white'>$q</font>";
		if($nor>0){
			echo "<script type='text/javascript' language='javascript'> alert('Your Password is $pass'); </script>";
			//echo "<input type='text' name='pass' value='$pass'>";
			//echo "<input type="button" name="login" value="Back to Login Page" onclick="Location='../Common/login.php'">";
		}
		else{
			echo "<script type='text/javascript' language='javascript'> alert('Invalid Answer'); </script>";		
		}
	}
	
?><?php */?>
    </td>
  </tr>
  <tr>
  	<td colspan="2" align="center"><a href="index.php">Back to login page</a></td>
   </tr>
        </table>
        </div>
        </form>
</body>
</html>
