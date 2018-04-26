<html>
<head>
<!--<link href="../Common/style.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
<div class="table">
<form enctype="multipart/form-data" action="positions.php" method="post">
<table align="center" width="100%">
<CAPTION><h3>ADD NEW POSITIONS</h3></CAPTION>
<tr><td colspan="30"><?php include('admin_header.php'); ?></td></tr>
<tr>
    <td align="right"><b>Position Name :</b></td>
    <td><input align="left" type="text" name="position" /></td>
    <td><input align="left" type="submit" name="Submit" value="Add" /></td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
    <td>&nbsp;<td>
</tr>
</table>
<hr>
<table align="center">
<CAPTION><h3><b>AVAILABLE POSITIONS</b></h3></CAPTION>
<tr>
<td><b>Position ID</b></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><b>Position Name</b></td>
<?php
//session_start();
require('../Common/connect.php');
$result=mysqli_query($con,"SELECT * FROM position") or die("There are no records to display ... \n" . mysqli_error()); 
if (mysqli_num_rows($result)<1){
    $result = null;
}
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td><b>" . $row['Position_Id']."</b></td>";
echo "<td>&nbsp;&nbsp;&nbsp;</td>";
echo "<td><b>" . $row['Position_Name']."</b></td>";
echo "<td>&nbsp;&nbsp;&nbsp;</td>";
//echo '<td><input type="submit" name="confirm" value="Delete Position"/></td>';
echo '<td><a name="confirm" href="positions.php?id=' . $row['Position_Id'] . '">Delete Position</a></td>';
echo "</tr>";
}
mysqli_free_result($result);
?>
<?php /*?><?php
	if(isset($_POST['confirm'])){
		$q=mysqli_query("Delete from position where Position_Id=$row['Position_Id']")or die(mysqli_error());
		if(mysqli_num_rows($q)>0){
			echo "<script type='text/javascript' language='javascript'> alert('Are you sure you want to delete position $Position.'); </script>";
		}
		else{
			echo "<script type='text/javascript' language='javascript'> alert('$Position not deleted.'); </script>";
		}
	}
?><?php */?>
<?php
if (isset($_POST['Submit'])){
	$Position = $_POST['position'];
	$sql = mysqli_query($con,"INSERT INTO position VALUES('','$Position')" )
        or die("Could not insert position at the moment". mysqli_error() );

 header("Location: positions.php");
}
?>
<?php
 if (isset($_GET['id'])){
	$id = $_GET['id'];
 	$result = mysqli_query($con,"DELETE FROM position WHERE position_id='$id'")
 	or die("The position does not exist ... \n");
 	header("Location: positions.php");
 }   
?>
</tr>
</form>
</table>
</div>
</body>
</html>
