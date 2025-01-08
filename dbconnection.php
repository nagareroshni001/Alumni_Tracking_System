<?php
$server = "localhost";
$user="root";
$pass="";
$db="alumni_tracking_system";
$conn = mysqli_connect($server,$user,$pass,$db);
echo mysqli_connect_error();
?>