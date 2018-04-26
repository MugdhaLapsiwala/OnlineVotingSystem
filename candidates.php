<?php
//session_start();
require('../Common/connect.php');
$result=mysqli_query($con,"SELECT * FROM candidate")
or die("There are no records to display ... \n" . mysqli_error()); 
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
	$positions_retrieved=mysqli_query($con,"SELECT * FROM position")
	or die("There are no records to display ... \n" . mysqli_error()); 
?>
<?php
if (isset($_POST['Submit'])){
	$cname =$_POST['name'];
	$position =$_POST['position'];
	$pic=$_FILES['pic']['name'];
	$sql = mysqli_query($con,"INSERT INTO candidate(Candidate_Name,Candidate_Position,Profile_Photo) VALUES ('$cname','$position','$pic')" )
        or die("Could not insert candidate at the moment". mysqli_error() );
	header("Location: candidates.php");
}
?>
<?php
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$result = mysqli_query($con,"DELETE FROM candidate WHERE candidate_id='$id'")
 			or die("The candidate does not exist ... \n"); 
		header("Location: candidates.php");
 	}
?>
<html>
<head>
<!--<link href="../Common/style.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
<div class="table">
<form enctype="multipart/form-data" action="candidates.php" method="post">
<table align="center" width="100%">
<CAPTION><h3>ADD NEW CANDIDATE</h3></CAPTION>
<tr><td colspan="15"><?php include('admin_header.php'); ?></td></tr>
<tr>
    <td align="right"><b>Candidate Name<b></td>
    <td align="left"><input type="text" name="name" /></td>
</tr>
<tr>
    <td align="right"><b>Profile Photo<b></td>
    <td align="left"><input type="file" name="pic" /></td>
</tr>

<tr>
    <td align="right"><b>Candidate Position</b></td>
    <!--<td><input type="combobox" name="position" value="<?php echo $positions; ?>"/></td>-->
    <td align="left"><SELECT NAME="position" id="position">select
    <?php
    while ($row=mysqli_fetch_array($positions_retrieved)){
    	echo "<OPTION VALUE=$row[Position_Name]>$row[Position_Name]";
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table align="center">
<CAPTION><h3><b>AVAILABLE CANDIDATES<b></h3></CAPTION>
<tr>
<td><b>Candidate ID</b></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><b>Candidate Name</b></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><b>Candidate Position</b></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><b>Profile Photo</b></td>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['Candidate_Id']."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;</td>";
echo "<td>" . $row['Candidate_Name']."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;</td>";
echo "<td>" . $row['Candidate_Position']."</td>";
echo "<td>&nbsp;&nbsp;&nbsp;</td>";
echo "<td><img src='images/".$row['Profile_Photo']."' height='150' width='200' /></td>";
echo "<td>&nbsp;&nbsp;&nbsp;</td>";
echo '<td><a href="candidates.php?id=' . $row['Candidate_Id'] . '">Delete Candidate</a></td>';
echo "</tr>";
}
?>
</table>
</div>
</body>
</html>