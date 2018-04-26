<?php
	require('connect.php');
	$vote = $_REQUEST['vote'];
	mysqli_query($con,"UPDATE candidate SET Candidate_Votes=Candidate_Votes+1 WHERE Candidate_Name='$vote'");
?> 