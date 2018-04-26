<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<link href="style.css" type="text/css" rel="stylesheet">-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Voting System</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
	<table align="center" width="100%" cellspacing="20">
    	<tr>
            <td colspan="5">
            <?php
					session_start();
					$n=$_SESSION['name'];
					//$m=$_SESSION['lname'];
					//echo "$n $m";
			?>
            <font size="+2">
            <!--<b><label>Welcome </label></b>--><?php /*?><?php echo "<b><i><u>$n $m</u></i></b>"; ?><?php */?><!--</font></td>-->
        </tr>
        <tr>
        	<td><?php include("header.php"); ?></td>
        </tr>
        <tr>
        		<td colspan="5"><b><label><center>Click any link above to do some stuff.</center></label></b></td>
        </tr>
        <tr>
    <td colspan="5">
		<center>&copy; All Rights Reserved</center></td>
  </tr>
    </table>
</form>
</body>
</html>
