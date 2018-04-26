<?php
//session_start();
require('../Common/connect.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 //header("location:access-denied.php");
}
?>
<html>
<body>
<form method="post" action="" enctype="multipart/form-data">
<div class="table">
	<table align="center" width="100%" cellspacing="20">
		<tr>
        	<td colspan="2"><center><h1>ADMINISTRATION CONTROL PANEL </h1></center></td>
        </tr>
    	<tr>
            <td colspan="5">
            <?php
					//session_start();
					//$n=$_SESSION['name'];
					//$m=$_SESSION['lname'];
			?>
            <font size="+2">
            <!--<b><label>Welcome </label></b>--><?php /*?><?php echo "<b><i><u>$n</u></i></b>"; ?><?php */?><!--</font></td>-->
	</tr>
	<tr>
        	<td><?php include("admin_header.php"); ?></td>
    </tr>
    <tr>
        		<td colspan="5"><b><label><center>Click a link above to perform an administrative operation.</center></label></b></td>
        </tr>
        <tr>
    <td colspan="5">
		<center>&copy; All Rights Reserved</center></td>
  </tr>
</table>
</div>
</form>
</body></html>