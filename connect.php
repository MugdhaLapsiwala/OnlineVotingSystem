<?php
session_start();
$con=mysqli_connect("localhost", "root", "");
if (!$con) {
    die("Not Connected..!!");
}
$db=mysqli_select_db($con,"voting");
?>