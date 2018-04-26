<?php
	require('../Common/connect.php');
	if(isset($_POST['Submit'])){
  		$position =$_POST['position'];
  		$results = mysqli_query($con,"SELECT * FROM candidate where Candidate_Position='$position'");
    	$row1 = mysqli_fetch_array($results);
    	$row2 = mysqli_fetch_array($results);
      	if($row1){
      		$candidate_name_1=$row1['Candidate_Name'];
      		$candidate_1=$row1['Candidate_Votes'];
      	}
      	if($row2){
      		$candidate_name_2=$row2['Candidate_Name'];
      		$candidate_2=$row2['Candidate_Votes'];
      	}
	}
?> 
<?php
	$positions=mysqli_query($con,"SELECT * FROM position")
	or die("There are no records to display ... \n" . mysqli_error()); 
?>
<?php 
	if(isset($_POST['Submit'])){
		$totalvotes=$candidate_1+$candidate_2;
	}
?>
<html><head>
<!--<link href="../Common/style.css" rel="stylesheet" type="text/css" />-->
</head><body>
<div class="table">
<form enctype="multipart/form-data" method="post" action="refresh.php">
<table align="center" width="100%">
<h1><center>POLL RESULTS</center></h1>
<tr><td colspan="2"><?php include('admin_header.php'); ?></td></tr>
<tr>
    <td align="right"><b>Choose Position : </b></td>
    <td><SELECT NAME="position" id="position">
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[Position_Name]>$row[Position_Name]"; 
    //mysqli_free_result($positions_retrieved);
    //mysqli_close($link);
    }
    ?>
    </SELECT></td>
</tr>
<tr>
    <td colspan="2" align="center"><input type="submit" name="Submit" value="See Results" /></td> 
</tr>
</form> 
</table>
<?php 
	if(isset($_POST['Submit'])){
		echo "<b>".$candidate_name_1."</b>";
	} 
?>:<br>
<img src="images/candidate-1.gif"
width='
<?php 
	if(isset($_POST['Submit'])){
		if ($candidate_2 || $candidate_1 != 0){
			echo(100*round($candidate_1/($candidate_2+$candidate_1),2));
		}
	}
?>'
height='20'>
<?php
	if(isset($_POST['Submit'])){
		if ($candidate_2 || $candidate_1 != 0){
			echo(100*round($candidate_1/($candidate_2+$candidate_1),2));
		}
	}
?>% of 
<?php
	if(isset($_POST['Submit'])){
		echo "<b>".$totalvotes."</b>";
	}
?> total votes
<br>votes 
<?php 
	if(isset($_POST['Submit'])){
		echo "<b>".$candidate_1."</b>";
	}
?>
<br>
<br>
<?php 
	if(isset($_POST['Submit'])){
		echo "<b>".$candidate_name_2."</b>";
	}
?>:<br>
<img src="images/candidate-2.gif"
width='
<?php
	if(isset($_POST['Submit'])){
		if ($candidate_2 || $candidate_1 != 0){
			echo(100*round($candidate_2/($candidate_2+$candidate_1),2));
		}
	}
?>'
height='20'>
<?php
	if(isset($_POST['Submit'])){
		if ($candidate_2 || $candidate_1 != 0){
			echo(100*round($candidate_2/($candidate_2+$candidate_1),2));
		}
	}
?>% of 
<?php 
	if(isset($_POST['Submit'])){
		echo "<b>".$totalvotes."</b>";
	}
?> total votes
<br>votes
<?php
	if(isset($_POST['Submit'])){
		echo "<b>".$candidate_2."</b>";
	}
?><br><font size="+2"><center>
<?php
	if($candidate_1>$candidate_2)
		echo "<br><b>Winner is $candidate_name_1 with $candidate_1 votes.</b>";
	else
		echo "<br><b>Winner is $candidate_name_2 with $candidate_2 votes.</b>";
?></font></center>
</div>
</body></html>