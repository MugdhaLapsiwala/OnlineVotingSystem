<?php
require('connect.php');
?>
<?php
$positions=mysqli_query($con,"SELECT * FROM position") or die("There are no records to display ... \n"); 
?>
<?php
	if (isset($_POST['Submit'])){
		$position = $_POST['position'];
 		$result = mysqli_query($con,"SELECT * FROM candidate WHERE Candidate_Position='$position'")
 or die(" There are no records at the moment ... \n"); 
	}
?>
<html>
<head>
<!--<link href="../Common/style.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
	xmlhttp.open("GET","save.php?vote="+int,true);
	xmlhttp.send();
	}
	else
	{
	alert("Choose another candidate ");	
	}
	
}
//function removename(){
//	var x=document.getElementById("position");
//	x.remove(x.selectedIndex);
//	alert x;
//}
function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
<!--$("#div1").load("vote.php #position");-->
</script>
</head>
<body>
<h1><center>Vote</center></h1>
<table width="100%" align="center">
<tr><td colspan="3"><?php include('header.php'); ?></td></tr> 
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
<tr>
<div id="div1">
    <td align="center"><h3><b>Choose Position :</b></h3></td>
    <td align="left"><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
    <?php 
    	while ($row=mysqli_fetch_array($positions)){
    		echo "<OPTION VALUE=$row[Position_Name]>$row[Position_Name]"; 
    	}
    ?>
    </SELECT></td></tr>
    <tr align="center">
    	<td colspan="2"><input type="submit" name="Submit" value="See Candidates" /></td>
</div>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<table align="center">
<form>
<tr>
    <td><h2><b>Candidates:</b></h2></td>
</tr>
<tr>
    	<td align="center" colspan="2"></td>
</tr>
<?php
  if (isset($_POST['Submit'])){
	echo "<tr><td><h3><b>Selected Candidates for $position are :</br></b></h3></td></tr>";
		while ($row=mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td><img src='images/".$row['Profile_Photo']."' height='150' width='200' /></td>";
		echo "<td>" . $row['Candidate_Name']."</td>";
		echo "<td>&nbsp;&nbsp;&nbsp;</td>";
		echo "<td>&nbsp;&nbsp;&nbsp;</td>";
		echo "<td><input type='radio' name='vote' id='vote' value='$row[Candidate_Name]' onclick='getVote(this.value)' /></td>";
		echo "</tr>";
	}
	mysqli_free_result($result);
  }
?>
</form>
</table>
</body>
</html>